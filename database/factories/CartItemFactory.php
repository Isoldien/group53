<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cart = Cart::first() ?? Cart::factory()->create();
        $product = Product::first() ?? Product::factory()->create();
        $quantity = 1;

        return [ // can override any with create([]);
            'cart_id' => $cart -> cart_id,
            'product_id' => $product -> product_id,
            'quantity' => $quantity,
            'subtotal' => $product -> price * $quantity
        ];
    }
}
