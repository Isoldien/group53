@extends('layouts.admin', ['title' => 'Add New Product'])

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Add New Product</h1>
        </div>

        <form action="{{ route('admin.inventory.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="product_name" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all @error('product_name') border-red-500 @enderror" value="{{ old('product_name') }}" required>
                    @error('product_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="category_id" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all @error('category_id') border-red-500 @enderror" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label for="description" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="price" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Price (£)</label>
                    <input type="number" step="0.01" name="price" id="price" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all @error('price') border-red-500 @enderror" value="{{ old('price') }}" required>
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label for="stock_quantity" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Stock Quantity</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all @error('stock_quantity') border-red-500 @enderror" value="{{ old('stock_quantity') }}" required>
                    @error('stock_quantity') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="brand" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Brand</label>
                    <input type="text" name="brand" id="brand" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" value="{{ old('brand') }}">
                </div>

                <div class="space-y-2">
                    <label for="pet_type" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Pet Type</label>
                    <input type="text" name="pet_type" id="pet_type" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" value="{{ old('pet_type') }}">
                </div>
            </div>

            <div class="space-y-2">
                <label for="image_url" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 transition-all" value="{{ old('image_url') }}">
            </div>

            <div class="flex justify-between items-center pt-6 border-t border-gray-100 dark:border-gray-700">
                <a href="{{ route('admin.inventory.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white font-medium">Cancel</a>
                <button type="submit" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-green-500/20">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
