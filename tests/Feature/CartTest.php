<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

it("add a product to a users cart", function () {

    $user = User::factory()->create();
    $product = Product::factory()->create();

    $cart = Cart::factory()->create([
        'user_id' => $user->user_id,
    ]);

    
    $response = $this -> actingAs($user)
        -> post(route('cart.add',[
            'product_id' => $product -> product_id, 
            'quantity' => 1
        ]));

    // Assertions - checks if product assigned to right user
    $response->assertRedirect();
    $this->assertDatabaseHas('cart_items',[
        'product_id' => $product -> product_id,
        'cart_id' => $cart -> cart_id
    ]);

});