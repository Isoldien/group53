<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { font-family: 'Quicksand', sans-serif; }
        .glass {
            background: rgba(153, 207, 148, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(1px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .dark .glass {
            background: rgba(39, 90, 47, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
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

<!-- NAV -->
<!-- NAV -->
@include('partials.navbar')

<!-- HERO SECTION -->
<div class="container mx-auto px-6 py-16">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="grid md:grid-cols-2 gap-8 items-center p-12">
            <div class="space-y-6">
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white leading-tight">Discover Quality Pet Products</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">Welcome to YouZoo, where quality meets care.</p>
                <div class="flex space-x-4">
                    <a href="{{ url('/shoplisting') }}" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl">
                        Shop Now
                    </a>
                    <a href="{{ url('/about') }}" class="px-8 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-lg font-semibold transition-colors">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="w-full h-64 bg-gradient-to-br from-red-500 to-blue-500 dark:from-red-600 dark:to-blue-700 rounded-xl flex items-center justify-center text-white text-2xl font-bold shadow-2xl">
                    <img src="{{ asset('images/placeholder1.png') }}" alt="Hero Image" class="w-full h-full object-cover rounded-xl">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CATEGORIES -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Shop by Category</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $category)
            <a href="{{ route('shop.index', ['category' => $category->category_name]) }}" class="block group">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition-shadow duration-300 cursor-pointer border border-gray-100 dark:border-gray-700 h-full">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4
                        {{ $loop->index % 3 == 0 ? 'bg-orange-100 dark:bg-orange-900/30' : '' }}
                        {{ $loop->index % 3 == 1 ? 'bg-purple-100 dark:bg-purple-900/30' : '' }}
                        {{ $loop->index % 3 == 2 ? 'bg-blue-100 dark:bg-blue-900/30' : '' }}
                    ">
                        @if($loop->index % 3 == 0)
                            <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        @elseif($loop->index % 3 == 1)
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @else
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $category->category_name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ Str::limit($category->description, 50) ?? 'Explore our ' . $category->category_name . ' collection' }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- OUR PRODUCTS -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Some of our products</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($featuredProducts as $product)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 flex flex-col">
            <a href="{{ route('products.show', $product->product_id) }}" class="block">
                @if($product->image_url)
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover">
                @else
                    <div class="h-48 flex items-center justify-center text-white text-lg font-bold
                        {{ $loop->index % 3 == 0 ? 'bg-gradient-to-br from-pink-400 to-purple-500 dark:from-pink-600 dark:to-purple-700' : '' }}
                        {{ $loop->index % 3 == 1 ? 'bg-gradient-to-br from-yellow-400 to-orange-500 dark:from-yellow-600 dark:to-orange-700' : '' }}
                        {{ $loop->index % 3 == 2 ? 'bg-gradient-to-br from-green-400 to-teal-500 dark:from-green-600 dark:to-teal-700' : '' }}
                    ">
                        {{ Str::limit($product->product_name, 15) }}
                    </div>
                @endif
            </a>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    <a href="{{ route('products.show', $product->product_id) }}" class="hover:text-green-600 transition-colors">
                        {{ $product->product_name }}
                    </a>
                </h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4 flex-grow">{{ Str::limit($product->description, 60) }}</p>
                <div class="flex justify-between items-center mt-auto">
                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">£{{ number_format($product->price, 2) }}</span>
                    <a href="{{ route('products.show', $product->product_id) }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @empty
            <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">
                <p>No featured products available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- FOOTER -->
@include('partials.footer')

</body>
</html>