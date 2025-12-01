<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the carts table, do not use this seeder for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->pluck('user_id')->toArray();
        if (empty($users)) {
            return;
        }

        $carts = [];
        foreach ($users as $uid) {
            $carts[] = [
                'user_id' => $uid,
                'date_created' => now(),
                'total_amount' => 0.00,
            ];
        }

        DB::table('carts')->insert($carts);
    }
}
