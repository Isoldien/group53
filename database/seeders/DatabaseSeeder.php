<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: The main seeder file for seeding the database, shouldn't be used for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate tables in dependency order
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $tables = [
            'inventory_transactions',
            'contact_messages',
            'return_requests',
            'reviews',
            'order_items',
            'orders',
            'cart_items',
            'carts',
            'products',
            'categories',
            'addresses',
            'users',
        ];
        foreach ($tables as $t) {
            if (Schema::hasTable($t)) {
                DB::table($t)->truncate();
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            AddressesTableSeeder::class,
            CartsTableSeeder::class,
            CartItemsTableSeeder::class,
            OrdersTableSeeder::class,
            ReviewsTableSeeder::class,
            ReturnRequestsTableSeeder::class,
            ContactMessagesTableSeeder::class,
            InventoryTransactionsTableSeeder::class,
        ]);
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
    }
}
