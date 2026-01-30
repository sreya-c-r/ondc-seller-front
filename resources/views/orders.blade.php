@extends('layouts.app')
@section('content')

@php
    // Mocking the backend data structure based on user JSON
    $data = [
        "today_sold" => 0,
        "today_cancelled" => 0,
        "today_ordered" => 1,
        "created" => 1,
        "created_products" => [
            [
                "order_id" => "ORD-697C329952CE4",
                "title" => null,
                "quantity" => 1,
                "price" => [
                    "value" => "0",
                    "currency" => "INR"
                ]
            ]
        ],
        "delivered" => 0,
        "delivered_products" => [],
        "cancelled" => 0,
        "cancelled_products" => [],
        "all_stats" => [
            "Created" => 1,
            "Completed" => 0,
            "Cancelled" => 0
        ]
    ];
    
    // Extracting variables
    $today_sold = $data['today_sold'];
    $today_cancelled = $data['today_cancelled'];
    $today_ordered = $data['today_ordered'];
    $created_count = $data['created'];
    $created_products = $data['created_products'];
    $delivered_count = $data['delivered'];
    $delivered_products = $data['delivered_products'];
    $cancelled_count = $data['cancelled'];
    $cancelled_products = $data['cancelled_products'];
@endphp

<!-- External Libraries for this page -->
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#4f46e5',
                    secondary: '#f3f4f6',
                    success: '#10b981',
                    danger: '#ef4444',
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    }
</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    .font-inter { font-family: 'Inter', sans-serif; }
</style>

<div class="dashboard-container p-6 font-inter bg-gray-50 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Orders</h1>
            <p class="text-sm text-gray-500 mt-1">Manage and view your order history.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Date Filter -->
            <div class="relative flex items-center">
                <input type="date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-3 p-2.5" placeholder="Select date">
            </div>
            
            <!-- All Orders Selector -->
            <select class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                <option selected value="all">All Orders</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>

            <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition whitespace-nowrap">
                Export Orders
            </button>
        </div>
    </div>

    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Today's Orders</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ $today_ordered }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl">
                <i class="mdi mdi-cart-outline"></i>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Today's Sold</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ $today_sold }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-full flex items-center justify-center text-xl">
                <i class="mdi mdi-currency-usd"></i>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Today's Cancelled</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ $today_cancelled }}</h3>
            </div>
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-full flex items-center justify-center text-xl">
                <i class="mdi mdi-cancel"></i>
            </div>
        </div>
    </div>

    <!-- Main Content Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" x-data="{ activeTab: 'created' }">
        <!-- Tab Navigation -->
        <div class="border-b border-gray-200 flex overflow-x-auto">
            <button @click="activeTab = 'created'" 
                :class="activeTab === 'created' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap">
                Created ({{ $created_count }})
            </button>
            <button @click="activeTab = 'delivered'" 
                :class="activeTab === 'delivered' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap">
                Delivered ({{ $delivered_count }})
            </button>
            <button @click="activeTab = 'cancelled'" 
                :class="activeTab === 'cancelled' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap">
                Cancelled ({{ $cancelled_count }})
            </button>
        </div>

        <!-- Tab Content Areas -->
        <div class="p-6 bg-gray-50 min-h-[300px]">
            
            <!-- Created Orders Tab -->
            <div x-show="activeTab === 'created'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @if(count($created_products) > 0)
                    <div class="space-y-4">
                        @foreach($created_products as $order)
                        <div class="bg-white border border-gray-200 rounded-lg p-5 flex flex-col md:flex-row items-start md:items-center justify-between hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-4 mb-4 md:mb-0">
                                <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center text-primary">
                                    <i class="mdi mdi-package-variant text-2xl"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-1">Order ID</p>
                                    <h4 class="text-lg font-bold text-gray-900">{{ $order['order_id'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $order['title'] ?? 'Product Name Not Available' }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-8 w-full md:w-auto mt-2 md:mt-0 justify-between md:justify-end">
                                <div class="text-left md:text-right">
                                    <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-1">Price</p>
                                    <p class="font-bold text-gray-900 text-lg">{{ $order['price']['currency'] }} {{ $order['price']['value'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-1">Quantity</p>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        x{{ $order['quantity'] }}
                                    </span>
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        New
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                        <i class="mdi mdi-package-variant-closed text-6xl mb-4 text-gray-300"></i>
                        <p class="text-lg font-medium">No active created orders found.</p>
                    </div>
                @endif
            </div>

            <!-- Delivered Orders Tab -->
            <div x-show="activeTab === 'delivered'" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @if(count($delivered_products) > 0)
                    <div class="space-y-4">
                        @foreach($delivered_products as $order)
                        <!-- Card Structure similar to created, maybe distinct color -->
                        <div class="bg-white border border-gray-200 rounded-lg p-5 flex justify-between items-center hover:shadow-md transition-shadow">
                             <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
                                    <i class="mdi mdi-check-circle-outline text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900">{{ $order['order_id'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $order['title'] ?? 'Product Name' }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                 @else
                    <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                        <i class="mdi mdi-truck-check-outline text-6xl mb-4 text-gray-300"></i>
                        <p class="text-lg font-medium">No delivered orders yet.</p>
                    </div>
                @endif
            </div>

            <!-- Cancelled Orders Tab -->
            <div x-show="activeTab === 'cancelled'" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @if(count($cancelled_products) > 0)
                    <div class="space-y-4">
                        @foreach($cancelled_products as $order)
                            <div class="bg-white border border-gray-200 rounded-lg p-5 flex justify-between items-center hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                                        <i class="mdi mdi-close-circle-outline text-2xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ $order['order_id'] }}</h4>
                                        <p class="text-sm text-gray-500">{{ $order['title'] ?? 'Product Name' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                 @else
                    <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                        <i class="mdi mdi-clipboard-remove-outline text-6xl mb-4 text-gray-300"></i>
                        <p class="text-lg font-medium">No cancelled orders.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection