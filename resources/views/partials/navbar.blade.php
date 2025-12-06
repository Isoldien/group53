<nav class="sticky top-0 z-50 shadow-lg bg-[rgba(153,207,148,0.7)] backdrop-blur-md border border-white/20 dark:bg-[rgba(39,90,47,0.7)] dark:border-white/5 transition-colors duration-300">
    <div class="container mx-auto px-6 py-6">
        <div class="flex justify-between items-center relative">
            
            <!-- Left Navigation (Desktop) -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" 
                   class="{{ request()->is('/') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center gap-2">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                   Home
                </a>
                
                <a href="{{ url('/about') }}" 
                   class="{{ request()->is('about') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center gap-2">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                   About YouZoo
                </a>

                <a href="{{ url('/shoplisting') }}" 
                   class="{{ request()->is('shoplisting') || request()->is('shoplisting/*') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center gap-2">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                   Our Products
                </a>
            </div>

            <!-- Centered Title & Icon -->
            <div class="flex flex-col items-center md:absolute md:left-1/2 md:transform md:-translate-x-1/2">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white tracking-tight leading-none">YouZoo</h2>
                <svg class="w-6 h-6 text-green-700 dark:text-green-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C13.65 2 15 3.35 15 5C15 6.65 13.65 8 12 8C10.35 8 9 6.65 9 5C9 3.35 10.35 2 12 2ZM6.5 6C7.88 6 9 7.12 9 8.5C9 9.88 7.88 11 6.5 11C5.12 11 4 9.88 4 8.5C4 7.12 5.12 6 6.5 6ZM17.5 6C18.88 6 20 7.12 20 8.5C20 9.88 18.88 11 17.5 11C16.12 11 15 9.88 15 8.5C15 7.12 16.12 6 17.5 6ZM12 10C15 10 17 12 17 15C17 16.5 16 18.5 14 20C13 20.75 12 22 12 22C12 22 11 20.75 10 20C8 18.5 7 16.5 7 15C7 12 9 10 12 10Z"></path>
                </svg>
            </div>
            
            <!-- Right Navigation (Desktop) -->
            <div class="hidden md:flex items-center space-x-6">
                @guest
                    <a href="{{ url('/login') }}" 
                       class="{{ request()->is('login') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center gap-2">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"></path></svg>
                       Login
                    </a>
                @else
                    <a href="{{ url('/dashboard') }}" 
                       class="{{ request()->is('dashboard') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center gap-2">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                       My Dashboard
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 dark:text-gray-200 hover:text-red-600 dark:hover:text-red-400 transition-colors font-medium text-lg">
                            Logout
                        </button>
                    </form>
                @endguest

                <a href="{{ route('cart.index') }}" 
                   class="{{ request()->routeIs('cart.index') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} text-lg hover:text-green-600 dark:hover:text-green-400 transition-colors flex items-center">
                    <div class="relative">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </div>
                    Basket
                </a>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" class="p-2 rounded-full bg-gray-200/50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 hover:bg-gray-300/50 dark:hover:bg-gray-600/50 transition-colors focus:outline-none backdrop-blur-sm" aria-label="Toggle Dark Mode">
                    <!-- Icon for Dark Mode (Switch to Light) - Outline Paw -->
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C13.65 2 15 3.35 15 5C15 6.65 13.65 8 12 8C10.35 8 9 6.65 9 5C9 3.35 10.35 2 12 2ZM6.5 6C7.88 6 9 7.12 9 8.5C9 9.88 7.88 11 6.5 11C5.12 11 4 9.88 4 8.5C4 7.12 5.12 6 6.5 6ZM17.5 6C18.88 6 20 7.12 20 8.5C20 9.88 18.88 11 17.5 11C16.12 11 15 9.88 15 8.5C15 7.12 16.12 6 17.5 6ZM12 10C15 10 17 12 17 15C17 16.5 16 18.5 14 20C13 20.75 12 22 12 22C12 22 11 20.75 10 20C8 18.5 7 16.5 7 15C7 12 9 10 12 10Z"></path>
                    </svg>
                    <!-- Icon for Light Mode (Switch to Dark) - Filled Paw -->
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C13.65 2 15 3.35 15 5C15 6.65 13.65 8 12 8C10.35 8 9 6.65 9 5C9 3.35 10.35 2 12 2ZM6.5 6C7.88 6 9 7.12 9 8.5C9 9.88 7.88 11 6.5 11C5.12 11 4 9.88 4 8.5C4 7.12 5.12 6 6.5 6ZM17.5 6C18.88 6 20 7.12 20 8.5C20 9.88 18.88 11 17.5 11C16.12 11 15 9.88 15 8.5C15 7.12 16.12 6 17.5 6ZM12 10C15 10 17 12 17 15C17 16.5 16 18.5 14 20C13 20.75 12 22 12 22C12 22 11 20.75 10 20C8 18.5 7 16.5 7 15C7 12 9 10 12 10Z"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center space-x-4 md:hidden ml-auto">
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
                       About YouZoo
                    </a>
                </li>
                <li>
                    <a href="{{ url('/shoplisting') }}" 
                       class="{{ request()->is('shoplisting') || request()->is('shoplisting/*') ? 'text-green-800 dark:text-green-300 font-bold' : 'text-gray-700 dark:text-gray-200 font-medium' }} hover:text-green-600 dark:hover:text-green-400 transition-colors block">
                       Our Products
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
                       My Dashboard
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
                        Basket
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
