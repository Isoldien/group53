<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $product->product_name }} - Details</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { font-family: 'Montserrat', sans-serif; }
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
        
        <!-- Assuming these are still needed or we can drop them if we move to tailwind completely -->
        {{-- @vite(['resources/css/app.css','resources/css/product_details.css','resources/js/product_details.js']) --}} 
        <!-- Commenting out vite assets to rely on CDN tailwind for consistency with other pages for now, 
             unless the user explicitly wanted to keep the custom JS/CSS. 
             The JS seems to handle reviews/stars. I'll include the JS logic for reviews if requested later, 
             but for now focusing on structure and data. 
        -->
    </head>
    <body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300">

        <!-- NAV -->
        @include('partials.navbar')

        <main class="flex flex-col items-center w-full gap-5 flex-1 container mx-auto px-6 py-8">

            <div class="flex flex-col items-center w-full">
                <!-- Product Header -->
                <h1 class="font-bold text-4xl md:text-5xl text-gray-900 dark:text-white mt-5 text-center">{{ $product->product_name }}</h1>
               
                <!-- Secondary Navigation / Breadcrumbs -->
                <nav class="mt-4">
                    <ul class="flex mb-5 font-bold text-gray-600 dark:text-gray-400 items-center text-sm md:text-base">
                        <li><a class="after:content-['›'] after:mx-3 hover:text-green-600 dark:hover:text-green-400" href="{{ route('home') }}">Home</a></li>
                        <li><a class="after:content-['›'] after:mx-3 hover:text-green-600 dark:hover:text-green-400" href="{{ route('shop.index') }}">Shop</a></li>
                        <li><span class="text-green-700 dark:text-green-300">{{ $product->category->category_name ?? 'Product' }}</span></li>
                    </ul>
                </nav>
            </div>


            <div class="flex w-full mb-5 gap-8 flex-col md:flex-row">

                <!-- Product Image -->
                <div class="w-full md:w-1/2 h-96 md:h-[500px]">
                    @if($product->image_url)
                        <img class="w-full h-full object-cover rounded-2xl shadow-lg" 
                             src="{{ filter_var($product->image_url, FILTER_VALIDATE_URL) ? $product->image_url : asset($product->image_url) }}" 
                             alt="{{ $product->product_name }}"
                             onerror="this.onerror=null; this.src='{{ asset('images/placeholder1.png') }}';"/>
                    @else
                        <img class="w-full h-full object-cover rounded-2xl shadow-lg" src="{{ asset('images/placeholder1.png') }}" alt="{{ $product->product_name }}"/>
                    @endif
                </div>


                <!-- Product Details -->
                <section class="flex flex-col w-full md:w-1/2 gap-4 p-6 bg-gray-50 dark:bg-gray-800 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $product->product_name }}</h3> 

                    <div class="flex items-center justify-between">
                         <p class="font-bold text-3xl text-green-600 dark:text-green-400">£{{ number_format($product->price, 2) }}</p>
                         
                         @if($product->stock_quantity > 0)
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">In Stock ({{ $product->stock_quantity }})</span>
                         @else
                             <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Out of Stock</span>
                         @endif
                    </div>
                   
                    <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                        {{ $product->description }}
                    </p>

                    @if($product->stock_quantity > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="flex flex-col gap-3 items-start mt-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        
                        <div class="flex items-center gap-3">
                            <label for="quantity" class="text-gray-700 dark:text-gray-300 font-medium">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock_quantity }}" value="1" class="w-16 px-2 py-1 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-center dark:text-white">
                        </div>
                        
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-xl transition-colors shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                             Add to Cart
                        </button>
                    </form>
                    @else
                        <button disabled class="w-full bg-gray-400 cursor-not-allowed text-white font-bold py-3 px-8 rounded-xl mt-4">
                            Sold Out
                        </button>
                    @endif


                    <div class="flex flex-col w-full bg-green-50 dark:bg-green-900/20 p-5 rounded-2xl mt-4 border border-green-100 dark:border-green-800">
                        <h4 class="font-bold text-green-800 dark:text-green-300 mb-2">Highlights</h4>
                        <ul class="list-disc pl-5 text-gray-700 dark:text-gray-300 space-y-1">
                            <li>Brand: {{ $product->brand ?? 'Generic' }}</li>
                            <li>Pet Type: {{ $product->pet_type ?? 'All' }}</li>
                            <li>Category: {{ $product->category->category_name ?? 'General' }}</li>
                        </ul>
                    </div>
                </section>
            </div>
           
            <hr class="mb-5 border-gray-200 dark:border-gray-700 w-full">


            <!-- Create Review -->
            <!-- Placeholder for Review System -->
            <section class="flex flex-col gap-4 items-center w-full max-w-2xl bg-white dark:bg-[#272e2d] p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700"> 
                <h2 class="text-gray-900 dark:text-white text-2xl font-bold text-center">Write a Product Review</h2>
                
                @if(session('success'))
                    <div class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @auth
                    <form action="{{ route('reviews.store', $product->product_id) }}" method="POST" class="w-full flex flex-col gap-4">
                         @csrf
                         <div class="flex flex-col gap-2">
                             <label for="rating" class="font-medium text-gray-700 dark:text-gray-300">Rating</label>
                             <select name="rating" id="rating" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white focus:ring-green-500 focus:border-green-500" required>
                                 <option value="" disabled selected>Select a rating</option>
                                 <option value="5">5 Stars - Excellent</option>
                                 <option value="4">4 Stars - Good</option>
                                 <option value="3">3 Stars - Average</option>
                                 <option value="2">2 Stars - Poor</option>
                                 <option value="1">1 Star - Terrible</option>
                             </select>
                         </div>
                         <textarea name="comment" placeholder="Share your experience..." rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 dark:text-white focus:ring-green-500 focus:border-green-500" required></textarea>
                         <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">Submit Review</button>
                    </form>
                @else
                    <p class="text-gray-600 dark:text-gray-400">Please <a href="{{ route('login') }}" class="text-green-600 hover:underline">login</a> to write a review.</p>
                @endauth
            </section>
               
            <!-- All Reviews -->
            <div class="w-full max-w-2xl mt-8"> 
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Customer Reviews</h2>
                @if($product->reviews->count() > 0)
                    <div class="space-y-4">
                        @foreach($product->reviews->sortByDesc('review_date') as $review)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border border-gray-100 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-gray-900 dark:text-white">{{ $review->user->name ?? $review->user->full_name ?? 'User' }}</h3>
                                <div class="text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            ★
                                        @else
                                            <span class="text-gray-300 dark:text-gray-600">★</span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ \Carbon\Carbon::parse($review->review_date)->format('F j, Y') }}</p>
                            <p class="text-gray-700 dark:text-gray-300">{{ $review->comment }}</p>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 text-center border border-gray-100 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400">No reviews yet.</p>
                    </div>
                @endif
            </div>
        </main>

        <!-- FOOTER -->
        @include('partials.footer')

    </body>
</html>