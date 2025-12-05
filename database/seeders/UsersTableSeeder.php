<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the users table, do not use this seeder for production
*/
class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create a known admin user
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@youzoo.com',
            'password' => 'password',
        ]);

        // Create additional random users
        User::factory()->count(4)->create();
    }
}
