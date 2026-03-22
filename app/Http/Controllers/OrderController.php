<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;

use App\Events\DashboardEvent;
use App\Events\MessageEvent;
use App\Events\StockEvent;
use App\Mail\RefundMail;
use App\Models\AdminMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

/**
 * Controller managing order placements, tracking, and updating order fulfillment statuses.
 */
class OrderController extends Controller
{
    //Returns all pending orders; to be used by Admin
    public function getAllOrders(Request $request){

        $query = Order::query()->with(["user", "address","order_items"]);
        if($request->filled('product_search')){
            $search = $request->input('product_search');
            $query->whereHas('order_items.product', function($q) use ($search){
                $q->where('product_name', 'LIKE', "%{$search}%")->
                orWhere('brand', 'LIKE', "%{$search}%");
            });

        }
        if($request->filled('user_search'))
        {
            $search = $request->input('user_search');
            $query->whereHas("user", function($q) use ($search){
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }
        if($request->filled('status')){
            $status = $request->input('status');
            $query->where("status", '=', $status);
        }



        $orders = $query->paginate(12);
        return view('admin.orders.index', compact("orders"));

    }

    public function processAllPendingOrdersAsShipped(){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }
        DB::table("orders")->where("status", "=",OrderStatus::Pending)->update(["status"=>OrderStatus::Shipped]);
        return redirect()->route('orders.index')->with('success', 'All pending orders have been shipped');
    }

    public function processAllShippedOrdersAsDelivered()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }
        DB::table("orders")->where("status", "=",OrderStatus::Shipped)->update(["status"=>OrderStatus::Delivered]);
        return redirect()->route('orders.index')->with('success', 'All shipped orders have been delivered');

    }

    public function open_process_order($id){
        $order = Order::findOrFail($id);
        if(DB::table("orders")->where("order_id","=",$order->order_id)->exists()){
            return view("admin.orders.edit", compact("order"));
        }
        else
            return redirect()->route('orders.index')->with('error', 'Order not found');

    }

    public function process_order(Request $request){

        $request->validate([
           "status" => ["required",Rule::enum(OrderStatus::class)]
        ]);

            try {
                DB::transaction(function () use ($request) {
                    $order = DB::table("orders")->where("order_id","=",$request->input("order_id"))->lockForUpdate()->first();
                    if($request->input("status") !== OrderStatus::Pending->value && $order->status === OrderStatus::Pending->value) {
                        DB::table("orders")->where("order_id", "=", $request->input("order_id"))->update([
                            "status" => $request->input("status")
                        ]);


                        $orderItems = DB::table("order_items")->where("order_id", "=", $order->order_id)->lockForUpdate()->get();
                        foreach ($orderItems as $orderItem) {
                           $product = DB::table("products")->where("product_id", "=", $orderItem->product_id)->lockForUpdate()->first();
                           if($product->stock_quantity < $orderItem->quantity){
                            DB::table("products")->where("product_id", "=", $orderItem->product_id)->update([
                                "stock_quantity" => 0
                            ]);
                               //communicates the number of products that are completely out of stock to front-end channel
                               $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
                               $noOfLowStock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
                               $message = AdminMessage::create([
                                   'message' => "\"".$product->product_name."\"". " with ID ".$product->product_id. " is out of stock",
                                   'title' => "new out of stock incident"
                               ]);
                               event(new StockEvent($noOfLowStock,$noOutOfStock));
                               event(new MessageEvent($message));
                               $amount = $product->price * ($orderItem->quantity - $product->stock_quantity);
                               $user = User::find($order->user_id);
                               \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\RefundMail($user,$amount));

                           }
                           elseif ($product->stock_quantity == $orderItem->quantity) {
                               DB::table("products")->where("product_id", "=", $orderItem->product_id)->update([
                                   "stock_quantity" => 0
                               ]);
                               //communicates the number of products that are completely out of stock to front-end channel
                               $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
                               $noOfLowStock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
                               $message = AdminMessage::create([
                                   'message' => "\"".$product->product_name."\"". " with ID ".$product->product_id. " is out of stock",
                                   'title' => "new out of stock incident"
                               ]);
                               event(new StockEvent($noOfLowStock,$noOutOfStock));
                               event(new MessageEvent($message));
                           }
                           elseif (($product->stock_quantity - $orderItem->quantity) > 0 && ($product->stock_quantity - $orderItem->quantity) <= 10) {
                               DB::table("products")->where("product_id", "=", $orderItem->product_id)->update([
                                   "stock_quantity" => $product->stock_quantity - $orderItem->quantity
                               ]);
                               //communicates the number of products that are low stock but not out of stock as part of real-time funcitonality - this figure should be added to the admin page with the table of
                               //the number of low stock and out of stock products
                               $noOutOfStock = DB::table('products')->where("stock_quantity", "=", 0)->count();
                               $noOfLowStock = DB::table('products')->whereBetween('stock_quantity', [1, 10])->count();
                               $message = AdminMessage::create([
                                   'message' => "\"".$product->product_name."\"". " with ID ".$product->product_id. " is low stock",
                                   'title' => "new low stock incident"
                               ]);
                               event(new StockEvent($noOfLowStock,$noOutOfStock));
                               event(new MessageEvent($message));
                           }
                           else
                           {
                               DB::table("products")->where("product_id", "=", $orderItem->product_id)->update([
                                   "stock_quantity" => $product->stock_quantity - $orderItem->quantity
                               ]);
                           }
                        }
                        if(($request->input("status") === OrderStatus::Delivered->value && $order->status !== OrderStatus::Delivered->value)||($request->input("status") !== OrderStatus::Delivered->value && $order->status === OrderStatus::Delivered->value)){
                          $event = new DashboardEvent();
                          $event->orderCount = Order::where("status","!=",OrderStatus::Delivered)->count();
                          event($event);
                        }
                        DB::table("orders")->where("order_id","=",$request->input("order_id"))->update([
                            "status" => $request->input("status")
                        ]);

                    }
                    elseif($request->input("status") !== OrderStatus::Pending->value && $order->status !== OrderStatus::Pending->value)
                    {
                        if(($request->input("status") === OrderStatus::Delivered->value && $order->status !== OrderStatus::Delivered->value)||($request->input("status") !== OrderStatus::Delivered->value && $order->status === OrderStatus::Delivered->value)){
                            $event = new DashboardEvent();
                            $event->orderCount = Order::where("status","!=",OrderStatus::Delivered)->count();
                            event($event);
                        }
                        DB::table("orders")->where("order_id","=",$request->input("order_id"))->update([
                            "status" => $request->input("status")
                        ]);
                    }



                });

                return redirect()->route('orders.index')->with('success', 'Order status has been updated');
            } catch (Throwable $e) {

                return redirect()->route("orders.index")->with('error', "sorry an error occurred whilst processing your request.");
            }



    }




}
