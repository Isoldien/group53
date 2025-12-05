<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | About Us</title>
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
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300 flex flex-col">

<!-- NAV -->
@include('partials.navbar')

<!-- HERO SECTION -->
<div class="relative py-20 overflow-hidden">
    <div class="container mx-auto px-6 relative z-10 text-center">
        <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">About YouZoo</h1>
        <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">We are passionate about connecting pets with the best products, ensuring health, and happiness </p>
    </div>
    <!-- Decorative background blobs -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-green-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
</div>

<!-- CONTENT SECTIONS -->
<div class="container mx-auto px-6 py-12 space-y-24">
    
    <!-- Our Mission -->
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Mission</h2>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                    At YouZoo, our mission is simple: to enrich the lives of pets and their owners. We believe that every pet deserves the best care, nutrition, and entertainment.
                </p>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    We carefully curate our selection to ensure safety, durability, and joy. Because when your pet is happy, you're happy.
                </p>
            </div>
        </div>
        <div class="order-1 md:order-2 flex justify-center">
             <div class="relative w-full max-w-md h-64 rounded-2xl shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500 flex items-center justify-center text-white font-bold text-2xl">
                
            </div>
        </div>
    </div>

    <!-- Our Values -->
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border-t-4 border-green-500 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Quality First</h3>
            <p class="text-gray-600 dark:text-gray-400">We never compromise on quality. Every product is tested and approved by our own furry experts.</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border-t-4 border-blue-500 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Sustainability</h3>
            <p class="text-gray-600 dark:text-gray-400">We are committed to eco-friendly practices and sustainable sourcing for a better planet.</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border-t-4 border-purple-500 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Community</h3>
            <p class="text-gray-600 dark:text-gray-400">We support local shelters and rescue organizations because every pet deserves a loving home.</p>
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="bg-gray-900 dark:bg-gray-950 text-white mt-auto">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">YouZoo</h3>
                <p class="text-gray-400">Quality pet products for your beloved companions.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-white font-bold transition-colors">About</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Policies</a></li>
                </ul>
            </div>
            <!-- Newsletter placeholder if needed -->
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© {{ date('Y') }} YouZoo. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
