<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\enums\UserRole;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the users table, do not use this seeder for production
*/
class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update a known admin user
        User::updateOrCreate(
            ['email' => 'youzoo@isoldien.com'],
            [
                'name' => 'YouZoo Admin',
                'password' => \Hash::make('password'),
                'role' => UserRole::Admin,
                'email_verified_at' => now(),
            ]
        );

        // Create additional random users (optional: only if table is empty or you want more)
        if (User::count() <= 1) {
            User::factory()->count(4)->create();
        }
    }
}
