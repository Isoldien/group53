<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = \App\Models\Product::count();
        $lowStockCount = \App\Models\Product::where('stock_quantity', '<=', 10)->count();
        $orderCount = \App\Models\Order::count();
        $userCount = \App\Models\User::count();
        
        $recentTransactions = \App\Models\InventoryTransaction::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('productCount', 'lowStockCount', 'orderCount', 'userCount', 'recentTransactions'));
    }
}
