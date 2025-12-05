<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;

class DatabaseConnectionController extends Controller
{
    public function index()
    {
        try {
            // check connection to database
            DB::connection()->getPdo();
            $connectionStatus = "Connected successfully to database: " . DB::connection()->getDatabaseName();

            // fetch summary data
            $userCount = User::count();

            // fetch recent data
            try {
                $productCount = DB::table('products')->count();
            } catch (Exception $e) {
                $productCount = 0;
            }

            try {
                $orderCount = DB::table('orders')->count();
            } catch (Exception $e) {
                $orderCount = 0;
            }

            try {
                $users = User::limit(5)->get();
            } catch (Exception $e) {
                $users = collect([]);
            }

            try {
                $products = DB::table('products')->limit(5)->get();
            } catch (Exception $e) {
                $products = collect([]);
            }

            try {
                $categories = DB::table('categories')->limit(5)->get();
            } catch (Exception $e) {
                $categories = collect([]);
            }

            try {
                $reviews = DB::table('reviews')->limit(5)->get();
            } catch (Exception $e) {
                $reviews = collect([]);
            }

            try {
                $recentOrders = DB::table('orders')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            } catch (Exception $e) {
                $recentOrders = collect([]); // Return empty collection if fails
                }

            // return data
            return view('database-connection', compact(
                'connectionStatus',
                'userCount',
                'productCount',
                'orderCount',
                'recentOrders',
                'users',
                'products',
                'categories',
                'reviews'
            ));

        } catch (Exception $e) {
            // handle connection failure
            return view('database-connection', [
                'connectionStatus' => "Could not connect to the database. Please check your configuration. Error: " . $e->getMessage(),
                'userCount' => 0,
                'productCount' => 0,
                'orderCount' => 0,
                'recentOrders' => [],
                'users' => [],
                'products' => [],
                'categories' => [],
                'reviews' => []
            ]);
        }
    }
}
