<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { font-family: 'Quicksand', sans-serif; }
    </style>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        function toggleDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300">

<!-- NAVBAR -->
<!-- NAVBAR -->
@include('partials.navbar')

<!-- PAGE HEADER -->
<header class="container mx-auto px-6 py-8">
    <h3 class="text-4xl font-bold text-gray-900 dark:text-white text-center">Shop All Products</h3>
</header>

<!-- MAIN LAYOUT -->
<div class="container mx-auto px-6 pb-12">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        <!-- FILTER SIDEBAR -->
        <aside class="lg:col-span-1">
            <form action="{{ route('shop.index') }}" method="GET" class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 sticky top-24">
                
                <!-- SEARCH BOX -->
                <div class="mb-6">
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search Products</label>
                    <div class="relative">
                        <input 
                            id="search" 
                            name="search"
                            type="text" 
                            value="{{ request('search') }}"
                            placeholder="Search..."
                            class="w-full px-4 py-2 pr-10 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400"
                        >
                        @if(request('search'))
                            <a href="{{ route('shop.index', request()->except('search')) }}" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200" title="Clear Search">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- CATEGORY FILTER -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Category</h4>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="category" value="{{ $category->category_name }}" {{ request('category') == $category->category_name ? 'checked' : '' }} class="text-green-600 focus:ring-green-500">
                                <span class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-colors">{{ $category->category_name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- PRICE FILTER -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Price Range</h4>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="price_range" value="low" {{ request('price_range') == 'low' ? 'checked' : '' }} class="text-green-600 focus:ring-green-500">
                            <span class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-colors">£5 - £10</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="price_range" value="medium" {{ request('price_range') == 'medium' ? 'checked' : '' }} class="text-green-600 focus:ring-green-500">
                            <span class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-colors">£10 - £20</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="price_range" value="high" {{ request('price_range') == 'high' ? 'checked' : '' }} class="text-green-600 focus:ring-green-500">
                            <span class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-colors">£20+</span>
                        </label>
                    </div>
                </div>

                <!-- PET TYPE FILTER -->
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Pet Type</h4>
                    <div class="space-y-2">
                        @foreach($petTypes as $type)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" name="pet_type" value="{{ $type }}" {{ request('pet_type') == $type ? 'checked' : '' }} class="text-green-600 focus:ring-green-500">
                                <span class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 transition-colors">{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                        Apply
                    </button>
                    <a href="{{ route('shop.index') }}" class="flex-1 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-bold py-2 px-4 rounded-lg text-center transition-colors">
                        Reset
                    </a>
                </div>

            </form>
        </aside>

        <!-- PRODUCT GRID -->
        <section class="lg:col-span-3">
            @if($products->isEmpty())
                <div class="flex flex-col items-center justify-center h-64 text-center">
                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">No products found</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Try adjusting your search or filters.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 flex flex-col">
                            <a href="{{ route('products.show', $product->product_id) }}" class="block">
                                <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden group">
                                    @if($product->image_url)
                                        <img src="{{ $product->image_url }}" alt="{{ $product->product_name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-100 to-blue-100 dark:from-gray-700 dark:to-gray-600">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    
                                    @if($product->stock_quantity <= 0)
                                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                            <span class="bg-red-600 text-white px-4 py-1 rounded-full font-bold transform -rotate-12 shadow-lg">SOLD OUT</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            
                            <div class="p-4 flex-1 flex flex-col">
                                <div class="mb-2">
                                    <span class="text-xs font-semibold text-green-600 dark:text-green-400 uppercase tracking-wider">{{ $product->category->category_name ?? 'Product' }}</span>
                                    <a href="{{ route('products.show', $product->product_id) }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                                        <h4 class="text-lg font-bold text-gray-900 dark:text-white leading-tight mt-1">{{ $product->product_name }}</h4>
                                    </a>
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                                
                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-2xl font-bold text-gray-900 dark:text-white">£{{ number_format($product->price, 2) }}</span>
                                    
                                    @if($product->stock_quantity > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-lg transition-colors shadow-md hover:shadow-lg" title="Add to Cart">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            </button>
                                        </form>
                                    @else
                                        <button disabled class="bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 p-2 rounded-lg cursor-not-allowed">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </section>
    </div>
</div>

<!-- FOOTER -->
<!-- FOOTER -->
@include('partials.footer')

</body>
</html>
