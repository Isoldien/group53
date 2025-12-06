<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Shopping Cart</title>
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
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300 flex flex-col">

<!-- NAV -->
@include('partials.navbar')

<!-- PAGE HEADER -->
<div class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Shopping Cart</h1>
    <p class="text-gray-600 dark:text-gray-400">Review your selected items before proceeding to checkout.</p>
</div>

<!-- CART CONTENT -->
<div class="container mx-auto px-6 pb-20 flex-grow">
    
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if(count($cartItems) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Items List -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white dark:bg-[#272e2d] rounded-xl shadow-md overflow-hidden flex flex-col sm:flex-row border border-gray-100 dark:border-gray-700">
                    <!-- Image -->
                    <div class="sm:w-32 h-32 bg-gray-200 dark:bg-gray-700 flex-shrink-0">
                        @if($item->image_url)
                            <img src="{{ $item->image_url }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Details -->
                    <div class="p-4 flex flex-1 flex-col justify-between">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->product_name }}</h3>
                                <!-- <p class="text-sm text-gray-500">{{ $item->description }}</p> -->
                            </div>
                            <span class="text-lg font-bold text-green-600 dark:text-green-400">£{{ number_format($item->subtotal, 2) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center mt-4">
                            <!-- Update Quantity Form -->
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->cart_item_id }}">
                                <label class="text-sm text-gray-500 dark:text-gray-400">Qty:</label>
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 px-2 py-1 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-center text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500" onchange="this.form.submit()">
                            </form>

                            <!-- Remove Button Form -->
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->cart_item_id }}">
                                <button type="submit" class="text-red-500 hover:text-red-700 dark:hover:text-red-400 transition-colors text-sm font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Summary Card -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-[#272e2d] rounded-xl shadow-xl p-6 border border-gray-100 dark:border-gray-700 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Order Summary</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Subtotal</span>
                            <span>£{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-3 flex justify-between font-bold text-lg text-gray-900 dark:text-white">
                            <span>Total</span>
                            <span class="text-green-600 dark:text-green-400">£{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                            Proceed to Checkout
                        </button>
                    </form>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ url('/shoplisting') }}" class="text-sm text-gray-500 hover:text-green-600 dark:hover:text-green-400 transition-colors">
                            or Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    @else
        <!-- Empty Cart State -->
        <div class="text-center py-20 bg-white dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700">
            <div class="w-24 h-24 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Your cart is empty</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-sm mx-auto">Looks like you haven't added anything to your cart yet.</p>
            <a href="{{ url('/shoplisting') }}" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all">
                Start Shopping
            </a>
        </div>
    @endif
    
</div>

<!-- FOOTER -->
@include('partials.footer')

</body>
</html>