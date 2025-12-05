<!-- FOOTER stored in partials for code reuse -->
<footer class="bg-gray-900 dark:bg-gray-950 text-white mt-16 transition-colors duration-300">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">YouZoo</h3>
                <p class="text-gray-400">Quality pet products for your beloved companions.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-gray-400 hover:text-white transition-colors">About</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Policies</a></li>
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
        </div>
    </div>
</footer>
