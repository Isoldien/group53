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

        $product = Product::factory()->create();
        $quantity = 1;

        return [
            'cart_id' => Cart::factory(),
            'product_id' => $product,
            'quantity' => $quantity,
            'subtotal' => $product->price * $quantity
        ];
    }
}
