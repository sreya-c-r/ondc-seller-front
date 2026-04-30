<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Hub - Grow on ONDC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/welcome.css?v=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Highlight effect for the 'Recommended' plan */
        .plan-card {
            transition: all 0.3s ease;
        }

        .plan-card:hover {
            transform: translateY(-5px);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#3b82f6' } }
            }
        }
    </script>
</head>

<body>



    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <div class="brand">
                    <i class="fa-solid fa-shop brand-icon"></i>
                    <span class="brand-text">Seller<span class="brand-highlight">Hub</span></span>
                </div>

                <div class="nav-links">
                    <a href="{{route('login')}}" class="btn-start">Login</a>
                </div>
            </div>
        </div>
    </nav>



    <section class="hero-section">
        <div class="container">
            <div class="hero-content">

                <div>
                    <span class="tag-badge">ONDC Ready</span>
                    <h1 class="hero-heading">
                        Sell to millions across <br> <span class="text-blue">India's Network</span>
                    </h1>
                    <p class="hero-description">
                        Join the open network revolution. Connect your store once and become discoverable on Paytm,
                        PhonePe, and huge buyer apps instantly.
                    </p>
                    <div class="features-list">
                        <div class="feature-check">
                            <i class="fa-solid fa-check-circle check-icon"></i>
                            <span>0% Commission</span>
                        </div>
                        <div class="feature-check">
                            <i class="fa-solid fa-check-circle check-icon"></i>
                            <span>Fast Settlements</span>
                        </div>
                    </div>
                </div>

                <div class="how-it-works-col">
                    <h2 class="section-heading">How it Works</h2>

                    <div class="steps-container">
                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">1. Register</h3>
                                <p class="step-desc">Create your account using your GSTIN and bank details. It takes
                                    less than 10 minutes.</p>
                            </div>
                        </div>

                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">2. List Products</h3>
                                <p class="step-desc">Upload your catalog. Our system automatically formats it for ONDC
                                    standards.</p>
                            </div>
                        </div>

                        <div class="step-card">
                            <div class="step-icon-wrapper">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div class="step-text">
                                <h3 class="step-title">3. Receive Orders</h3>
                                <p class="step-desc">Get orders from multiple apps. Ship them and get paid directly to
                                    your bank.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- Plans Section -->
    <div id="plans-section"
        class="pt-24 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-white min-h-screen">

        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Flexible Pricing</h2>
            <h1 class="text-4xl font-extrabold text-gray-900">Choose the plan that fits your scale</h1>
            <p class="mt-4 text-xl text-gray-600">
                Transparent pricing. No hidden fees. Upgrade or downgrade at any time.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 items-start">

            @foreach ($plans as $plan)

            

                <div class="plan-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 relative">
                    <h3 class="text-xl font-bold text-gray-900">{{ $plan['name'] }}</h3>
                    <p class="text-gray-500 text-sm mt-2">{{ $plan['description'] }}</p>

                    <div class="my-6">
                        <span class="text-4xl font-extrabold text-gray-900">{{ $plan['price'] }}</span>
                        <span class="text-gray-500 font-medium">/ month</span>
                    </div>

                    <a href="{{ route('login') }}"
                        class="w-full text-center block bg-blue-50 text-blue-700 font-bold py-3 px-4 rounded-lg hover:bg-blue-100 transition border border-blue-200">
                        Get Started
                    </a>

                    <ul class="mt-8 space-y-4 text-sm text-gray-600">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                            <span>5% Commission per Order</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                            <span>List up to {{ $plan['product_count_limit'] }} Products</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                            <span>Basic Analytics</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                            <span>Email Support</span>
                        </li>
                    </ul>
                </div>


        @endforeach


            

            

        </div>
        <div class="max-w-3xl mx-auto mt-20 text-center">
            <p class="text-gray-500 text-sm">
                Need a custom enterprise plan? <a href="#" class="text-blue-600 font-bold hover:underline">Contact
                    Sales</a>
            </p>
        </div>
    </div>

    <!-- Success Stories Preview Section -->
    <div class="bg-gradient-to-b from-blue-50 to-white py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Success Stories</h2>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">See who's growing with us</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Story Preview 1 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center mb-4">
                        <div
                            class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">
                            K</div>
                        <div class="ml-3">
                            <h4 class="text-lg font-bold text-gray-900">Kavya Organics</h4>
                            <p class="text-sm text-gray-500">Bangalore</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"Orders jumped by 300% after joining ONDC through SellerHub."
                    </p>
                    <a href="{{ route('success-stories') }}"
                        class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Read full story &rarr;</a>
                </div>

                <!-- Story Preview 2 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center mb-4">
                        <div
                            class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">
                            U</div>
                        <div class="ml-3">
                            <h4 class="text-lg font-bold text-gray-900">Urban Threads</h4>
                            <p class="text-sm text-gray-500">Mumbai</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"We finally control our own margins and customer data."</p>
                    <a href="{{ route('success-stories') }}"
                        class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Read full story &rarr;</a>
                </div>

                <!-- Story Preview 3 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center mb-4">
                        <div
                            class="h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold">
                            T</div>
                        <div class="ml-3">
                            <h4 class="text-lg font-bold text-gray-900">TechGuru</h4>
                            <p class="text-sm text-gray-500">Delhi</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"Instant visibility on Paytm and PhonePe was a game changer."
                    </p>
                    <a href="{{ route('success-stories') }}"
                        class="text-blue-600 font-semibold hover:text-blue-800 text-sm">Read full story &rarr;</a>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('success-stories') }}"
                    class="inline-block px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    View All Stories
                </a>
            </div>
        </div>
    </div>

    <!-- ONDC Policy Highlights Section -->
    <!-- ONDC Policy Highlights Section -->
    <div class="bg-gradient-to-b from-blue-50 to-white py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Transparency First</h2>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Built on Fair Network Policies</h2>
                <p class="text-gray-600 text-lg mb-8">
                    We adhere strictly to ONDC protocols to ensure a fair playing field for all sellers. Your data
                    privacy and fair pricing are our top priorities.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Zero hidden charges or proprietary lock-ins</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Standardized return & refund frameworks</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Full compliance with Indian data privacy laws</span>
                    </li>
                </ul>
                <a href="{{ route('ondc-policy') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg hover:shadow-xl">
                    Read Policy Document
                </a>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-blue-100 opacity-50 blur-3xl rounded-full"></div>
                <div class="relative bg-white p-8 rounded-2xl border border-blue-100 shadow-xl">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="h-12 w-12 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-shield-halved text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Seller Protection</h3>
                            <p class="text-sm text-gray-500">Guaranteed by ONDC Network</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="h-2 bg-gray-100 rounded w-3/4"></div>
                        <div class="h-2 bg-gray-100 rounded w-full"></div>
                        <div class="h-2 bg-gray-100 rounded w-5/6"></div>
                        <div class="h-2 bg-gray-100 rounded w-4/6"></div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-100 text-center">
                        <span class="text-sm text-gray-500 font-medium">Trusted by 10,000+ sellers nationwide</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('footer_welcome')

</body>

</html>