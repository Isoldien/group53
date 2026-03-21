@extends('layouts.admin', ['title' => 'Admin Dashboard'])

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
        <div class="flex items-center space-x-2">
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">System Overview</span>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Products</h3>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $productCount }}</p>
            <a href="{{ route('admin.inventory.index') }}" class="text-blue-600 dark:text-blue-400 text-sm mt-4 inline-block hover:underline">View All →</a>
        </div>

        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Low Stock</h3>
            <p class="text-3xl font-bold text-red-600 dark:text-red-400 mt-1">{{ $lowStockCount }}</p>
            <a href="{{ route('admin.inventory.index', ['stock_status' => 'low']) }}" class="text-red-600 dark:text-red-400 text-sm mt-4 inline-block hover:underline">View List →</a>
        </div>

        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Orders</h3>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $orderCount }}</p>
        </div>

        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Users </h3>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $userCount }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Activity -->
        <div class="lg:col-span-2 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800 dark:text-gray-200">Recent Inventory Activity</h3>
            </div>
            <div class="p-6 overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                            <th class="pb-3 px-2">Date</th>
                            <th class="pb-3 px-2">Product</th>
                            <th class="pb-3 px-2">Change</th>
                            <th class="pb-3 px-2">Type</th>
                            <th class="pb-3 px-2">User</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentTransactions as $transaction)
                            <tr class="text-sm hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $transaction->created_at->format('M d, H:i') }}</td>
                                <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">{{ $transaction->product->product_name ?? 'Deleted Product' }}</td>
                                <td class="py-4 px-2">
                                    <span class="font-bold {{ $transaction->quantity_change > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $transaction->quantity_change > 0 ? '+' : '' }}{{ $transaction->quantity_change }}
                                    </span>
                                </td>
                                <td class="py-4 px-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $transaction->user->name ?? 'System' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500">No activity yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-bold text-gray-800 dark:text-gray-200">Quick Actions</h3>
            </div>
            <div class="p-6 space-y-4">
                <a href="{{ route('admin.inventory.create') }}" class="flex items-center p-3 text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50 rounded-xl hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors group">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="font-medium">Add New Product</span>
                </a>
                <a href="{{ route('admin.inventory.index') }}" class="flex items-center p-3 text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors group">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </div>
                    <span class="font-medium">Full Inventory View</span>
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="flex items-center p-3 text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50 rounded-xl hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-colors group">
                    <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                    </div>
                    <span class="font-medium">Manage Reviews</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Orders Management -->
    <div class="mt-8 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl">Order Management</h2>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                        <th class="pb-3 px-2">Order ID</th>
                        <th class="pb-3 px-2">User</th>
                        <th class="pb-3 px-2">Items</th>
                        <th class="pb-3 px-2">Total</th>
                        <th class="pb-3 px-2">Status</th>
                        <th class="pb-3 px-2">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($orders as $order)
                        <tr class="text-sm hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">#{{ $order->order_id }}</td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $order->user->name ?? $order->user->full_name ?? 'Guest/Deleted' }}</td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">
                                {{ $order->order_items->sum('quantity') }} items <span class="text-xs text-gray-400">({{ $order->order_items->count() }} unique)</span>
                            </td>
                            <td class="py-4 px-2 font-bold text-green-600 dark:text-green-400">£{{ number_format($order->total_price, 2) }}</td>
                            <td class="py-4 px-2">
                                <span class="px-2 py-1 rounded text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">{{ ucfirst($order->status->value ?? $order->status) }}</span>
                            </td>
                            <td class="py-4 px-2 text-gray-500 dark:text-gray-400">{{ $order->order_date ? \Carbon\Carbon::parse($order->order_date)->format('M d, Y') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-6 text-center text-gray-500">No orders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $orders->links() }}</div>
        </div>
    </div>

    <!-- Users Management -->
    <div class="mt-8 bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h2 class="font-bold text-gray-800 dark:text-gray-200 text-xl">User Management</h2>
        </div>
        <div class="p-6 overflow-x-auto">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif
            <table class="w-full text-left">
                <thead>
                    <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                        <th class="pb-3 px-2">User ID</th>
                        <th class="pb-3 px-2">Name</th>
                        <th class="pb-3 px-2">Email</th>
                        <th class="pb-3 px-2">Orders</th>
                        <th class="pb-3 px-2">Reviews</th>
                        <th class="pb-3 px-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="text-sm hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="py-4 px-2 text-gray-500">#{{ $user->user_id }}</td>
                            <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">{{ $user->name ?? $user->full_name ?? 'N/A' }}</td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->orders_count ?? 0 }}</td>
                            <td class="py-4 px-2 text-gray-600 dark:text-gray-400">{{ $user->reviews_count ?? 0 }}</td>
                            <td class="py-4 px-2 text-right">
                                @if(auth()->id() !== $user->user_id)
                                <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to ban and delete this user? An email will be sent to them.');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 font-bold px-3 py-1 rounded border border-red-200 dark:border-red-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">Ban / Delete</button>
                                </form>
                                @else
                                    <span class="text-gray-400 italic">Current User</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-6 text-center text-gray-500">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
