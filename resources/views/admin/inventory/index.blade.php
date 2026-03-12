@extends('layouts.admin', ['title' => 'Inventory Management'])

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Inventory Management</h1>
            <a href="{{ route('admin.inventory.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Product
            </a>
        </div>

        <div class="p-6">
            <!-- Filters -->
            <form action="{{ route('admin.inventory.index') }}" method="GET" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" name="search" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" placeholder="Search products..." value="{{ request('search') }}">
                    </div>
                    
                    <select name="category" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ request('category') == $category->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="stock_status" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all">
                        <option value="">All Stock Status</option>
                        <option value="low" {{ request('stock_status') == 'low' ? 'selected' : '' }}>Low Stock (≤10)</option>
                        <option value="out" {{ request('stock_status') == 'out' ? 'selected' : '' }}>Out of Stock</option>
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

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider border-b border-gray-100 dark:border-gray-700">
                            <th class="pb-3 px-2">ID</th>
                            <th class="pb-3 px-2">Product Name</th>
                            <th class="pb-3 px-2">Category</th>
                            <th class="pb-3 px-2">Price</th>
                            <th class="pb-3 px-2 text-center">Stock</th>
                            <th class="pb-3 px-2">Status</th>
                            <th class="pb-3 px-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="py-4 px-2 text-sm text-gray-500 dark:text-gray-400">#{{ $product->product_id }}</td>
                                <td class="py-4 px-2 font-medium text-gray-900 dark:text-white">{{ $product->product_name }}</td>
                                <td class="py-4 px-2 text-sm text-gray-600 dark:text-gray-300">{{ $product->category->category_name }}</td>
                                <td class="py-4 px-2 font-bold text-gray-900 dark:text-white">£{{ number_format($product->price, 2) }}</td>
                                <td class="py-4 px-2 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold 
                                        {{ $product->stock_quantity <= 10 ? ($product->stock_quantity <= 0 ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200') : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}">
                                        {{ $product->stock_quantity }}
                                    </span>
                                </td>
                                <td class="py-4 px-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="py-4 px-2 text-right space-x-2">
                                    <a href="{{ route('admin.inventory.edit', $product->product_id) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.inventory.destroy', $product->product_id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
