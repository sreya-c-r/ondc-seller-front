<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Hub - Grow on ONDC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Light Blue
                        secondary: '#f3f4f6', // Light Gray
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 font-sans text-gray-700">

    <nav class="bg-white shadow-sm fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span
                            class="text-blue-500">Hub</span></span>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{route('login')}}" class="text-gray-600 hover:text-blue-500 font-medium">Login</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 font-medium">Cart</a>
                    <a href="#"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">Start
                        Selling</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="pt-24 pb-12 md:pt-32 md:pb-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <div>
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">ONDC
                        Ready</span>
                    <h1 class="mt-4 text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Sell to millions across <br> <span class="text-blue-600">India's Network</span>
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">
                        Join the open network revolution. Connect your store once and become discoverable on Paytm,
                        PhonePe, and huge buyer apps instantly.
                    </p>
                    <div class="mt-8 flex gap-4">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check-circle text-green-500"></i>
                            <span>0% Commission</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-check-circle text-green-500"></i>
                            <span>Fast Settlements</span>
                        </div>
                    </div>
                </div>

                <div class="pl-0 md:pl-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-8">How it Works</h2>
                    
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex-shrink-0 flex items-center justify-center text-lg">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">1. Register</h3>
                                <p class="text-gray-600 text-sm">Create your account using your GSTIN and bank details. It takes less than 10 minutes.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex-shrink-0 flex items-center justify-center text-lg">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">2. List Products</h3>
                                <p class="text-gray-600 text-sm">Upload your catalog. Our system automatically formats it for ONDC standards.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex-shrink-0 flex items-center justify-center text-lg">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">3. Receive Orders</h3>
                                <p class="text-gray-600 text-sm">Get orders from multiple apps. Ship them and get paid directly to your bank.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



</body>

</html>