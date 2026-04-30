@extends('layouts.app')

@section('content')
    {{-- Tailwind CSS & Font Setup (if not already in layout) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#f3f4f6',
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>

    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto space-y-8">

            {{-- Header Section --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Subscription & Billing</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage your plan, billing details, and usage limits.</p>
                </div>
                <div>
                    <a href="{{ route('plans') }}"
                        class="group inline-flex items-center gap-2 bg-white border border-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-xl text-sm hover:bg-gray-50 hover:border-blue-300 transition-all shadow-sm">
                        <span>Change Plan</span>
                        <i class="fa-solid fa-arrow-right text-gray-400 group-hover:text-blue-500 transition-colors"></i>
                    </a>
                </div>
            </div>

            {{-- Main Plan Card (Active) --}}
            <div
                class="relative bg-gradient-to-br from-indigo-900 to-blue-800 rounded-3xl shadow-xl overflow-hidden text-white">
                {{-- Decorative pattern --}}
                <div class="absolute top-0 right-0 p-12 opacity-10">
                    <i class="fa-solid fa-rocket text-9xl transform rotate-12"></i>
                </div>
                <div class="absolute bottom-0 left-0 -ml-12 -mb-12 w-48 h-48 bg-blue-500 rounded-full blur-3xl opacity-30">
                </div>

                <div class="relative z-10 p-8 sm:p-10">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-6">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <div
                                    class="px-3 py-1 bg-white/20 backdrop-blur-md rounded-full border border-white/10 text-xs font-semibold uppercase tracking-wider">
                                    Current Plan
                                </div>
                                <span
                                    class="flex items-center gap-1.5 text-green-300 text-xs font-bold uppercase tracking-wider bg-green-900/40 px-2 py-1 rounded-full border border-green-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                                    Active
                                </span>
                            </div>
                            <h2 class="text-4xl font-extrabold tracking-tight">Growth Plan</h2>
                            <p class="mt-2 text-blue-100 text-lg">Ideal for scaling businesses with advanced needs.</p>
                        </div>
                        <div class="text-right">
                            <div class="text-5xl font-bold">₹499</div>
                            <div class="text-blue-200 text-sm font-medium mt-1">per month</div>
                        </div>
                    </div>

                    <div class="mt-10 border-t border-white/10 pt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-blue-300 font-bold mb-1">Billing Cycle</p>
                            <p class="text-lg font-semibold">Monthly</p>
                            <p class="text-xs text-blue-200 mt-1">Next payment: <span class="text-white font-medium">Mar 04,
                                    2026</span></p>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wide text-blue-300 font-bold mb-1">Payment Method</p>
                            <div class="flex items-center gap-2">
                                <i class="fa-brands fa-cc-visa text-2xl"></i>
                                <span class="text-lg font-semibold">•••• 4242</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wide text-blue-300 font-bold mb-1">Status</p>
                            <p class="text-lg font-semibold text-green-300"><i class="fa-solid fa-check-circle mr-1"></i>
                                Paid</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Details & Usage Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Usage Stats --}}
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Plan Usage & Limits</h3>

                    {{-- Product Limit Progress --}}
                    <div class="mb-8">
                        <div class="flex justify-between items-end mb-2">
                            <div>
                                <p class="text-sm font-medium text-gray-700">Product Listings</p>
                                <p class="text-xs text-gray-500 mt-0.5">Total active products in your inventory</p>
                            </div>
                            <div class="text-right">
                                <span class="text-2xl font-bold text-gray-900">150</span>
                                <span class="text-sm text-gray-400 font-medium">/ 500</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-blue-600 h-3 rounded-full transition-all duration-1000 ease-out relative group"
                                style="width: 30%">
                                <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 text-right">350 listings remaining</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div
                                    class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                    <i class="fa-solid fa-chart-pie"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900">Commission Rate</h4>
                            </div>
                            <p class="text-2xl font-bold text-gray-900 ml-1">2.0%</p>
                            <p class="text-xs text-gray-500 ml-1">Per successful order</p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div
                                    class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h4 class="font-semibold text-gray-900">Team Members</h4>
                            </div>
                            <p class="text-2xl font-bold text-gray-900 ml-1">3 <span
                                    class="text-sm text-gray-400 font-normal">/ 5</span></p>
                            <p class="text-xs text-gray-500 ml-1">2 seats available</p>
                        </div>
                    </div>

                </div>

                {{-- Features List --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Included Features</h3>
                        <i class="fa-solid fa-star text-yellow-400 text-xl"></i>
                    </div>

                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span class="text-sm text-gray-600">Advanced Analytics Dashboard</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span class="text-sm text-gray-600">Priority Email Support & Chat</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span class="text-sm text-gray-600">ONDC Network Boost</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <span class="text-sm text-gray-600">Custom Domain Integration</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <span class="text-sm text-gray-400">Zero Commission (Pro Only)</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="mt-1 flex-shrink-0 w-5 h-5 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-xs">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <span class="text-sm text-gray-400">Dedicated Account Manager</span>
                        </li>
                    </ul>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('plans') }}"
                            class="block w-full text-center py-2.5 px-4 bg-gray-50 hover:bg-gray-100 text-gray-700 text-sm font-semibold rounded-lg transition-colors border border-gray-200">
                            Upgrade to Pro
                        </a>
                    </div>
                </div>

            </div>

            {{-- Danger / Cancel Section --}}
            <!-- <div class="bg-red-50 rounded-2xl border border-red-100 p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-red-100 text-red-600 rounded-xl hidden sm:block">
                            <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-red-900">Cancel Subscription</h4>
                            <p class="text-sm text-red-700 mt-1 max-w-xl">
                                Downgrading to the Starter plan will limit your product listings to 50 and remove access to
                                advanced analytics.
                            </p>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <button
                            class="px-5 py-2.5 bg-white border border-red-200 text-red-600 font-semibold rounded-lg text-sm hover:bg-red-50 focus:ring-4 focus:ring-red-100 transition-all shadow-sm">
                            Cancel Subscription
                        </button>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
@endsection