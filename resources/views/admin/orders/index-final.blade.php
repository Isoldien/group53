@extends('layouts.admin', ['title' => 'Order Management'])

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Order Management</h1>
            </div>

            <div class="p-6">
                <!-- Filters -->
                <form action="{{ route('orders.index') }}" method="GET" class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                            <input type="text" name="product_search" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" placeholder="Search by Product or Brand" value="{{ request('product_search') }}">
                        </div>

                        <input type="text" name="user_search" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" placeholder="Search by User" value="{{ request('user_search') }}">

                        <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all">
                            <option value="">All Status</option>
                            <option value="{{ \App\enums\OrderStatus::Pending->value }}" {{ request('status') === \App\enums\OrderStatus::Pending->value ? 'selected' : '' }}>Pending</option>
                            <option value="{{ \App\enums\OrderStatus::Packed->value }}" {{ request('status') === \App\enums\OrderStatus::Packed->value ? 'selected' : '' }}>Packed</option>
                            <option value="{{ \App\enums\OrderStatus::Shipped->value }}" {{ request('status') === \App\enums\OrderStatus::Shipped->value ? 'selected' : '' }}>Shipped</option>
                            <option value="{{ \App\enums\OrderStatus::Delivered->value }}" {{ request('status') === \App\enums\OrderStatus::Delivered->value ? 'selected' : '' }}>Delivered</option>
                        </select>

                        <button type="submit" class="px-4 py-2 bg-gray-800 dark:bg-gray-600 text-white rounded-lg hover:bg-gray-900 transition-colors">
                            Apply Filters
                        </button>
                    </div>
                </form>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border-l-4 border-green-500 text-green-700 dark:text-green-300 rounded-r-lg">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border-l-4 border-red-500 text-red-700 dark:text-red-300 rounded-r-lg">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Actions: Ship all pending orders or deliver all shipped orders -->
                <div class="actions mb-6">
                    <form action="{{ route('orders.ship_all') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Mark All Pending as Shipped
                        </button>
                    </form>
                    <form action="{{ route('orders.deliver_all') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Mark All Shipped as Delivered
                        </button>
                    </form>
                </div>

                <!-- Orders Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                        <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                            <th class="pb-3 px-2">ID</th>
                            <th class="pb-3 px-2">User Name</th>
                            <th class="pb-3 px-2">Status</th>
                            <th class="pb-3 px-2">Total Price</th>
                            <th class="pb-3 px-2">Order Date</th>
                            <th class="pb-3 px-2 text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach($orders as $order)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-2 text-sm text-gray-500 dark:text-gray-400">#{{ $order->order_id }}</td>
                                <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">{{ $order->user->name }}</td>
                                <td class="py-4 px-2 text-sm text-gray-600 dark:text-gray-300">{{ $order->status }}</td>
                                <td class="py-4 px-2 font-bold text-gray-900 dark:text-white">${{ number_format($order->total_price, 2) }}</td>
                                <td class="py-4 px-2">{{ $order->order_date->format('M d, Y') }}</td>
                                <td class="py-4 px-2 text-right space-x-2">
                                    <a href="{{ route('orders.edit', $order->order_id) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
