<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the orders table, do not use this seeder for production
*/
class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->pluck('user_id')->toArray();
        $addresses = DB::table('addresses')->pluck('address_id')->toArray();
        $product = DB::table('products')->first();
        if (empty($users) || empty($addresses) || !$product) {
            return;
        }

        $orders = [];
        $orderItems = [];

        foreach ($users as $uid) {
            $addressId = $addresses[array_rand($addresses)];
            $total = $product->price * 2;
            $orders[] = [
                'user_id' => $uid,
                'address_id' => $addressId,
                'order_date' => now(),
                'total_price' => $total,
                'status' => 'pending',
                'payment_method' => 'card',
            ];
        }

        // insert orders and then order_items
        foreach ($orders as $order) {
            $orderId = DB::table('orders')->insertGetId($order, 'order_id');
            $orderItems[] = [
                'order_id' => $orderId,
                'product_id' => $product->product_id,
                'quantity' => 2,
                'price_at_purchase' => $product->price,
            ];
        }

        if (!empty($orderItems)) {
            DB::table('order_items')->insert($orderItems);
        }
    }
}
