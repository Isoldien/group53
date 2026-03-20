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

        $category = Category::firstOrCreate(
            ['category_name' => 'Food'],
            ['description' => 'Pet food and treats']
        );

        return [
            'category_id' => $category -> category_id,
            'product_name' => 'Kitten Milk Replacer',
            'description' => 'Nutrient-rich milk formula for young kittens.',
            'price' => fake()->randomFloat(2, 2, 25),
            'stock_quantity' => fake()->numberBetween(1,25),
            'image_url' => 'https://m.media-amazon.com/images/I/71y6k9Zp5RL._AC_SL1500_.jpg',
            'brand' => 'Whiskas',
            'pet_type' => 'Cat'
        ];

    }
}
