<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the reviews table, do not use this seeder for production
*/
class ReviewsTableSeeder extends Seeder
{
    public function run(): void
    {
        $products = DB::table('products')->pluck('product_id')->toArray();
        $users = DB::table('users')->pluck('user_id')->toArray();
        if (empty($products) || empty($users)) {
            return;
        }

        $reviews = [];
        foreach ($products as $productId) {
            $reviews[] = [
                'product_id' => $productId,
                'user_id' => $users[array_rand($users)],
                'rating' => rand(3, 5),
                'comment' => 'Sample review comment',
                'review_date' => now(),
            ];
        }

        DB::table('reviews')->insert($reviews);
    }
}
