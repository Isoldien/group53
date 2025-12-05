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
<nav class="glass sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">YouZoo</h2>
            <div class="flex items-center space-x-6">
                <ul class="flex space-x-6 items-center">
                    <li><a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors font-medium">Home</a></li>
                    <li><a href="{{ url('/shoplisting') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors font-medium">Shop</a></li>
                    <li><a href="{{ url('/login') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors font-medium">Login</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors font-medium">Cart</a></li>
                </ul>
                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors focus:outline-none">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</nav>

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
                    <a href="#" class="px-8 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white rounded-lg font-semibold transition-colors">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="w-full h-64 bg-gradient-to-br from-red-500 to-blue-500 dark:from-red-600 dark:to-blue-700 rounded-xl flex items-center justify-center text-white text-2xl font-bold shadow-2xl">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CATEGORIES -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Shop by Category</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition-shadow duration-300 cursor-pointer border border-gray-100 dark:border-gray-700">
            <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Dog Food</h3>
            <p class="text-gray-600 dark:text-gray-400">Premium nutrition for your furry friend</p>
        </div>
        
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition-shadow duration-300 cursor-pointer border border-gray-100 dark:border-gray-700">
            <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Cat Toys</h3>
            <p class="text-gray-600 dark:text-gray-400">Fun and engaging toys for cats</p>
        </div>
        
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 text-center hover:shadow-2xl transition-shadow duration-300 cursor-pointer border border-gray-100 dark:border-gray-700">
            <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Pet Supplies</h3>
            <p class="text-gray-600 dark:text-gray-400">Everything your pet needs</p>
        </div>
    </div>
</div>

<!-- FEATURED PRODUCTS -->
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">Featured Products</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700">
            <div class="h-48 bg-gradient-to-br from-pink-400 to-purple-500 dark:from-pink-600 dark:to-purple-700 flex items-center justify-center text-white text-lg font-bold">
                [Image] Product 1
            </div>
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Premium Dog Food</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">High-quality nutrition for your dog</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">£29.99</span>
                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">Add to Cart</button>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700">
            <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 dark:from-yellow-600 dark:to-orange-700 flex items-center justify-center text-white text-lg font-bold">
                [Image] Product 2
            </div>
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Interactive Cat Toy</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Keep your cat entertained for hours</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">£14.99</span>
                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">Add to Cart</button>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100 dark:border-gray-700">
            <div class="h-48 bg-gradient-to-br from-green-400 to-teal-500 dark:from-green-600 dark:to-teal-700 flex items-center justify-center text-white text-lg font-bold">
                [Image] Product 3
            </div>
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Pet Grooming Kit</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Professional grooming at home</p>
                <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">£39.99</span>
                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-gray-900 dark:bg-gray-950 text-white mt-16">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">YouZoo</h3>
                <p class="text-gray-400">Quality pet products for your beloved companions.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Policies</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <div class="flex space-x-2">
                    <input type="email" id="emailInput" placeholder="Your email" class="flex-1 px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-green-500">
                    <button type="button" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© {{ date('Y') }} YouZoo. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>