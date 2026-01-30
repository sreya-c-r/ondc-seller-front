<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Seller Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
        }
        input:focus {
            transition: all 0.2s;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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
<body class="text-gray-700">

    <nav class="bg-white shadow-sm fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span class="text-blue-500">Hub</span></span>
                </div>
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500">
                    <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs">Step 3 of 3</span>
                    <span>Payment</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-24 pb-20 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
        
        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-8">
            <div class="bg-blue-600 h-1.5 rounded-full" style="width: 100%"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            
            <div class="md:col-span-8 bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
                
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Payment Details</h1>
                
                <form action="#" method="POST">
                    
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Cardholder Name</label>
                        <input type="text" required 
                            class="w-full rounded-lg border-gray-300 border px-4 py-3 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="John Doe">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Card Number</label>
                        <div class="relative">
                            <input type="text" required maxlength="19" 
                                class="w-full rounded-lg border-gray-300 border px-4 py-3 text-sm focus:outline-none placeholder-gray-400 pl-12" 
                                placeholder="0000 0000 0000 0000">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <i class="fa-regular fa-credit-card text-lg"></i>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Expiration Date</label>
                            <input type="text" required maxlength="5" 
                                class="w-full rounded-lg border-gray-300 border px-4 py-3 text-sm focus:outline-none placeholder-gray-400" 
                                placeholder="MM/YY">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">CVC</label>
                            <div class="relative">
                                <input type="password" required maxlength="4" 
                                    class="w-full rounded-lg border-gray-300 border px-4 py-3 text-sm focus:outline-none placeholder-gray-400" 
                                    placeholder="123">
                                <i class="fa-solid fa-circle-question absolute right-4 top-3.5 text-gray-300 cursor-help" title="3 digits on back of card"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start mb-8">
                        <input id="terms" type="checkbox" required class="mt-1 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="terms" class="ml-2 block text-sm text-gray-600">
                            I agree to the <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and authorize the monthly subscription charge.
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white font-bold text-lg py-4 px-8 rounded-xl shadow-md hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5">
                        Pay & Subscribe
                    </button>
                    
                    <div class="mt-4 text-center flex justify-center items-center gap-4 text-gray-400 text-2xl">
                        <i class="fa-brands fa-cc-visa hover:text-blue-800 transition"></i>
                        <i class="fa-brands fa-cc-mastercard hover:text-red-600 transition"></i>
                        <i class="fa-brands fa-cc-amex hover:text-blue-500 transition"></i>
                    </div>

                </form>
            </div>

            <div class="md:col-span-4">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>

                    <div class="space-y-4 mb-6 border-b border-gray-100 pb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Plan Name</span>
                            <span class="font-medium text-gray-900">Growth Plan</span>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Billing Cycle</span>
                            <span class="font-medium text-gray-900">Monthly</span>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="font-medium text-gray-900">₹499.00</span>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">GST (18%)</span>
                            <span class="font-medium text-gray-900">₹89.82</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-2">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-extrabold text-blue-600">₹588.82</span>
                    </div>
                    <p class="text-xs text-right text-gray-400">Includes all taxes</p>

                </div>
                
                <div class="mt-6 text-center text-xs text-gray-400 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-lock text-green-500"></i>
                    <span>Payments are SSL Encrypted & Secure</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>