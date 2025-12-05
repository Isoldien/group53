<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Address;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:20',
            'adress_line'    => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'postcode'       => 'required|string|max:20',
            'country'        => 'required|string|max:100',
            'payment_method' => 'required|in:credit_card,debit_card,paypal,cash_on_delivery'
        ]);

        $user    = Auth::user();
        $userId  = $user->user_id;

      
        $cart = Cart::where('user_id', $userId)->where('status', 'active')->first();

        if (!$cart) {
            return back()->with('error', 'No active cart has been found!');
        }

        $cartItems = CartItem::where('cart_id', $cart->cart_id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        
        $address = Address::firstOrCreate([
            'user_id'      => $userId,
            'adress_line'  => $request->adress_line,
            'city'         => $request->city,
            'postcode'     => $request->postcode,
            'country'      => $request->country,
        ]);

        
        $totalPrice = $cartItems->sum('subtotal');

        $order = Order::create([
            'user_id'        => $userId,
            'address_id'     => $address->address_id,
            
            'total_price'    => $totalPrice,
            'status'         => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending'
        ]);

        foreach ($cartItems as $item) {
            $product = $item->product;

           
            
            if ($product->stock_quantity < $item->quantity) {
                return back()->with('error', "Not enough stock for {$product->product_name}.");
            }

            $product->stock_quantity -= $item->quantity;

            if ($product->stock_quantity <= 0) {
                $product->stock_status = 'out_of_stock';
            } elseif ($product->stock_quantity <= $product->low_stock_threshold) {
                $product->stock_status = 'low_stock';
            }

            $product->save();

            OrderItem::create([
                'order_id'          => $order->order_id,
                'product_id'        => $product->product_id,
                'quantity'          => $item->quantity,
                'price_at_purchase' => $product->price,
            ]);

            InventoryTransaction::create([
                'product_id'      => $product->product_id,
                'order_id'        => $order->order_id,
                'user_id'         => $userId,
                'quantity_change' => -$item->quantity,
                'type'            => 'out',
                'note'            => 'Order placed',
            ]);
        }

        $cart->status = 'converted';
        $cart->save();

        CartItem::where('cart_id', $cart->cart_id)->delete();

        
        return redirect()->route('getHomepage')->with('success', 'Order has been successfully placed!');
    }
}
