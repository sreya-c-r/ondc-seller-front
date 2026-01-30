<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Seller Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc; /* Slate-50 equivalent */
        }
        
        /* Smooth focus ring animation */
        input:focus {
            transition: all 0.2s;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', 
                    }
                }
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
                
                <div class="text-sm">
                    Already have an account? 
                    <a href="{{route('login')}}" class="font-bold text-blue-600 hover:text-blue-800 ml-1">Log In</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <div class="text-center">
                <h2 href="{{ route('plans') }}" class="mt-2 text-3xl font-bold text-gray-900">Create Account</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Join ONDC and start selling today.
                </p>
            </div>

            <form class="mt-8 space-y-6" action="#" method="POST" onsubmit="return validatePassword()">
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" required 
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="John Doe">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="seller@example.com">
                    </div>
                </div>

                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-mobile-screen text-gray-400"></i>
                        </div>
                        <input id="mobile" name="mobile" type="tel" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" required 
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="9876543210">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required minlength="8"
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="Min 8 characters">
                    </div>
                </div>

                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>
                        <input id="confirm_password" name="password_confirmation" type="password" required 
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                            placeholder="Re-enter password">
                    </div>
                    <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Passwords do not match.</p>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Terms</a> and <a href="#" class="text-blue-600 hover:text-blue-500 font-medium">Privacy Policy</a>
                    </label>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Create Account
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var errorMsg = document.getElementById("password-error");

            if (password !== confirmPassword) {
                errorMsg.classList.remove("hidden");
                return false; // Prevent form submission
            } else {
                errorMsg.classList.add("hidden");
                return true; // Allow form submission
            }
        }
    </script>

</body>
</html>