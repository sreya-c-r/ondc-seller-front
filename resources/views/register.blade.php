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
            background-color: #f8fafc;
            /* Slate-50 equivalent */
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
                <a href="seller_landing.html"
                    class="flex-shrink-0 flex items-center gap-2 cursor-pointer text-decoration-none">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span
                            class="text-blue-500">Hub</span></span>
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

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('signup.post') }}" method="POST"
                onsubmit="return validatePassword()">

                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Full Name
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-user text-gray-400"></i>
                        </div>

                        <input id="name" name="name" type="text" required
                            class="appearance-none rounded-lg block w-full pl-10 px-3 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500"
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-gray-400"></i>
                        </div>

                        <input id="email" name="email" type="email" required
                            class="appearance-none rounded-lg block w-full pl-10 px-3 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500"
                            placeholder="seller@example.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>

                        <input id="password" name="password" type="password" required minlength="8"
                            class="appearance-none rounded-lg block w-full pl-10 px-3 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500"
                            placeholder="Min 8 characters">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-400"></i>
                        </div>

                        <input id="confirm_password" name="password_confirmation" type="password" required
                            class="appearance-none rounded-lg block w-full pl-10 px-3 py-3 border border-gray-300 focus:ring-2 focus:ring-blue-500"
                            placeholder="Re-enter password">
                    </div>

                    <p id="password-error" class="text-red-500 text-xs mt-1 hidden">
                        Passwords do not match.
                    </p>
                </div>

                <!-- Terms -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 rounded">

                    <label for="terms" class="ml-2 text-sm text-gray-900">
                        I agree to Terms & Privacy Policy
                    </label>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 rounded-lg text-white bg-blue-600 hover:bg-blue-700 font-bold">
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