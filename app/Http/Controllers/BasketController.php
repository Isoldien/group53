<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Product;

class BasketController extends Controller
{
    public function getCustomerBasket(){
        $user = Auth::user();
        $userId = $user->user_id;
        $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'active'],
            ['total_amount' => 0]
        );

        $cartItems = CartItem::where('cart_id', $cart->cart_id)->with('product')->get();
        return view('checkout',compact("cartItems"));
    }

    public function addProduct(Request $request,int $productId){
         

         $user = Auth::user();
         $user_id = $user->user_id;
         $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'active'],
            ['total_amount' => 0]
        );
        $cartId = $cart->cart_id;

        $product = Product::find($productId);

        
        $item = CartItem::where('cart_id', $cartId)->where('product_id', $productId)->first();

        if ($item) {
            
            $item->quantity++;
            $item->subtotal = $item->quantity * $product->price;
            $item->save();
        } else {
            
            $item = CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $product->product_id,
                'quantity' => 1,
                'subtotal' => $product->price,
            ]);
        }

        
        $cart->total_amount = CartItem::where('cart_id', $cart->cart_id)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Product added to basket!']);
      

    }

    public function increaseQuantity(Request $request, int $cartItemId,int $productId)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);
        $user = Auth::user();
         $user_id = $user->user_id;
         $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'active'],
            ['total_amount' => 0]
        );
        $cartId = $cart->cart_id;
       

        

        $item = CartItem::where(['cart_id' => $cartId,'product_id' => $productId])->firstOrFail();

        $product = Product::findOrFail($productId);

        $item->quantity++;
        $item->subtotal = $item->quantity * $product->price;
        $item->save();

        
        $cart->total_amount = CartItem::where('cart_id', $cartId)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Quantity increased']);
    }

    public function decreaseQuantity(Request $request, int $cartItemId,int $productId)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);
        $user = Auth::user();
         $user_id = $user->user_id;
         $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'active'],
            ['total_amount' => 0]
        );
        $cartId = $cart->cart_id;

        $item = CartItem::where(['cart_id' => $cartId,'product_id' => $productId])->firstOrFail();

        if ($item->quantity > 1) {
           
            $item->quantity--;
            $product = Product::findOrFail($productId);
            $item->subtotal = $item->quantity * $product->price;
            $item->save();
        } else {
          
            $item->delete();
        }

        
        $cart->total_amount = CartItem::where('cart_id', $cartId)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Quantity updated']);
    }
}
