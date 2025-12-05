<nav class="sticky top-0 z-50 shadow-lg bg-[rgba(153,207,148,0.7)] backdrop-blur-md border border-white/20 dark:bg-[rgba(39,90,47,0.7)] dark:border-white/5 transition-colors duration-300">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">YouZoo</h2>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <ul class="flex space-x-6 items-center">
                    <li>
                        <a href="{{ url('/') }}" 
                           class="{{ request()->is('/') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors">
                           Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" 
                           class="{{ request()->is('about') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors">
                           About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/shoplisting') }}" 
                           class="{{ request()->is('shoplisting') || request()->is('shoplisting/*') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors">
                           Shop
                        </a>
                    </li>
                    @guest
                    <li>
                        <a href="{{ url('/login') }}" 
                           class="{{ request()->is('login') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors">
                           Login
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/dashboard') }}" 
                           class="{{ request()->is('dashboard') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors">
                           Dashboard
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 transition-colors font-medium">
                                Logout
                            </button>
                        </form>
                    </li>
                    @endguest
                    <li>
                        <a href="{{ route('cart.index') }}" 
                           class="{{ request()->routeIs('cart.index') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center">
                            <div class="relative">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                @if(isset($cartCount) && $cartCount > 0)
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </div>
                            Cart
                        </a>
                    </li>
                </ul>
                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-gray-200/50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 hover:bg-gray-300/50 dark:hover:bg-gray-600/50 transition-colors focus:outline-none backdrop-blur-sm">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center space-x-4 md:hidden">
                 <!-- Dark Mode Toggle (Mobile) -->
                 <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-gray-200/50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 hover:bg-gray-300/50 dark:hover:bg-gray-600/50 transition-colors focus:outline-none backdrop-blur-sm">
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </button>
                <button id="mobile-menu-btn" class="text-gray-700 dark:text-gray-200 hover:text-green-600 dark:hover:text-green-400 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 transition-all duration-300 ease-in-out">
            <ul class="flex flex-col space-y-4">
                <li>
                    <a href="{{ url('/') }}" 
                       class="{{ request()->is('/') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about') }}" 
                       class="{{ request()->is('about') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shoplisting') }}" 
                       class="{{ request()->is('shoplisting') || request()->is('shoplisting/*') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       Shop
                    </a>
                </li>
                @guest
                <li>
                    <a href="{{ url('/login') }}" 
                       class="{{ request()->is('login') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       Login
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/dashboard') }}" 
                       class="{{ request()->is('dashboard') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       Dashboard
                    </a>
                </li>
                <li>
                     <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 transition-colors font-medium text-left w-full">
                            Logout
                        </button>
                    </form>
                </li>
                @endguest
                <li>
                    <a href="{{ route('cart.index') }}" 
                       class="{{ request()->routeIs('cart.index') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });
</script>
