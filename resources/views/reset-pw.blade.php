<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Seller Hub</title>

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
                    Remembered it?
                    <a href="{{route('login')}}" class="font-bold text-blue-600 hover:text-blue-800 ml-1">Log In</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center pt-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">

            <div class="text-center">
                <div
                    class="mx-auto w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-lock-open"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Set New Password</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Your new password must be different from previously used passwords.
                </p>
            </div>

            <form class="mt-8 space-y-6" onsubmit="return false;">

                <input type="hidden" name="token" value="dummy_token_value">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-regular fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" value="seller@example.com" readonly
                            class="appearance-none rounded-lg relative block w-full pl-10 px-3 py-3 border border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
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
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New
                        Password</label>
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

                <div>
                    <a href="{{route('login')}}"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Reset Password
                    </a>
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
                return false; // Prevent submission
            } else {
                errorMsg.classList.add("hidden");
                return true; // Allow submission
            }
        }
    </script>

</body>

</html>