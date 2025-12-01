<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the contact messages table, do not use this seeder for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMessagesTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->pluck('user_id')->toArray();

        DB::table('contact_messages')->insert([
            [
                'user_id' => $users[0] ?? null,
                'name' => 'Visitor One',
                'email' => 'visitor1@example.com',
                'subject' => 'Question about product',
                'message' => 'Is this product available in large size?',
                'status' => 'new',
                'date_sent' => now(),
            ],
            [
                'user_id' => null,
                'name' => 'Guest',
                'email' => 'guest@example.com',
                'subject' => 'Shipping times',
                'message' => 'How long does delivery take to EU?',
                'status' => 'new',
                'date_sent' => now(),
            ],
        ]);
    }
}
