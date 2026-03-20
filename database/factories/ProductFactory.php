<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $product_type = ['Dog','Bird','Cat','Hamster','Fish'];
        $selected_type = fake()->randomElement($product_type);

        return [
            'category_id' => Category::factory(),
            'product_name' => fake() -> words(3, true),
            'description' => fake() -> sentence(),
            'price' => fake() -> randomFloat(2, 2, 15),
            'stock_quantity' => fake() -> numberBetween(1,10),
            'image_url' => 'https://placehold.co/800x600?text=' . urlencode($selected_type . ' Item'),
            'brand' => fake() -> word(),
            'pet_type' => $selected_type
        ];

    }
}
