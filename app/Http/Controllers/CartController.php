<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // Assuming Product model exists
// We need Cart and CartItem models. If they don't exist, I should use DB facade or create them.
// Let's assume I need to create them as well or check if they exist.
// User didn't ask to create models, but good practice.
// I'll check first.

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }

        $userId = Auth::id();
        $cart = DB::table('carts')->where('user_id', $userId)->first();
        
        $cartItems = [];
        $total = 0;

        if ($cart) {
            $cartItems = DB::table('cart_items')
                ->join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->where('cart_id', $cart->cart_id)
                ->select('cart_items.*', 'products.product_name', 'products.price', 'products.image_url', 'products.description')
                ->get();
            
            $total = $cart->total_amount;
        }

        return view('cart_checkout', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to add items to cart');
        }

        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'nullable|integer|min:1' 
        ]);

        $quantity = $request->input('quantity', 1);
        $productId = $request->input('product_id');
        $userId = Auth::id();

        $product = DB::table('products')->where('product_id', $productId)->first();

        // Check/Create Cart
        $cart = DB::table('carts')->where('user_id', $userId)->first();
        if (!$cart) {
            $cartId = DB::table('carts')->insertGetId([
                'user_id' => $userId,
                'date_created' => now(),
                'total_amount' => 0
            ]);
        } else {
            $cartId = $cart->cart_id;
        }

        // Check if item exists
        $existingItem = DB::table('cart_items')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        $subtotal = $product->price * $quantity;

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $quantity;
            $newSubtotal = $product->price * $newQuantity;
            
            DB::table('cart_items')
                ->where('cart_item_id', $existingItem->cart_item_id)
                ->update([
                    'quantity' => $newQuantity,
                    'subtotal' => $newSubtotal
                ]);
        } else {
            DB::table('cart_items')->insert([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ]);
        }

        $this->recalculateCartTotal($cartId);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,cart_item_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->first();
        $product = DB::table('products')->where('product_id', $cartItem->product_id)->first();
        
        $newSubtotal = $product->price * $request->quantity;

        DB::table('cart_items')
            ->where('cart_item_id', $request->cart_item_id)
            ->update([
                'quantity' => $request->quantity,
                'subtotal' => $newSubtotal
            ]);

        $this->recalculateCartTotal($cartItem->cart_id);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,cart_item_id'
        ]);

        $cartItem = DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->first();
        
        if ($cartItem) {
             DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->delete();
             $this->recalculateCartTotal($cartItem->cart_id);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id();
        $cart = DB::table('carts')->where('user_id', $userId)->first();
        
        if (!$cart || $cart->total_amount <= 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $cartItems = DB::table('cart_items')->where('cart_id', $cart->cart_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Handle Address (Dummy logic for now)
        $address = DB::table('addresses')->where('user_id', $userId)->first();
        if (!$address) {
            // Create dummy address for the user if none exists
            $addressId = DB::table('addresses')->insertGetId([
                'user_id' => $userId,
                'address_line' => '123 Dummy St',
                'city' => 'London',
                'postal_code' => 'SW1A 1AA',
                'country' => 'UK',
                'is_default' => 1
            ]);
        } else {
            $addressId = $address->address_id;
        }

        // Create Order
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $userId,
            'address_id' => $addressId,
            'order_date' => now(),
            'total_price' => $cart->total_amount,
            'status' => 'pending',
            'payment_method' => 'Credit Card (Dummy)'
        ]);

        // Move Cart Items to Order Items
        foreach ($cartItems as $item) {
            $product = DB::table('products')->where('product_id', $item->product_id)->first();
            
            DB::table('order_items')->insert([
                'order_id' => $orderId,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price_at_purchase' => $product->price
            ]);

            // Update Stock ? (Optional, but good for "realism")
            // DB::table('products')->where('product_id', $item->product_id)->decrement('stock_quantity', $item->quantity);
        }

        // Clear Cart
        DB::table('cart_items')->where('cart_id', $cart->cart_id)->delete();
        DB::table('carts')->where('cart_id', $cart->cart_id)->update(['total_amount' => 0]);

        return redirect()->route('cart.index')->with('success', 'Order placed successfully! Order ID: #' . $orderId);
    }

    private function recalculateCartTotal($cartId)
    {
        $total = DB::table('cart_items')->where('cart_id', $cartId)->sum('subtotal');
        DB::table('carts')->where('cart_id', $cartId)->update(['total_amount' => $total]);
    }
}
