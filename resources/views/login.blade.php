<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Login</title>
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

<!-- LOGIN SECTION -->
<section class="container mx-auto px-6 py-16">
    <div class="max-w-md mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Welcome Back</h3>
                <p class="text-gray-600 dark:text-gray-400">Login to your account</p>
            </div>

            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        required
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 transition-colors"
                    >
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>
                </div>

                <button 
                    type="submit"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors shadow-lg hover:shadow-xl"
                >
                    Login
                </button>
            </form>

            <div class="mt-6 space-y-3 text-center text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                    Forgot Password? 
                    <a href="{{ url('/resetpassword') }}" class="text-green-600 dark:text-green-400 hover:underline font-medium">Reset Link</a>
                </p>
                <p class="text-gray-600 dark:text-gray-400">
                    Don't have an account? 
                    <a href="{{ url('/register') }}" class="text-green-600 dark:text-green-400 hover:underline font-medium">Register Here</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
@include('partials.footer')

</body>
</html>
