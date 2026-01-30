<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - Seller Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
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
            <div class="flex justify-center h-16 items-center">
                <a href="seller_landing.html" class="flex items-center gap-2 text-decoration-none">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span class="text-blue-500">Hub</span></span>
                </a>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center pt-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full text-center space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <div class="mx-auto w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-4xl mb-6 shadow-inner">
                <i class="fa-solid fa-check"></i>
            </div>

            <div>
                <h2 class="text-3xl font-bold text-gray-900">Signed Out Successfully</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    You have been securely logged out of your session. See you again soon!
                </p>
            </div>

            <div class="space-y-4">
                <a href="login.html" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                    Log In Again
                </a>
                
                <a href="seller_landing.html" class="block w-full bg-white border border-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg hover:bg-gray-50 transition">
                    Return to Home
                </a>
            </div>

            <p class="text-xs text-gray-400 mt-6">
                Redirecting to login in <span id="countdown" class="font-bold text-blue-500">5</span> seconds...
            </p>

        </div>
    </div>

    <script>
        let timeLeft = 5;
        const countdownElem = document.getElementById('countdown');
        
        const timer = setInterval(() => {
            timeLeft--;
            countdownElem.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                // Redirect to Login Page
                // window.location.href = "login.html";
            }
        }, 1000);
    </script>

</body>
</html>