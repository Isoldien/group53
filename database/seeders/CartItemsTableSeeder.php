<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the cart items table, do not use this seeder for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        $cartIds = DB::table('carts')->pluck('cart_id')->toArray();
        $productIds = DB::table('products')->pluck('product_id')->toArray();
        if (empty($cartIds) || empty($productIds)) {
            return;
        }

        $items = [];
        foreach ($cartIds as $cartId) {
            // add 1-3 items to cart
            $count = rand(1, 3);
            $total = 0;
            for ($i = 0; $i < $count; $i++) {
                $productId = $productIds[array_rand($productIds)];
                $product = DB::table('products')->where('product_id', $productId)->first();
                $qty = rand(1, 4);
                $subtotal = $product->price * $qty;
                $items[] = [
                    'cart_id' => $cartId,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'subtotal' => $subtotal,
                ];
                $total += $subtotal;
            }

            // update cart total
            DB::table('carts')->where('cart_id', $cartId)->update(['total_amount' => $total]);
        }

        if (!empty($items)) {
            DB::table('cart_items')->insert($items);
        }
    }
}
