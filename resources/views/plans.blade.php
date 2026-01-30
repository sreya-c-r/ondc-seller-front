<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Plans - Seller Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
        }
        /* Highlight effect for the 'Recommended' plan */
        .plan-card { transition: all 0.3s ease; }
        .plan-card:hover { transform: translateY(-5px); }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#3b82f6' } }
            }
        }
    </script>
</head>
<body class="text-gray-700">

    <nav class="bg-white shadow-sm fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="seller_landing.html" class="flex-shrink-0 flex items-center gap-2 cursor-pointer text-decoration-none">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span class="text-blue-500">Hub</span></span>
                </a>
                
                <a href="seller_dashboard.html" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="pt-24 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-blue-600 font-bold tracking-wide uppercase text-sm mb-2">Flexible Pricing</h2>
            <h1 class="text-4xl font-extrabold text-gray-900">Choose the plan that fits your scale</h1>
            <p class="mt-4 text-xl text-gray-600">
                Transparent pricing. No hidden fees. Upgrade or downgrade at any time.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 items-start">

            <div class="plan-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 relative">
                <h3 class="text-xl font-bold text-gray-900">Starter</h3>
                <p class="text-gray-500 text-sm mt-2">Perfect for new sellers.</p>
                
                <div class="my-6">
                    <span class="text-4xl font-extrabold text-gray-900">₹0</span>
                    <span class="text-gray-500 font-medium">/ month</span>
                </div>

                <button class="w-full block bg-blue-50 text-blue-700 font-bold py-3 px-4 rounded-lg hover:bg-blue-100 transition border border-blue-200">
                    Get Started
                </button>

                <ul class="mt-8 space-y-4 text-sm text-gray-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>5% Commission per Order</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>List up to 50 Products</span>
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

            <div class="plan-card bg-white rounded-2xl shadow-xl border-2 border-blue-500 p-8 relative transform md:-translate-y-4">
                
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                        Most Popular
                    </span>
                </div>

                <h3 class="text-xl font-bold text-gray-900">Growth</h3>
                <p class="text-gray-500 text-sm mt-2">For growing businesses.</p>
                
                <div class="my-6">
                    <span class="text-4xl font-extrabold text-gray-900">₹499</span>
                    <span class="text-gray-500 font-medium">/ month</span>
                </div>

                <button class="w-full block bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition shadow-lg btn-hover-effect">
                    Choose Growth
                </button>

                <ul class="mt-8 space-y-4 text-sm text-gray-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-blue-600 mt-0.5"></i>
                        <span class="font-bold text-gray-900">2% Commission per Order</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-blue-600 mt-0.5"></i>
                        <span>List up to 500 Products</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-blue-600 mt-0.5"></i>
                        <span>Advanced Analytics</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-blue-600 mt-0.5"></i>
                        <span>Priority Support</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-blue-600 mt-0.5"></i>
                        <span>ONDC Boost Visibility</span>
                    </li>
                </ul>
            </div>

            <div class="plan-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 relative">
                <h3 class="text-xl font-bold text-gray-900">Pro Unlimited</h3>
                <p class="text-gray-500 text-sm mt-2">Maximum power & scale.</p>
                
                <div class="my-6">
                    <span class="text-4xl font-extrabold text-gray-900">₹999</span>
                    <span class="text-gray-500 font-medium">/ month</span>
                </div>

                <button class="w-full block bg-blue-50 text-blue-700 font-bold py-3 px-4 rounded-lg hover:bg-blue-100 transition border border-blue-200">
                    Choose Pro
                </button>

                <ul class="mt-8 space-y-4 text-sm text-gray-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span class="font-bold text-gray-900">0% Commission</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>Unlimited Products</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>Real-time Reports</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>Dedicated Account Manager</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-check text-green-500 mt-0.5"></i>
                        <span>API Access</span>
                    </li>
                </ul>
            </div>

        </div>
        <div class="max-w-3xl mx-auto mt-20 text-center">
            <p class="text-gray-500 text-sm">
                Need a custom enterprise plan? <a href="#" class="text-blue-600 font-bold hover:underline">Contact Sales</a>
            </p>
        </div>

    </div>

</body>
</html>