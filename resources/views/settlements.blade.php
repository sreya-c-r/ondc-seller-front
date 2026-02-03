@extends('layouts.app')
@section('content')
    @php
        // Monitor: 2026-02-02
        $stats = [
            'next_payout' => '₹5,200',
            'due_date' => 'Feb 05, 2026',
            'total_earned' => '₹1,24,500',
            'on_hold' => '₹1,850'
        ];

        $settlements = [
            [
                'ref_id' => 'TXN8839201',
                'date' => 'Jan 28, 2026',
                'orders_count' => 15,
                'amount' => '₹9,100',
                'status' => 'Paid',
                'details' => [
                    'total_sales' => '₹10,000',
                    'commission' => '₹500',
                    'shipping' => '₹400',
                    'net_payout' => '₹9,100'
                ]
            ],
            [
                'ref_id' => 'TXN8839202',
                'date' => 'Feb 02, 2026',
                'orders_count' => 8,
                'amount' => '₹5,200',
                'status' => 'Processing',
                'details' => [
                    'total_sales' => '₹6,000',
                    'commission' => '₹400',
                    'shipping' => '₹400',
                    'net_payout' => '₹5,200'
                ]
            ],
            [
                'ref_id' => 'TXN8839199',
                'date' => 'Jan 15, 2026',
                'orders_count' => 4,
                'amount' => '₹2,300',
                'status' => 'Failed',
                'details' => [
                    'total_sales' => '₹3,000',
                    'commission' => '₹300',
                    'shipping' => '₹400',
                    'net_payout' => '₹2,300'
                ]
            ],
            [
                'ref_id' => 'TXN8839198',
                'date' => 'Jan 10, 2026',
                'orders_count' => 12,
                'amount' => '₹7,500',
                'status' => 'Paid',
                'details' => [
                    'total_sales' => '₹8,500',
                    'commission' => '₹500',
                    'shipping' => '₹500',
                    'net_payout' => '₹7,500'
                ]
            ],
        ];
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
                        info: '#3b82f6',
                        dark: '#1e293b',
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

        [x-cloak] {
            display: none !important;
        }

        /* Glassmorphism for Bank Widget */
        .glass-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 1) 0%, rgba(15, 23, 42, 1) 100%);
            position: relative;
            overflow: hidden;
        }

        .glass-circle-1 {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            filter: blur(20px);
        }

        .glass-circle-2 {
            position: absolute;
            bottom: -20px;
            left: -20px;
            width: 80px;
            height: 80px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 50%;
            filter: blur(20px);
        }
    </style>

    <div class="dashboard-container p-6 font-inter bg-gray-50 min-h-screen" x-data="{ 
                showModal: false, 
                selectedTxn: null,
                openModal(txn) {
                    this.selectedTxn = txn;
                    this.showModal = true;
                }
            }">

        <!-- Title Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Settlements</h1>
                <p class="text-gray-500 text-sm mt-1">Manage your payouts and track your earnings.</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium transition flex items-center gap-2">
                    <i class="mdi mdi-download"></i> Export CSV
                </button>
            </div>
        </div>

        <!-- 1. Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Next Payout -->
            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Next Payout</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stats['next_payout'] }}</h3>
                    </div>
                    <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                        <i class="mdi mdi-cash-multiple text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-xs text-blue-600 font-medium flex items-center gap-1 mb-1">
                        <i class="mdi mdi-clock-outline"></i> Processing
                    </div>
                    <p class="text-xs text-gray-400 font-medium">*Will be deposited to HDFC Bank (***1234)</p>
                </div>
            </div>

            <!-- Due Date -->
            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Due Date</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stats['due_date'] }}</h3>
                    </div>
                    <div class="p-2 bg-purple-50 rounded-lg text-purple-600">
                        <i class="mdi mdi-calendar-check text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-400">
                    Estimated arrival to bank
                </div>
            </div>

            <!-- Total Earned -->
            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Earned</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_earned'] }}</h3>
                    </div>
                    <div class="p-2 bg-green-50 rounded-lg text-green-600">
                        <i class="mdi mdi-chart-line text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-xs text-green-600 font-medium">
                    Lifetime earnings
                </div>
            </div>

            <!-- On Hold -->
            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">On Hold</p>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stats['on_hold'] }}</h3>
                    </div>
                    <div class="p-2 bg-orange-50 rounded-lg text-orange-600">
                        <i class="mdi mdi-timer-sand text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-400">
                    Waiting for return period
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 mb-8">
            <!-- 3. Settlement History Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                <!-- 4. Search & Filters -->
                <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Settlement History</h3>
                        <p class="text-xs text-gray-500 mt-1">Payments are processed every Wednesday.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <select
                            class="bg-gray-50 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                            <option>All Status</option>
                            <option>Paid</option>
                            <option>Processing</option>
                            <option>Failed</option>
                        </select>
                        <select
                            class="bg-gray-50 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                            <option>January 2026</option>
                            <option>December 2025</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="text-xs font-semibold text-gray-500 bg-gray-50 border-b border-gray-100 uppercase tracking-wider">
                                <th class="p-3">Reference ID</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Orders</th>
                                <th class="p-3">Amount</th>
                                <th class="p-3">Status</th>
                                <th class="p-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($settlements as $settlement)
                                <tr class="group hover:bg-blue-50/50 transition-colors cursor-pointer"
                                    @click="openModal({{ json_encode($settlement) }})">
                                    <td class="p-3 font-medium text-gray-900">{{ $settlement['ref_id'] }}</td>
                                    <td class="p-3 text-gray-500">{{ $settlement['date'] }}</td>
                                    <td class="p-3 text-gray-500">{{ $settlement['orders_count'] }} Orders</td>
                                    <td class="p-3 font-semibold text-gray-900">{{ $settlement['amount'] }}</td>
                                    <td class="p-3">
                                        @if($settlement['status'] === 'Paid')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Paid
                                            </span>
                                        @elseif($settlement['status'] === 'Processing')
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Processing
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Failed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-3 text-right">
                                        <button class="text-gray-400 hover:text-primary transition-colors p-1"
                                            title="Download Receipt" @click.stop>
                                            <i class="mdi mdi-download"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (Mock) -->
                <div class="flex items-center justify-between mt-4 border-t border-gray-100 pt-4">
                    <p class="text-xs text-gray-500">Showing 1 to {{ count($settlements) }} of 24 results</p>
                    <div class="flex gap-1">
                        <button
                            class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50 disabled:opacity-50">Prev</button>
                        <button
                            class="px-2 py-1 text-xs border border-indigo-100 bg-indigo-50 text-indigo-600 font-medium rounded">1</button>
                        <button
                            class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50">2</button>
                        <button
                            class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>


        </div>

        <!-- 5. Transaction Breakdown (Popup) -->
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-cloak>

            <div @click.away="showModal = false" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden">

                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Transaction Details</h3>
                    <button @click="showModal = false"
                        class="text-gray-400 hover:text-gray-600 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                        <i class="mdi mdi-close text-lg"></i>
                    </button>
                </div>

                <div class="p-6 space-y-4" x-if="selectedTxn">
                    <div class="flex justify-between items-center pb-4 border-b border-gray-50">
                        <span class="text-sm text-gray-500">Reference ID</span>
                        <span class="font-mono text-sm font-medium text-gray-900" x-text="selectedTxn?.ref_id"></span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Total Sales</span>
                            <span class="text-sm font-semibold text-gray-900"
                                x-text="'(+) ' + selectedTxn?.details.total_sales"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Commission Fee</span>
                            <span class="text-sm font-medium text-red-500"
                                x-text="'(-) ' + selectedTxn?.details.commission"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Shipping Cost</span>
                            <span class="text-sm font-medium text-red-500"
                                x-text="'(-) ' + selectedTxn?.details.shipping"></span>
                        </div>
                    </div>

                    <div class="pt-4 mt-2 border-t border-dashed border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-base font-bold text-gray-900">Net Payout</span>
                            <span class="text-xl font-bold text-green-600"
                                x-text="'(=) ' + selectedTxn?.details.net_payout"></span>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 flex justify-end gap-3">
                    <button @click="showModal = false"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">Close</button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                        <i class="mdi mdi-download"></i> Invoice
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection