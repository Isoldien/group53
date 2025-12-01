<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the return requests table, do not use this seeder for production
*/
class ReturnRequestsTableSeeder extends Seeder
{
    public function run(): void
    {
        $orderItem = DB::table('order_items')->first();
        $user = DB::table('users')->first();
        if (!$orderItem || !$user) {
            return;
        }

        DB::table('return_requests')->insert([
            'order_item_id' => $orderItem->order_item_id,
            'user_id' => $user->user_id,
            'reason' => 'Item arrived damaged',
            'status' => 'pending',
            'request_date' => now(),
            'resolution_date' => null,
            'refund_amount' => null,
            'admin_notes' => null,
        ]);
    }
}
