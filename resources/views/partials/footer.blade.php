<!-- FOOTER stored in partials for code reuse -->
<footer class="bg-[#253b32] dark:bg-[#253b32] text-white mt-16 transition-colors duration-300">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">YouZoo</h3>
                <p class="text-gray-400">Quality pet products for your beloved companions.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="flex space-x-6">
                    <li><a href="{{ url('/about') }}" class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors"><svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>About</a></li>
                    <li><a href="{{ url('/contact') }}" class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors"><svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>Contact</a></li>
                    <li><a href="#" class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors"><svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>Policies</a></li>
                </ul>
            </div>
            <div>
                <!-- @TODO Newsletter -->
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <div class="flex space-x-2">
                    <input type="email" id="emailInput" placeholder="Your email" class="flex-1 px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:outline-none focus:border-green-500">
                    <button type="button" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors">Subscribe</button>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© {{ date('Y') }} YouZoo. All rights reserved.</p>
<div class="mt-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-orange-500 bg-[length:200%_200%] animate-[gradient_5s_ease-in-out_infinite]" style="background-size:200% 200%;">
  YouZoo
</div>
<style>
@keyframes gradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
</style>
        </div>
    </div>
</footer>
