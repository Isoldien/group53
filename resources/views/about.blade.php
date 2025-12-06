<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300 flex flex-col">

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

    <!-- Our Values & Location -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Value 1 -->
        <div class="bg-white dark:bg-[#272e2d] p-8 rounded-xl shadow-lg border-t-4 border-green-400 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Quality</h3>
            <p class="text-gray-600 dark:text-gray-400">We ensure our products are of high quality and safe for your pet.</p>
        </div>
        <!-- Value 2 -->
        <div class="bg-white dark:bg-[#272e2d] p-8 rounded-xl shadow-lg border-t-4 border-green-400 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Supportive</h3>
            <p class="text-gray-600 dark:text-gray-400">We try our best to help all our customers and their pets</p>
        </div>
        <!-- Value 3 -->
        <div class="bg-white dark:bg-[#272e2d] p-8 rounded-xl shadow-lg border-t-4 border-green-400 hover:shadow-2xl transition-shadow">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Cheap</h3>
            <p class="text-gray-600 dark:text-gray-400">We know that you want to save money, so we try to keep our prices affordable.</p>
        </div>
        
        <!-- Location -->
        <div class="bg-white dark:bg-[#272e2d] rounded-xl shadow-lg p-8 border border-gray-100 dark:border-gray-700 text-center flex flex-col items-center justify-center hover:shadow-2xl transition-shadow">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Want to meet us?</h2>
            <div class="flex flex-col items-center justify-center space-y-2">
                 <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-1">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <p class="text-lg font-semibold text-gray-900 dark:text-white">YouZoo</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    42 Barking Road<br>
                    Kensington<br>
                    London, SW7 2AZ
                </p>
            </div>
        </div>
    </div>
    
    <!-- Our Mission -->
    <div class="flex flex-col gap-12 items-center max-w-4xl mx-auto">
        <div class="w-full">
            <div class="bg-white dark:bg-[#272e2d] p-8 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 text-center">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-6 mx-auto">
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
        <div class="w-full flex justify-center">
             <div class="relative w-full max-w-md h-64 rounded-2xl shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500 flex items-center justify-center text-white font-bold text-2xl">
                <img src="{{ asset('images/placeholder1.png') }}" alt="" class="w-full h-full object-cover rounded-2xl"> 
            </div>
        </div>
    </div>

</div>

<!-- FOOTER -->
@include('partials.footer')

</body>
</html>
