<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the inventory transactions table, do not use this seeder for production
*/
class InventoryTransactionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $product = DB::table('products')->first();
        $user = DB::table('users')->first();
        if (!$product || !$user) {
            return;
        }

        DB::table('inventory_transactions')->insert([
            [
                'product_id' => $product->product_id,
                'order_id' => null,
                'user_id' => $user->user_id,
                'quantity_change' => 100,
                'type' => 'in',
                'note' => 'Initial stock load',
                'created_at' => now(),
            ],
        ]);
    }
}
