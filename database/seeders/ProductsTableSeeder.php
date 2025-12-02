<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the products table, do not use this seeder for production
*/
class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('category_id')->toArray();
        if (empty($categories)) {
            return;
        }

        $products = [];
        foreach ($categories as $idx => $catId) {
            for ($i = 1; $i <= 5; $i++) {
                $products[] = [
                    'category_id' => $catId,
                    'product_name' => "YouZoo Product {$idx}-{$i}",
                    'description' => 'This is a sample product for testing.',
                    'price' => round(5 + $i * 3.5, 2),
                    'stock_quantity' => 50 - $i * 2,
                    'image_url' => null,
                    'brand' => 'YouZoo',
                    'pet_type' => 'Dog',
                    'date_added' => now(),
                    'is_active' => 1,
                ];
            }
        }

        DB::table('products')->insert($products);
    }
}
