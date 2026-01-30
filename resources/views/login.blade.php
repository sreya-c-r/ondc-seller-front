<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Hub - Login</title>
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
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span class="text-blue-500">Hub</span></span>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-24 pb-12 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 max-w-md w-full">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Login to Dashboard</h2>
            
            <form action="{{ route('dashboard') }}" method="POST"> <div class="mb-4">
                @csrf
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email or Mobile
                    </label>
                    <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="email" type="text" placeholder="seller@example.com">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="shadow-sm appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="password" type="password" placeholder="******************">
                    <div class="flex justify-end">
                        <a href="{{route('forgot-pw')}}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Forgot Password?
                        </a>
                    </div>
                </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200" type="button">
                    Login
                </button>
                
                <div class="mt-4 text-center text-sm text-gray-500">Or</div>

                <button class="w-full mt-4 bg-white border border-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg hover:bg-gray-50 transition duration-200 flex justify-center items-center gap-2" type="button">
                    <i class="fa-solid fa-mobile-screen"></i> Login with OTP
                </button>
            </form>
            
            <p class="mt-6 text-center text-gray-600 text-sm">
                New to SellerHub? <a href="{{route('register')}}" class="text-blue-600 font-bold">Register Now</a>
            </p>
        </div>
    </div>

</body>
</html>