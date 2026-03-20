<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

it('allows users to add products to their cart', function () {

    $user = User::factory()->create();
    $product = Product::first() ??  Product::factory()->create();

    $response = $this -> actingAs($user)
        -> post(route('cart.add',[
            'product_id' => $product -> product_id, 
            'quantity' => 1
        ]));

    // Expectations and Assertions
    $cart = Cart::where('user_id', $user -> user_id)->first();

    expect($cart)->not->toBeNull(); // Checks if user's cart exists
    $this->assertDatabaseHas('cart_items',[ // Checks if product exists in user's cart
        'product_id' => $product -> product_id,
        'cart_id' => $cart -> cart_id
    ]);

});