<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Register</title>
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
<!-- NAV -->
@include('partials.navbar')

<!-- REGISTER SECTION -->
<section class="container mx-auto px-6 py-16">
    <div class="max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Create Account</h3>
                <p class="text-gray-600 dark:text-gray-400">Join YouZoo today</p>
            </div>

            <form class="space-y-6">
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                    <input 
                        type="text" 
                        id="fullname" 
                        placeholder="Enter your name"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <div>
                    <label for="regEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="regEmail" 
                        placeholder="Enter your email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <div>
                    <label for="regPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="regPassword" 
                        placeholder="Create password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <div>
                    <label for="regConfirmPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirm Password</label>
                    <input 
                        type="password" 
                        id="regConfirmPassword" 
                        placeholder="Re-enter password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <button 
                    type="button"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl"
                >
                    Register
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                    Already have an account? 
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
