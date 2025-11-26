<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('inventory_transactions')->truncate();
        DB::table('contact_messages')->truncate();
        DB::table('return_requests')->truncate();
        DB::table('reviews')->truncate();
        DB::table('order_items')->truncate();
        DB::table('orders')->truncate();
        DB::table('cart_items')->truncate();
        DB::table('carts')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('addresses')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        /*
        // users
        $users = [
            [
                'user_id' => 1,
                'full_name' => 'Admin User',
                'email' => 'admin@youzoo.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'full_name' => 'John Doe',
                'email' => 'john@youzoo.com',
                'password' => Hash::make('password'),
                'phone' => '2345678901',
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'full_name' => 'Jane Smith',
                'email' => 'jane@youzoo.com',
                'password' => Hash::make('password'),
                'phone' => '3456789012',
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'full_name' => 'Bob Wilson',
                'email' => 'bob@youzoo.com',
                'password' => Hash::make('password'),
                'phone' => '4567890123',
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('users')->insert($users);
        */

        // @TODO: fix constraint issue and uncomment above
        // addresses
        $addresses = [
            [
                'address_id' => 1,
                'user_id' => 2,
                'address_line' => '123 Main Street',
                'city' => 'London',
                'postal_code' => 'SW1A 1AA',
                'country' => 'United Kingdom',
                'is_default' => 1,
            ],
            [
                'address_id' => 2,
                'user_id' => 2,
                'address_line' => '456 Oak Avenue',
                'city' => 'Manchester',
                'postal_code' => 'M1 1AE',
                'country' => 'United Kingdom',
                'is_default' => 0,
            ],
            [
                'address_id' => 3,
                'user_id' => 3,
                'address_line' => '789 Elm Road',
                'city' => 'Birmingham',
                'postal_code' => 'B1 1AA',
                'country' => 'United Kingdom',
                'is_default' => 1,
            ],
            [
                'address_id' => 4,
                'user_id' => 4,
                'address_line' => '321 Pine Lane',
                'city' => 'Liverpool',
                'postal_code' => 'L1 1AA',
                'country' => 'United Kingdom',
                'is_default' => 1,
            ],
        ];
        DB::table('addresses')->insert($addresses);

        // categories
        $categories = [
            ['category_id' => 1, 'category_name' => 'Dog Food', 'description' => 'Premium dog food and treats'],
            ['category_id' => 2, 'category_name' => 'Cat Toys', 'description' => 'Interactive toys for cats'],
            ['category_id' => 3, 'category_name' => 'Bird Supplies', 'description' => 'Cages, food, and accessories'],
            ['category_id' => 4, 'category_name' => 'Fish Tanks', 'description' => 'Aquariums and accessories'],
            ['category_id' => 5, 'category_name' => 'Small Animal Care', 'description' => 'Products for small pets'],
        ];
        DB::table('categories')->insert($categories);

        // products
        $products = [
            // dog food
            ['product_id' => 1, 'category_id' => 1, 'product_name' => 'Premium Dry Dog Food 15kg', 'description' => 'High-protein formula', 'price' => 45.99, 'stock_quantity' => 50, 'brand' => 'PawsNutrition', 'pet_type' => 'dog', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 2, 'category_id' => 1, 'product_name' => 'Puppy Growth Formula 10kg', 'description' => 'For growing puppies', 'price' => 38.50, 'stock_quantity' => 30, 'brand' => 'PawsNutrition', 'pet_type' => 'dog', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 3, 'category_id' => 1, 'product_name' => 'Senior Dog Food 12kg', 'description' => 'Easy-to-digest food', 'price' => 42.00, 'stock_quantity' => 25, 'brand' => 'HealthyPaws', 'pet_type' => 'dog', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 4, 'category_id' => 1, 'product_name' => 'Grain-Free Dog Food 8kg', 'description' => 'Hypoallergenic option', 'price' => 55.00, 'stock_quantity' => 15, 'brand' => 'NaturalChoice', 'pet_type' => 'dog', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 5, 'category_id' => 1, 'product_name' => 'Dog Treats Variety Pack', 'description' => 'Healthy training treats', 'price' => 12.99, 'stock_quantity' => 100, 'brand' => 'TastyBites', 'pet_type' => 'dog', 'date_added' => now(), 'is_active' => 1],
            
            // cat toys
            ['product_id' => 6, 'category_id' => 2, 'product_name' => 'Interactive Laser Pointer', 'description' => 'Automatic laser toy', 'price' => 18.99, 'stock_quantity' => 60, 'brand' => 'FunFeline', 'pet_type' => 'cat', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 7, 'category_id' => 2, 'product_name' => 'Catnip Mouse Set', 'description' => '5 pack with premium catnip', 'price' => 9.99, 'stock_quantity' => 80, 'brand' => 'KittyPlay', 'pet_type' => 'cat', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 8, 'category_id' => 2, 'product_name' => 'Cat Scratching Post Tower', 'description' => '3-tier with sisal posts', 'price' => 65.00, 'stock_quantity' => 20, 'brand' => 'FelineFurniture', 'pet_type' => 'cat', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 9, 'category_id' => 2, 'product_name' => 'Feather Wand Toy', 'description' => 'Interactive feather teaser', 'price' => 7.50, 'stock_quantity' => 120, 'brand' => 'PlayfulPaws', 'pet_type' => 'cat', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 10, 'category_id' => 2, 'product_name' => 'Tunnel Play System', 'description' => 'Collapsible tunnel', 'price' => 24.99, 'stock_quantity' => 35, 'brand' => 'AdventureKitty', 'pet_type' => 'cat', 'date_added' => now(), 'is_active' => 1],
            
            // bird products
            ['product_id' => 11, 'category_id' => 3, 'product_name' => 'Large Bird Cage', 'description' => 'For parrots and large birds', 'price' => 120.00, 'stock_quantity' => 10, 'brand' => 'AvianHome', 'pet_type' => 'bird', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 12, 'category_id' => 3, 'product_name' => 'Premium Bird Seed Mix 5kg', 'description' => 'Nutritious blend', 'price' => 15.99, 'stock_quantity' => 45, 'brand' => 'BirdNutrition', 'pet_type' => 'bird', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 13, 'category_id' => 3, 'product_name' => 'Wooden Perch Set', 'description' => 'Natural wood perches', 'price' => 22.50, 'stock_quantity' => 55, 'brand' => 'NaturalNest', 'pet_type' => 'bird', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 14, 'category_id' => 3, 'product_name' => 'Bird Bath with Mirror', 'description' => 'Hanging bath with mirror', 'price' => 11.99, 'stock_quantity' => 70, 'brand' => 'HappyBird', 'pet_type' => 'bird', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 15, 'category_id' => 3, 'product_name' => 'Cuttlebone Pack', 'description' => '10 pieces calcium supplement', 'price' => 8.99, 'stock_quantity' => 90, 'brand' => 'BirdHealth', 'pet_type' => 'bird', 'date_added' => now(), 'is_active' => 1],
            
            // fish 
            ['product_id' => 16, 'category_id' => 4, 'product_name' => '50L Glass Aquarium', 'description' => 'Complete with LED lighting', 'price' => 85.00, 'stock_quantity' => 15, 'brand' => 'AquaLife', 'pet_type' => 'fish', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 17, 'category_id' => 4, 'product_name' => 'External Filter System', 'description' => 'For tanks up to 100L', 'price' => 48.99, 'stock_quantity' => 25, 'brand' => 'ClearWater', 'pet_type' => 'fish', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 18, 'category_id' => 4, 'product_name' => 'Aquarium Decoration Set', 'description' => 'Rocks and plants bundle', 'price' => 28.50, 'stock_quantity' => 40, 'brand' => 'AquaDecor', 'pet_type' => 'fish', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 19, 'category_id' => 4, 'product_name' => 'Fish Food Flakes 200g', 'description' => 'Tropical fish daily food', 'price' => 6.99, 'stock_quantity' => 150, 'brand' => 'FishNutrition', 'pet_type' => 'fish', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 20, 'category_id' => 4, 'product_name' => 'Water Test Kit', 'description' => 'Complete pH testing kit', 'price' => 16.99, 'stock_quantity' => 60, 'brand' => 'SafeWater', 'pet_type' => 'fish', 'date_added' => now(), 'is_active' => 1],
            
            // small animals 
            ['product_id' => 21, 'category_id' => 5, 'product_name' => 'Rabbit Hutch Large', 'description' => 'Weatherproof outdoor hutch', 'price' => 145.00, 'stock_quantity' => 8, 'brand' => 'CozyHomes', 'pet_type' => 'rabbit', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 22, 'category_id' => 5, 'product_name' => 'Hamster Wheel Silent', 'description' => 'Quiet exercise wheel', 'price' => 12.50, 'stock_quantity' => 65, 'brand' => 'ActivePets', 'pet_type' => 'hamster', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 23, 'category_id' => 5, 'product_name' => 'Guinea Pig Food 5kg', 'description' => 'Complete nutrition', 'price' => 19.99, 'stock_quantity' => 40, 'brand' => 'SmallAnimalFood', 'pet_type' => 'guinea pig', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 24, 'category_id' => 5, 'product_name' => 'Small Animal Bedding 10L', 'description' => 'Soft absorbent paper', 'price' => 11.99, 'stock_quantity' => 75, 'brand' => 'ComfortBed', 'pet_type' => 'small animal', 'date_added' => now(), 'is_active' => 1],
            ['product_id' => 25, 'category_id' => 5, 'product_name' => 'Multi-Level Ferret Cage', 'description' => 'With ramps and platforms', 'price' => 98.00, 'stock_quantity' => 12, 'brand' => 'FerretMansion', 'pet_type' => 'ferret', 'date_added' => now(), 'is_active' => 1],
        ];
        DB::table('products')->insert($products);

        // carts
        $carts = [
            ['cart_id' => 1, 'user_id' => 2, 'date_created' => now(), 'total_amount' => 0.00],
            ['cart_id' => 2, 'user_id' => 3, 'date_created' => now(), 'total_amount' => 0.00],
            ['cart_id' => 3, 'user_id' => 4, 'date_created' => now(), 'total_amount' => 0.00],
        ];
        DB::table('carts')->insert($carts);

        // cart itmes
        $cartItems = [
            ['cart_item_id' => 1, 'cart_id' => 1, 'product_id' => 1, 'quantity' => 2, 'subtotal' => 91.98],
            ['cart_item_id' => 2, 'cart_id' => 1, 'product_id' => 6, 'quantity' => 1, 'subtotal' => 18.99],
            ['cart_item_id' => 3, 'cart_id' => 2, 'product_id' => 8, 'quantity' => 1, 'subtotal' => 65.00],
            ['cart_item_id' => 4, 'cart_id' => 3, 'product_id' => 16, 'quantity' => 1, 'subtotal' => 85.00],
        ];
        DB::table('cart_items')->insert($cartItems);

        // orders
        $orders = [
            ['order_id' => 1, 'user_id' => 2, 'address_id' => 1, 'order_date' => now()->subDays(5), 'total_price' => 110.97, 'status' => 'delivered', 'payment_method' => 'credit_card'],
            ['order_id' => 2, 'user_id' => 3, 'address_id' => 3, 'order_date' => now()->subDays(3), 'total_price' => 83.99, 'status' => 'shipped', 'payment_method' => 'paypal'],
            ['order_id' => 3, 'user_id' => 4, 'address_id' => 4, 'order_date' => now()->subDays(1), 'total_price' => 145.00, 'status' => 'pending', 'payment_method' => 'debit_card'],
        ];
        DB::table('orders')->insert($orders);

        // order items
        $orderItems = [
            ['order_item_id' => 1, 'order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price_at_purchase' => 45.99],
            ['order_item_id' => 2, 'order_id' => 1, 'product_id' => 6, 'quantity' => 1, 'price_at_purchase' => 18.99],
            ['order_item_id' => 3, 'order_id' => 2, 'product_id' => 8, 'quantity' => 1, 'price_at_purchase' => 65.00],
            ['order_item_id' => 4, 'order_id' => 2, 'product_id' => 6, 'quantity' => 1, 'price_at_purchase' => 18.99],
            ['order_item_id' => 5, 'order_id' => 3, 'product_id' => 21, 'quantity' => 1, 'price_at_purchase' => 145.00],
        ];
        DB::table('order_items')->insert($orderItems);

        // reviews
        $reviews = [
            ['review_id' => 1, 'product_id' => 1, 'user_id' => 2, 'rating' => 5, 'comment' => 'My dog loves this food! Great quality.', 'review_date' => now()->subDays(2)],
            ['review_id' => 2, 'product_id' => 6, 'user_id' => 2, 'rating' => 4, 'comment' => 'Good toy, keeps my cat entertained.', 'review_date' => now()->subDays(2)],
            ['review_id' => 3, 'product_id' => 8, 'user_id' => 3, 'rating' => 5, 'comment' => 'Sturdy and well-made scratching post!', 'review_date' => now()->subDays(1)],
        ];
        DB::table('reviews')->insert($reviews);

        // contact messages 
        $messages = [
            ['message_id' => 1, 'user_id' => 2, 'name' => 'John Doe', 'email' => 'john@example.com', 'subject' => 'Question about delivery', 'message' => 'When will my order arrive?', 'status' => 'resolved', 'date_sent' => now()->subDays(4)],
            ['message_id' => 2, 'user_id' => null, 'name' => 'Guest User', 'email' => 'guest@example.com', 'subject' => 'Product inquiry', 'message' => 'Do you have organic cat food?', 'status' => 'new', 'date_sent' => now()->subDays(1)],
        ];
        DB::table('contact_messages')->insert($messages);

        // invetory transactions
        $transactions = [
            ['transaction_id' => 1, 'product_id' => 1, 'order_id' => 1, 'user_id' => 1, 'quantity_change' => -2, 'type' => 'out', 'note' => 'Order #1 fulfilled', 'created_at' => now()->subDays(5)],
            ['transaction_id' => 2, 'product_id' => 6, 'order_id' => 1, 'user_id' => 1, 'quantity_change' => -1, 'type' => 'out', 'note' => 'Order #1 fulfilled', 'created_at' => now()->subDays(5)],
            ['transaction_id' => 3, 'product_id' => 1, 'order_id' => null, 'user_id' => 1, 'quantity_change' => 50, 'type' => 'in', 'note' => 'Stock replenishment', 'created_at' => now()->subDays(10)],
        ];
        DB::table('inventory_transactions')->insert($transactions);

        echo "Database seeded\n";
        echo "Users: 4 (admin@petstore.com, john@example.com, jane@example.com, bob@example.com)\n";
        echo "Products: 25 across 5 categories\n";
        echo "Carts: 3 with items\n";
        echo "Orders: 3 with order items\n";
        echo "Reviews: 3\n";
        echo "Messages: 2\n";
        echo "Inventory Transactions: 3\n";
        echo "\n All passwords: 'password'\n";
    }
}
