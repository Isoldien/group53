<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Food' => 'Pet food and treats',
            'Toys' => 'Toys and enrichment',
            'Accessories' => 'Leashes, collars, beds',
            'Healthcare' => 'Leashes, collars, beds',
            'Clothing' => 'Clothing and accessories'
        ];

        $key = array_rand($categories);

        return [
            'category_name' => $key,
            'description' => $categories[$key]
        ];
    }
}
