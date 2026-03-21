<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller for managing the administrative dashboard and user moderation features.
 */
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

        $orders = \App\Models\Order::with('user', 'order_items.product')->orderBy('order_date', 'desc')->paginate(5, ['*'], 'orders_page');
        $users = \App\Models\User::withCount(['orders', 'reviews'])->orderBy('user_id', 'desc')->paginate(5, ['*'], 'users_page');

        return view('admin.dashboard', compact('productCount', 'lowStockCount', 'orderCount', 'userCount', 'recentTransactions', 'orders', 'users'));
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);

        // Manually cascade deletions due to database restrictions
        if (method_exists($user, 'orders')) {
            foreach ($user->orders as $order) {
                if (method_exists($order, 'order_items')) {
                    $order->order_items()->delete();
                }
                $order->delete();
            }
        }
        
        $relations = ['addresses', 'reviews', 'cart', 'returnRequests', 'contactMessages'];
        foreach ($relations as $relation) {
            if (method_exists($user, $relation)) {
                $user->$relation()->delete();
            }
        }

        try {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\UserBannedMail($user->name ?? $user->full_name ?? 'User'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Failed to send ban email: " . $e->getMessage());
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully. An email has been dispatched notifying them.');
    }

    public function reviews()
    {
        $reviews = \App\Models\Review::with(['user', 'product'])->orderBy('review_date', 'desc')->paginate(10);
        return view('admin.reviews', compact('reviews'));
    }

    public function deleteReview($id)
    {
        $review = \App\Models\Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
