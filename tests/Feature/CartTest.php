<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

// Integration Testing

it("add a product to the right users cart", function () {

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

// Security Testing - Authentication

test('user cannot delete item of others cart', function() {

    // TODO - Create two users

    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $cart = Cart::factory()->create([
        'user_id' => $user1->user_id
    ]);

    $cartItem = CartItem::factory()->create([
        'cart_id' => $cart->cart_id,
    ]);

    // Route to remove item in user cart

    $response = $this -> actingAs($user2)
        -> post(route('cart.remove',[
            'cart_item_id' => $cartItem -> cart_item_id
        ]));

    // Assertion - checks that user's item still exists

    $response -> assertStatus(403);
    $this->assertDatabaseHas('cart_items',[
        'cart_item_id' => $cartItem -> cart_item_id,
        'cart_id' => $cart -> cart_id
    ]);

});