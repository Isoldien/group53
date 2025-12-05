<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        // Logic to add item to cart
    }

    public function update(Request $request)
    {
        // Logic to update cart item quantity
    }

    public function remove(Request $request)
    {
        // Logic to remove item from cart
    }
}