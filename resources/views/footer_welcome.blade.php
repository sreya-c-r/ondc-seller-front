<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Column -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 text-2xl font-bold mb-4">
                    <i class="fa-solid fa-shop text-blue-500"></i>
                    <span>Seller<span class="text-blue-500">Hub</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Empowering millions of sellers across India to join the ONDC network. Grow your business with zero
                    commission and instant reach.
                </p>
                <div class="flex gap-4 pt-2">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-blue-400">Platform</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Start Selling</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Pricing Plans</a></li>
                    <li><a href="{{ route('success-stories') }}" class="hover:text-white transition-colors">Success
                            Stories</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Partner Program</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-blue-400">Resources</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Seller Guide</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">API Documentation</a></li>
                    <li><a href="{{ route('ondc-policy') }}" class="hover:text-white transition-colors">ONDC Policy</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-blue-400">Contact Us</h3>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-blue-500"></i>
                        <span>Tech Park, Sector 4, Bangalore, Karnataka, India</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-blue-500"></i>
                        <span>+91 1800-123-4567</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-blue-500"></i>
                        <span>support@sellerhub.in</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} SellerHub. All rights reserved.
            </p>
            <div class="flex gap-6 text-sm text-gray-500">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>