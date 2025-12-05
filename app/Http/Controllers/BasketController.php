<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    private function getActiveCart()
    {
        $userId = Auth::user()->user_id;

        return Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'active'],
            ['total_amount' => 0]
        );
    }

    public function getCustomerBasket()
    {
        $cart = $this->getActiveCart();
        $cartItems = CartItem::where('cart_id', $cart->cart_id)
                              ->with('product')
                              ->get();

        return view('checkout', compact('cartItems'));
    }

    public function addProduct(Request $request, int $productId)
    {
        $cart = $this->getActiveCart();
        $cartId = $cart->cart_id;

        $product = Product::findOrFail($productId);

        $item = CartItem::where('cart_id', $cartId)
                        ->where('product_id', $productId)
                        ->first();

        if ($item) {
            $item->quantity++;
        } else {
            $item = new CartItem([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        $item->subtotal = $item->quantity * $product->price;
        $item->save();

        $cart->total_amount = CartItem::where('cart_id', $cartId)->sum('subtotal');
        $cart->save();

        return response()->json(['message' => 'Product added to basket!']);
    }

    public function increaseQuantity(int $productId)
    {
        $cart = $this->getActiveCart();
        $cartId = $cart->cart_id;

        $item = CartItem::where('cart_id', $cartId)
                        ->where('product_id', $productId)
                        ->firstOrFail();

        $product = Product::findOrFail($productId);

        $item->quantity++;
        $item->subtotal = $item->quantity * $product->price;
        $item->save();

        $cart->total_amount = CartItem::where('cart_id', $cartId)->sum('subtotal');
        $cart->save();

        return response()->json([
            'qty' => $item->quantity,
            'subtotal' => (float)$item->subtotal,
            'total' => (float)$cart->total_amount
        ]);
    }

    public function decreaseQuantity(int $productId)
    {
        $cart = $this->getActiveCart();
        $cartId = $cart->cart_id;

        $item = CartItem::where('cart_id', $cartId)
                        ->where('product_id', $productId)
                        ->firstOrFail();

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

        return response()->json([
            'qty' => $item->quantity ?? 0,
            'subtotal' => (float)($item->subtotal ?? 0),
            'total' => (float)$cart->total_amount
        ]);
    }
}
