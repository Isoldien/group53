<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the categories table, do not use this seeder for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Food', 'description' => 'Pet food and treats'],
            ['category_name' => 'Toys', 'description' => 'Toys and enrichment'],
            ['category_name' => 'Accessories', 'description' => 'Leashes, collars, beds'],
            ['category_name' => 'Healthcare', 'description' => 'Vitamins, medicines'],
            ['category_name' => 'Clothing', 'description' => 'Clothing and accessories']
        ];

        DB::table('categories')->insert($categories);
    }
}
