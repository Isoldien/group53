<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { font-family: 'Montserrat', sans-serif; }
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
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300">

<!-- NAV -->
<!-- NAV -->
@include('partials.navbar')

<!-- HERO SECTION -->
<div class="container mx-auto px-6 py-16">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl overflow-hidden">
        <div class="grid md:grid-cols-2 gap-8 items-center p-12">
            <div class="space-y-6">
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white leading-tight">Welcome to YouZoo</h1>
                <p class="text-xl text-gray-600 dark:text-gray-300">Welcome to YouZoo, a shop for all your pet needs, where we try to keep our prices afforable, quality high, and a our support even higher. <br>Please look around and shop with us!</p>
                <div class="flex space-x-4">
                    <a href="{{ url('/shoplisting') }}" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl">
                        Enter YouZoo
                    </a>
                    <a href="{{ url('/about') }}" class="px-8 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-lg font-semibold transition-colors">
                        Who are YouZoo?
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

<!-- OUR PRODUCTS -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Here are some YouZoo Products   </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($featuredProducts as $product)
        <div class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 flex flex-col">
            <a href="{{ route('products.show', $product->product_id) }}" class="block">
                @if($product->image_url)
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}" class="w-full aspect-video object-cover">
                @else
                    <div class="aspect-video flex items-center justify-center text-white text-lg font-bold bg-gradient-to-br from-green-400 to-teal-500 dark:from-green-600 dark:to-teal-700">
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

<!-- CATEGORIES -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Perhaps you might like to browse our categories instead?</h2>
    <div class="relative group px-4">
        <!-- Left Button -->
        <button onclick="document.getElementById('categories-container').scrollBy({left: -320, behavior: 'smooth'})" 
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white dark:bg-[#272e2d] p-3 rounded-full shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all opacity-0 group-hover:opacity-100 focus:opacity-100 -ml-2 hidden md:block border border-gray-200 dark:border-gray-700" aria-label="Scroll left">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        
        <!-- Carousel Container -->
        <div id="categories-container" class="flex overflow-x-auto gap-4 md:gap-6 pb-6 snap-x snap-mandatory scrollbar-hide -mx-4 px-4 scroll-smooth">
            @foreach($categories as $category)
                <div class="min-w-[85vw] sm:min-w-[280px] md:min-w-[320px] snap-center flex-shrink-0">
                    <a href="{{ route('shop.index', ['category' => $category->category_name]) }}" class="block group/card h-full">
                        <div class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 dark:border-gray-700 h-full flex flex-col justify-center relative overflow-hidden">
                            <!-- Decorative background circle -->
                            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full opacity-10 bg-green-400"></div>
                            
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 relative z-10 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400">
                                @if($loop->index % 3 == 0)
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                @elseif($loop->index % 3 == 1)
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 relative z-10">{{ $category->category_name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm relative z-10">{{ Str::limit($category->description, 50) ?? 'Explore our ' . $category->category_name . ' collection' }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Right Button -->
        <button onclick="document.getElementById('categories-container').scrollBy({left: 320, behavior: 'smooth'})" 
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white dark:bg-gray-800 p-3 rounded-full shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all opacity-0 group-hover:opacity-100 focus:opacity-100 -mr-2 hidden md:block border border-gray-200 dark:border-gray-700" aria-label="Scroll right">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </div>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</div>

<!-- FOOTER -->
@include('partials.footer')

</body>
</html>