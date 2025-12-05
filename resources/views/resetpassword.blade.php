<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Reset Password</title>
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

<!-- NAV -->
<nav class="bg-white dark:bg-gray-800 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">YouZoo</h2>
            </div>
            <div class="flex items-center space-x-6">
                <ul class="flex space-x-6 items-center">
                    <li><a href="{{ url('/') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Home</a></li>
                    <li><a href="{{ url('/shoplisting') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Shop</a></li>
                    <li><a href="{{ url('/login') }}" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 transition-colors">Login</a></li>
                </ul>
                <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors focus:outline-none">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- RESET PASSWORD SECTION -->
<section class="container mx-auto px-6 py-16">
    <div class="max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Reset Password</h3>
                <p class="text-gray-600 dark:text-gray-400">Enter your email to receive a reset link</p>
            </div>

            <form class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        placeholder="Enter your email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <button 
                    type="button"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl"
                >
                    Send Reset Link
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                    Remember your password? 
                    <a href="{{ url('/login') }}" class="text-green-600 dark:text-green-400 hover:underline font-medium">Login Here</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gray-900 dark:bg-gray-950 text-white mt-16">
    <div class="container mx-auto px-6 py-8">
        <div class="text-center space-y-2">
            <p class="text-gray-400">YouZoo © {{ date('Y') }} | <a href="#" class="hover:text-white transition-colors">About</a> | <a href="#" class="hover:text-white transition-colors">Contact</a> | <a href="#" class="hover:text-white transition-colors">Policies</a></p>
        </div>
    </div>
</footer>

</body>
</html>
