<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address_id'      => 'required|integer|exists:addresses,address_id',
            'payment_method'  => 'required|in:credit_card,debit_card,paypal,cash_on_delivery',
        ]);

        $user = Auth::user();
        $userId = $user->user_id;

       
        $cart = Cart::where('user_id', $userId)->where('status', 'active')->first();

        if (!$cart) {
            return response()->json(['error' => 'No active cart found.'], 400);
        }

        $cartItems = CartItem::where('cart_id', $cart->cart_id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }

        $totalPrice = $cartItems->sum('subtotal');

        $order = Order::create([
            'user_id'        => $userId,
            'address_id'     => $request->address_id,
            'order_date'     => now(),
            'total_price'    => $totalPrice,
            'status'         => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending'
        ]);

        foreach ($cartItems as $item) {
            $product = $item->product;

            if ($product->stock_quantity < $item->quantity) {
                return response()->json([
                    'error' => "Not enough stock for {$product->product_name}."
                ], 400);
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
