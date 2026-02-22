@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Header -->
        <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Success Stories</h1>
            </div>
        </div>

        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Join the Movement</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    See how businesses are scaling on ONDC
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    From local artisans to large D2C brands, SellerHub is empowering merchants across India.
                </p>
            </div>

            <!-- Stories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Story 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img class="h-48 w-full object-cover"
                        src="https://images.unsplash.com/photo-1556740758-90de374c12ad?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="Customer Story">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="inline-block h-10 w-10 full bg-blue-100 rounded-full flex items-center justify-center text-blue-500 font-bold">K</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Kavya Organics</p>
                                <p class="text-sm text-gray-500">Bangalore, Karnataka</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">
                            "Since joining ONDC via SellerHub, our weekly orders have jumped by 300%. The zero commission
                            model helped us invest more in product quality."
                        </p>
                    </div>
                </div>

                <!-- Story 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img class="h-48 w-full object-cover"
                        src="https://images.unsplash.com/photo-1441986300917-64674bd8003d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="Fashion Store">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="inline-block h-10 w-10 full bg-green-100 rounded-full flex items-center justify-center text-green-500 font-bold">U</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Urban Threads</p>
                                <p class="text-sm text-gray-500">Mumbai, Maharashtra</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">
                            "We struggled with high marketplace fees for years. SellerHub made onboarding to ONDC seamless,
                            and now we control our own margins."
                        </p>
                    </div>
                </div>

                <!-- Story 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img class="h-48 w-full object-cover"
                        src="https://images.unsplash.com/photo-1528698827591-e19ccd7bc23d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="Electronics Store">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span
                                    class="inline-block h-10 w-10 full bg-purple-100 rounded-full flex items-center justify-center text-purple-500 font-bold">T</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">TechGuru Electronics</p>
                                <p class="text-sm text-gray-500">Delhi, NCR</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-600">
                            "The instant visibility on apps like Paytm and PhonePe was a game changer for us. SellerHub's
                            analytics helped us optimize our inventory."
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Start Your Success Story
                </a>
            </div>
        </main>
    </div>
@endsection