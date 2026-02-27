<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = \Illuminate\Support\Facades\Auth::id();

        // Fetch orders with their items and related product details
        $orders = \Illuminate\Support\Facades\DB::table('orders')
            ->where('user_id', $userId)
            ->orderBy('order_date', 'desc')
            ->get();

        // For each order, fetch items
        foreach ($orders as $order) {
            $order->items = \Illuminate\Support\Facades\DB::table('order_items')
                ->where('order_id', $order->order_id)
                ->join('products', 'order_items.product_id', '=', 'products.product_id')
                ->select('order_items.*', 'products.product_name', 'products.image_url') // Select necessary product fields
                ->get();
        }

        return view('userhome', compact('orders'));
    }
     
    public function privacy()
    {
        

        return view('privacy');
    }
}
