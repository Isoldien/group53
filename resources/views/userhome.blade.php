<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Dashboard</title>
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
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300">

<!-- NAV -->
<!-- NAV -->
@include('partials.navbar')

<!-- DASHBOARD CONTENT -->
<div class="container mx-auto px-6 py-16">
    <div class="max-w-4xl mx-auto">
        
        <!-- Welcome Card -->
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl p-8 mb-8 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Dashboard</h1>
                    <p class="text-gray-600 dark:text-gray-400">Welcome back to YouZoo!</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                    <span class="text-sm font-medium text-green-600 dark:text-green-400">You are logged in!</span>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 rounded-r">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 dark:text-green-300">Your account is active and ready to shop!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <a href="{{ url('/shoplisting') }}" class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Browse Shop</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Explore our pet products</p>
           </a>

            <a href="#" class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">My Orders</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">View order history</p>
            </a>

            <a href="#" class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">My Profile</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Update account settings</p>
            </a>
        </div>

        <!-- Recent Activity / Order History -->
        <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                <h3 class="font-semibold text-gray-800 dark:text-gray-200">Order History</h3>
            </div>
            <div class="p-6">
                @if(isset($orders) && count($orders) > 0)
                    <div class="space-y-6">
                        @foreach($orders as $order)
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 pb-4 border-b border-gray-100 dark:border-gray-700">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Order #{{ $order->order_id }}</p>
                                        <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div class="mt-2 md:mt-0 text-right">
                                        <p class="font-bold text-gray-900 dark:text-white">£{{ number_format($order->total_price, 2) }}</p>
                                        <span class="inline-block px-2 py-1 text-xs rounded-full 
                                            {{ $order->status == 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Order Items -->
                                <div class="space-y-3">
                                    @if(isset($order->items) && count($order->items) > 0)
                                        @foreach($order->items as $item)
                                            <div class="flex items-center justify-between text-sm">
                                                <div class="flex items-center">
                                                    @if($item->image_url)
                                                        <img src="{{ $item->image_url }}" alt="{{ $item->product_name }}" class="w-10 h-10 object-cover rounded mr-3">
                                                    @else
                                                        <div class="w-10 h-10 bg-gray-200 rounded mr-3 flex items-center justify-center text-xs">No Img</div>
                                                    @endif
                                                    <span class="text-gray-700 dark:text-gray-300">{{ $item->product_name }}</span>
                                                    <span class="text-gray-500 dark:text-gray-500 ml-2">x{{ $item->quantity }}</span>
                                                </div>
                                                <span class="text-gray-600 dark:text-gray-400">£{{ number_format($item->price_at_purchase, 2) }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-sm text-gray-500">No items found for this order.</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        <p class="text-gray-500 dark:text-gray-400">No recent orders found</p>
                        <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">Start shopping to see your orders here!</p>
                        <a href="{{ url('/shoplisting') }}" class="mt-4 inline-block px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">Go to Shop</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<!-- FOOTER -->
@include('partials.footer')

</body>
</html>
