@extends('layouts.app')
@section('content')

    @php
        // Mock Data for Returns and RTO
        $returns = [
            [
                'id' => 'ORD-697C329952CE4',
                'product' => 'Wireless Headphones',
                'reason' => 'Defective Product',
                'status' => 'Pending',
                'date' => '2023-10-25',
                'type' => 'Return'
            ],
            [
                'id' => 'ORD-697C329952CE4',
                'product' => 'Running Shoes',
                'reason' => 'Customer Not Available',
                'status' => 'Returned to Seller',
                'date' => '2023-10-24',
                'type' => 'RTO'
            ]
        ];
    @endphp

    <!-- External Libraries (Tailwind & Alpine) -->
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
                        warning: '#f59e0b',
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
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <div class="dashboard-container p-6 font-inter bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Returns & RTO</h1>
                <p class="text-sm text-gray-500 mt-1">Track customer returns and RTO shipments.</p>
            </div>
            <div class="flex gap-3">
                <select
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-2.5">
                    <option selected value="all">All Status</option>
                    <option value="return">Returns</option>
                    <option value="rto">RTO</option>
                </select>
                <button
                    class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                    Export Report
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Returns</p>
                    <h3 class="text-2xl font-bold text-gray-900">1</h3>
                </div>
                <div class="w-10 h-10 bg-red-50 text-red-600 rounded-lg flex items-center justify-center">
                    <i class="mdi mdi-keyboard-return"></i>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total RTO</p>
                    <h3 class="text-2xl font-bold text-gray-900">1</h3>
                </div>
                <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-lg flex items-center justify-center">
                    <i class="mdi mdi-truck-delivery"></i>
                </div>
            </div>
        </div>

        <!-- Returns List -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800">Recent Updates</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Order ID</th>
                            <th scope="col" class="px-6 py-3">Product</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3">Reason</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($returns as $item)
                            <tr class="bg-white border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $item['id'] }}</div>
                                    
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $item['product'] }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($item['type'] == 'Return')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Return</span>
                                    @else
                                        <span
                                            class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded">RTO</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['reason'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['date'] }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($item['status'] == 'Pending')
                                        <span class="text-orange-600 font-medium flex items-center gap-1"><span
                                                class="w-1.5 h-1.5 rounded-full bg-orange-600"></span> Pending</span>
                                    @else
                                        <span class="text-gray-600 font-medium flex items-center gap-1"><span
                                                class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> Closed</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-medium text-primary hover:underline">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(count($returns) == 0)
                    <div class="text-center py-10">
                        <p class="text-gray-500">No returns or RTO found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection