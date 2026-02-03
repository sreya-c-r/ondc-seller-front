@extends('layouts.app')
@section('content')
    @php
        // Mock Data
        $stats = [
            'total' => 150,
            'active' => 120,
            'out_of_stock' => 5
        ];

        $products = [
            [
                'id' => 'P-1001',
                'name' => "Men's Cotton Shirt",
                'image' => 'https://via.placeholder.com/40',
                'category' => 'Clothing',
                'price' => '₹999',
                'stock' => 45,
                'status' => true,
                'date_added' => 'Jan 28, 2026'
            ],
            [
                'id' => 'P-1002',
                'name' => "Wireless Bluetooth Headphones",
                'image' => 'https://via.placeholder.com/40',
                'category' => 'Electronics',
                'price' => '₹2,499',
                'stock' => 12,
                'status' => true,
                'date_added' => 'Jan 25, 2026'
            ],
            [
                'id' => 'P-1003',
                'name' => "Slim Fit Jeans",
                'image' => 'https://via.placeholder.com/40',
                'category' => 'Clothing',
                'price' => '₹1,299',
                'stock' => 3, // Low stock
                'status' => true,
                'date_added' => 'Jan 20, 2026'
            ],
            [
                'id' => 'P-1004',
                'name' => "Ceramic Coffee Mug",
                'image' => 'https://via.placeholder.com/40',
                'category' => 'Home & Kitchen',
                'price' => '₹299',
                'stock' => 0, // Out of stock
                'status' => false,
                'date_added' => 'Jan 18, 2026'
            ],
            [
                'id' => 'P-1005',
                'name' => "Running Shoes",
                'image' => 'https://via.placeholder.com/40',
                'category' => 'Footwear',
                'price' => '₹3,499',
                'stock' => 28,
                'status' => true,
                'date_added' => 'Jan 10, 2026'
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

        /* Toggle Switch */
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }

        .toggle-checkbox:checked+.toggle-label {
            @apply: bg-green-400;
            background-color: #68D391;
        }

        .toggle-checkbox {
            right: 0;
            z-index: 10;
        }

        /* Custom scrollbar for table if needed */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="dashboard-container p-6 font-inter bg-gray-50 min-h-screen" x-data="{
            selectedProducts: [],
            allSelected: false,
            toggleAll() {
                this.allSelected = !this.allSelected;
                if (this.allSelected) {
                    this.selectedProducts = {{ json_encode(array_column($products, 'id')) }};
                } else {
                    this.selectedProducts = [];
                }
            },
            toggleSelection(id) {
                if (this.selectedProducts.includes(id)) {
                    this.selectedProducts = this.selectedProducts.filter(item => item !== id);
                    this.allSelected = false;
                } else {
                    this.selectedProducts.push(id);
                }
            }
        }">

        <!-- 1. Top Actions & Stats -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-8">
            <!-- Left: Title & Quick Stats -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 w-full lg:w-auto">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Products</h1>
                    <p class="text-xs text-gray-500 mt-1">Manage your product catalog</p>
                </div>

                <!-- Quick Stats Pills -->
                <div class="flex gap-3 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0">
                    <div
                        class="bg-white border border-gray-200 rounded-lg px-3 py-1.5 flex items-center gap-2 shadow-sm whitespace-nowrap">
                        <span class="text-xs text-gray-500 font-medium">Total</span>
                        <span class="text-sm font-bold text-gray-900">{{ $stats['total'] }}</span>
                    </div>
                    <div
                        class="bg-white border border-gray-200 rounded-lg px-3 py-1.5 flex items-center gap-2 shadow-sm whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <span class="text-xs text-gray-500 font-medium">Live</span>
                        <span class="text-sm font-bold text-gray-900">{{ $stats['active'] }}</span>
                    </div>
                    <div
                        class="bg-white border border-red-100 rounded-lg px-3 py-1.5 flex items-center gap-2 shadow-sm whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                        <span class="text-xs text-red-600 font-medium">Out of Stock</span>
                        <span class="text-sm font-bold text-red-700">{{ $stats['out_of_stock'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Right: Action Buttons -->
            <div class="flex gap-3 w-full lg:w-auto">
                <button
                    class="flex-1 lg:flex-none border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium transition flex items-center justify-center gap-2">
                    <i class="mdi mdi-upload"></i> Bulk Upload
                </button>
                <button
                    class="flex-1 lg:flex-none bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-lg text-sm font-medium transition flex items-center justify-center gap-2">
                    <i class="mdi mdi-plus"></i> Add New Product
                </button>
            </div>
        </div>

        <!-- 2. Search & Filters Toolbar -->
        <div
            class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm mb-6 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Search -->
            <div class="relative w-full md:w-96">
                <input type="text" placeholder="Search by Name, SKU or ID..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="mdi mdi-magnify text-gray-400"></i>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex gap-2 w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 min-w-[140px]">
                    <option value="">Category: All</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                </select>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 min-w-[140px]">
                    <option value="">Stock: All</option>
                    <option value="low">Low Stock</option>
                    <option value="out">Out of Stock</option>
                </select>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 min-w-[140px]">
                    <option value="">Status: All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <!-- Bulk Actions Toolbar (Visible when items selected) -->
        <div x-show="selectedProducts.length > 0" x-transition
            class="bg-blue-50 border border-blue-100 p-3 rounded-lg mb-4 flex justify-between items-center">
            <span class="text-sm text-blue-800 font-medium px-2">
                <span x-text="selectedProducts.length"></span> items selected
            </span>
            <div class="flex gap-2">
                <button
                    class="text-xs bg-white text-green-600 border border-green-200 px-3 py-1.5 rounded hover:bg-green-50 font-medium">Mark
                    as Active</button>
                <button
                    class="text-xs bg-white text-red-600 border border-red-200 px-3 py-1.5 rounded hover:bg-red-50 font-medium">Delete
                    Selected</button>
            </div>
        </div>

        <!-- 3. The Product List (Main Table) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                            <th class="p-4 w-4">
                                <input type="checkbox" @click="toggleAll()" :checked="allSelected"
                                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 cursor-pointer">
                            </th>
                            <th class="p-4 font-semibold">Product</th>
                            <th class="p-4 font-semibold">Category</th>
                            <th class="p-4 font-semibold">Price</th>
                            <th class="p-4 font-semibold">Stock</th>
                            <th class="p-4 font-semibold">Status</th>
                            <th class="p-4 font-semibold">Date Added</th>
                            <th class="p-4 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors group">
                                <td class="p-4">
                                    <input type="checkbox" :checked="selectedProducts.includes('{{ $product['id'] }}')"
                                        @click="toggleSelection('{{ $product['id'] }}')"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="h-10 w-10 rounded-lg bg-gray-100 border border-gray-200 flex-shrink-0 overflow-hidden">
                                            <img src="{{ $product['image'] }}" alt="" class="h-full w-full object-cover">
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $product['name'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $product['id'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-gray-600">
                                    {{ $product['category'] }}
                                </td>
                                <td class="p-4 font-medium text-gray-900 text-sm">
                                    {{ $product['price'] }}
                                </td>
                                <td class="p-4">
                                    @if($product['stock'] == 0)
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                            Out of Stock
                                        </span>
                                    @elseif($product['stock'] <= 5)
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-orange-100 text-orange-800">
                                            {{ $product['stock'] }} units
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-600">
                                            {{ $product['stock'] }} units
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <!-- Toggle Switch -->
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
                                        x-data="{ isOn: {{ $product['status'] ? 'true' : 'false' }} }">
                                        <input type="checkbox" name="toggle" :id="'toggle-' + '{{ $product['id'] }}'"
                                            :checked="isOn" @click="isOn = !isOn"
                                            class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300" />
                                        <label :for="'toggle-' + '{{ $product['id'] }}'"
                                            class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-gray-500">
                                    {{ $product['date_added'] }}
                                </td>
                                <td class="p-4 text-right">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors"
                                            title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button
                                            class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded transition-colors"
                                            title="Delete">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs text-gray-500">Showing 1-5 of 150 products</span>
                <div class="flex gap-1">
                    <button
                        class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50 disabled:opacity-50">Prev</button>
                    <button
                        class="px-2 py-1 text-xs border border-blue-100 bg-blue-50 text-blue-600 font-medium rounded">1</button>
                    <button
                        class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50">2</button>
                    <button
                        class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50">3</button>
                    <span class="px-2 py-1 text-xs text-gray-400">...</span>
                    <button
                        class="px-2 py-1 text-xs border border-gray-200 rounded text-gray-500 hover:bg-gray-50">Next</button>
                </div>
            </div>
        </div>

    </div>
@endsection