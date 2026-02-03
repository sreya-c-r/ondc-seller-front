@extends('layouts.app')
@section('content')

    @php
        // Mock Data
        $stats = [
            'pending_pickups' => 5,
            'active_shipments' => 12
        ];

        $shipments = [
            [
                'id' => 'ORD-001',
                'status' => 'ready', // ready, transit, delivered, cancelled
                'tracking_id' => 'AWB-PENDING',
                'courier' => 'Delhivery',
                'location' => 'Kochi',
                'expected_delivery' => 'Jan 25, 2026'
            ],
            [
                'id' => 'ORD-002',
                'status' => 'transit',
                'tracking_id' => '1234567890',
                'courier' => 'BlueDart',
                'location' => 'Mumbai',
                'expected_delivery' => 'Jan 28, 2026'
            ],
            [
                'id' => 'ORD-003',
                'status' => 'transit',
                'tracking_id' => '9876543210',
                'courier' => 'Shadowfax',
                'location' => 'Delhi',
                'expected_delivery' => 'Jan 30, 2026'
            ],
            [
                'id' => 'ORD-004',
                'status' => 'delivered',
                'tracking_id' => 'DEL-112233',
                'courier' => 'Ecom Express',
                'location' => 'Bangalore',
                'expected_delivery' => 'Jan 20, 2026'
            ],
            [
                'id' => 'ORD-005',
                'status' => 'cancelled',
                'tracking_id' => 'CAN-000000',
                'courier' => 'N/A',
                'location' => 'Chennai',
                'expected_delivery' => 'N/A'
            ],
            [
                'id' => 'ORD-006',
                'status' => 'ready',
                'tracking_id' => 'AWB-PENDING',
                'courier' => 'Dunzo',
                'location' => 'Kochi',
                'expected_delivery' => 'Jan 26, 2026'
            ],
        ];

        // Helper to filter shipments by status for initial render if needed, 
        // but we will use AlpineJS for client-side filtering or just render all and filter with loop.
        // For simplicity with Alpine, we can pass the whole array to JS or loop variables.
        // Let's pass variables to Blade loops inside x-show containers.

        $ready_shipments = array_filter($shipments, fn($s) => $s['status'] === 'ready');
        $transit_shipments = array_filter($shipments, fn($s) => $s['status'] === 'transit');
        $delivered_shipments = array_filter($shipments, fn($s) => $s['status'] === 'delivered');
        $cancelled_shipments = array_filter($shipments, fn($s) => $s['status'] === 'cancelled');
    @endphp

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
                        info: '#3b82f6'
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

        /* Hide scrollbar for tabs */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="dashboard-container p-6 font-inter bg-gray-50 min-h-screen">

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Shipments</h1>
                <p class="text-sm text-gray-500 mt-1">Track and manage your deliveries</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition flex items-center gap-2">
                    <i class="mdi mdi-download"></i> Export Report
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 max-w-4xl">
            <!-- Pending Pickups -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Pending Pickups</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $stats['pending_pickups'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center text-xl">
                    <i class="mdi mdi-package-variant-closed"></i>
                </div>
            </div>
            <!-- Active Shipments -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Active Shipments</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $stats['active_shipments'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl">
                    <i class="mdi mdi-truck-fast"></i>
                </div>
            </div>
        </div>

        <!-- Main Content Tabs -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" x-data="{ activeTab: 'ready' }">

            <!-- Tab Navigation -->
            <div class="border-b border-gray-200 flex overflow-x-auto no-scrollbar">
                <button @click="activeTab = 'ready'"
                    :class="activeTab === 'ready' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                    class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap min-w-[150px]">
                    Ready for Pickup <span
                        class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ count($ready_shipments) }}</span>
                </button>

                <button @click="activeTab = 'transit'"
                    :class="activeTab === 'transit' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                    class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap min-w-[150px]">
                    In Transit <span
                        class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ count($transit_shipments) }}</span>
                </button>

                <button @click="activeTab = 'delivered'"
                    :class="activeTab === 'delivered' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                    class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap min-w-[150px]">
                    Delivered <span
                        class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ count($delivered_shipments) }}</span>
                </button>

                <button @click="activeTab = 'cancelled'"
                    :class="activeTab === 'cancelled' ? 'border-primary text-primary bg-indigo-50' : 'border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-50'"
                    class="flex-1 py-4 px-6 text-center border-b-2 font-medium text-sm transition-all duration-200 whitespace-nowrap min-w-[150px]">
                    Cancelled/Failed <span
                        class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ count($cancelled_shipments) }}</span>
                </button>
            </div>

            <!-- Table Content -->
            <div class="p-0 overflow-x-auto">

                <!-- Shared Table Structure -->
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">Order Details</th>
                            <th scope="col" class="px-6 py-3">Tracking / AWB</th>
                            <th scope="col" class="px-6 py-3">Courier</th>
                            <th scope="col" class="px-6 py-3">Customer Location</th>
                            <th scope="col" class="px-6 py-3">Expected Delivery</th>
                            <th scope="col" class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <!-- Ready Template -->
                    <template x-if="activeTab === 'ready'">
                        <tbody class="divide-y divide-gray-200">
                            @forelse($ready_shipments as $shipment)
                                <tr class="bg-white hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $shipment['id'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded border border-yellow-200">{{ $shipment['tracking_id'] }}</span>
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-2">
                                        <i class="mdi mdi-truck-delivery-outline text-lg text-gray-400"></i>
                                        {{ $shipment['courier'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $shipment['location'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $shipment['expected_delivery'] }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button
                                                class="text-indigo-600 hover:text-indigo-900 font-medium text-xs border border-indigo-200 hover:bg-indigo-50 rounded px-2 py-1">
                                                Print Label
                                            </button>
                                            <button
                                                class="text-gray-600 hover:text-gray-900 font-medium text-xs border border-gray-200 hover:bg-gray-50 rounded px-2 py-1">
                                                Manifest
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">No shipments ready for pickup.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </template>

                    <!-- In Transit Template -->
                    <template x-if="activeTab === 'transit'">
                        <tbody class="divide-y divide-gray-200">
                            @forelse($transit_shipments as $shipment)
                                <tr class="bg-white hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $shipment['id'] }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-gray-600">
                                        {{ $shipment['tracking_id'] }}
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-2">
                                        <i class="mdi mdi-truck-fast-outline text-lg text-blue-500"></i>
                                        {{ $shipment['courier'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $shipment['location'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $shipment['expected_delivery'] }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-white bg-indigo-600 hover:bg-indigo-700 font-medium text-xs rounded px-3 py-1.5 shadow-sm">
                                            Track
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">No shipments in transit.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </template>

                    <!-- Delivered Template -->
                    <template x-if="activeTab === 'delivered'">
                        <tbody class="divide-y divide-gray-200">
                            @forelse($delivered_shipments as $shipment)
                                <tr class="bg-white hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $shipment['id'] }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-gray-600">
                                        {{ $shipment['tracking_id'] }}
                                    </td>
                                    <td class="px-6 py-4 flex items-center gap-2">
                                        <i class="mdi mdi-check-circle-outline text-lg text-green-500"></i>
                                        {{ $shipment['courier'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $shipment['location'] }}
                                    </td>
                                    <td class="px-6 py-4 text-green-600 font-medium">
                                        Delivered on {{ $shipment['expected_delivery'] }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span
                                            class="text-green-600 bg-green-50 px-2 py-1 rounded text-xs font-medium">Completed</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">No delivered shipments.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </template>

                    <!-- Cancelled Template -->
                    <template x-if="activeTab === 'cancelled'">
                        <tbody class="divide-y divide-gray-200">
                            @forelse($cancelled_shipments as $shipment)
                                <tr class="bg-white hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $shipment['id'] }}
                                    </td>
                                    <td class="px-6 py-4 font-mono text-gray-400">
                                        {{ $shipment['tracking_id'] }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-400">
                                        {{ $shipment['courier'] }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-400">
                                        {{ $shipment['location'] }}
                                    </td>
                                    <td class="px-6 py-4 text-red-500">
                                        Cancelled
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="text-red-600 bg-red-50 px-2 py-1 rounded text-xs font-medium">Failed</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-400">No cancelled shipments.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </template>
                </table>
            </div>
        </div>
    </div>

@endsection