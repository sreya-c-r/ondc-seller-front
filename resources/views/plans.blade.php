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

                <!-- <a href="{{ route('my-plan') }}" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </a> -->
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

        @if(isset($error))
            <div class="max-w-7xl mx-auto mb-8 bg-red-50 border-l-4 border-red-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-circle-exclamation text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            {{ $error }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 items-start">
            @forelse($plans ?? [] as $plan)
                @php
                    $isPopular = ($plan['name'] ?? '') === 'Growth';
                    $features = $plan['features'] ?? [];
                    if (is_string($features)) {
                        $features = json_decode($features, true) ?? [];
                    }
                @endphp

                <div class="plan-card bg-white rounded-2xl shadow-lg border {{ $isPopular ? 'border-2 border-blue-500 transform md:-translate-y-4 shadow-xl' : 'border-gray-100' }} p-8 relative">
                    
                    @if($isPopular)
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                Most Popular
                            </span>
                        </div>
                    @endif

                    <h3 class="text-xl font-bold text-gray-900">{{ $plan['name'] ?? 'Plan' }}</h3>
                    <p class="text-gray-500 text-sm mt-2">{{ $plan['description'] ?? '' }}</p>

                    <div class="my-6">
                        <span class="text-4xl font-extrabold text-gray-900">₹{{ $plan['price'] ?? '0' }}</span>
                        <span class="text-gray-500 font-medium">/ {{ $plan['duration'] ?? 'month' }}</span>
                    </div>

                    <a href="{{ route('plan-subscribe', ['plan_id' => $plan['id'] ?? '']) }}"
                        class="w-full text-center block {{ $isPopular ? 'bg-blue-600 text-white hover:bg-blue-700 shadow-lg btn-hover-effect' : 'bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200' }} font-bold py-3 px-4 rounded-lg transition">
                        {{ $isPopular ? 'Choose ' . $plan['name'] : 'Get Started' }}
                    </a>

                    <ul class="mt-8 space-y-4 text-sm text-gray-600">
                        @foreach($features as $feature)
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check {{ $isPopular ? 'text-blue-600' : 'text-green-500' }} mt-0.5"></i>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @empty
                @if(!isset($error))
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No plans available at the moment.</p>
                    </div>
                @endif
            @endforelse
        </div>
        <div class="max-w-3xl mx-auto mt-20 text-center">
            <p class="text-gray-500 text-sm">
                Need a custom enterprise plan? <a href="#" class="text-blue-600 font-bold hover:underline">Contact
                    Sales</a>
            </p>
        </div>

    </div>

</body>

</html>