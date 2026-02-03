@extends('layouts.app')

@section('content')
    @php
        // Mock Data for Inventory
        $stats = [
            'total_units' => 5400,
            'low_stock_alerts' => 12,
            'out_of_stock' => 3
        ];

        $inventory_items = [
            [
                'id' => 'SHIRT-BLUE-L',
                'name' => "Men's Cotton Shirt - Blue/L",
                'category' => 'Clothing',
                'stock' => 45,
                'reserved' => 5,
                'status' => 'in_stock'
            ],
            [
                'id' => 'PHONE-X-BLK',
                'name' => "Smartphone Model X - Black",
                'category' => 'Electronics',
                'stock' => 12,
                'reserved' => 2,
                'status' => 'in_stock'
            ],
            [
                'id' => 'JEANS-SLIM-32',
                'name' => "Slim Fit Jeans - Size 32",
                'category' => 'Clothing',
                'stock' => 4, // Low stock
                'reserved' => 1,
                'status' => 'low_stock'
            ],
            [
                'id' => 'MUG-COFFEE-01',
                'name' => "Ceramic Coffee Mug",
                'category' => 'Home',
                'stock' => 0, // Out of stock
                'reserved' => 0,
                'status' => 'out_of_stock'
            ],
            [
                'id' => 'SHOE-RUN-09',
                'name' => "Running Shoes - Size 9",
                'category' => 'Footwear',
                'stock' => 28,
                'reserved' => 3,
                'status' => 'in_stock'
            ],
            [
                'id' => 'HEADPHONE-BT-W',
                'name' => "Bluetooth Headphones - White",
                'category' => 'Electronics',
                'stock' => 8,
                'reserved' => 0,
                'status' => 'in_stock'
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
                            mono: ['Roboto Mono', 'monospace'],
                        }
                    }
                }
            }
        </script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
        <style>
            .font-inter { font-family: 'Inter', sans-serif; }
            .font-mono { font-family: 'Roboto Mono', monospace; }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }
            ::-webkit-scrollbar-track {
                background: #f1f1f1; 
            }
            ::-webkit-scrollbar-thumb {
                background: #cbd5e1; 
                border-radius: 3px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8; 
            }

            /* Number input hide arrows */
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
                margin: 0; 
            }
        </style>

        <div class="inventory-page p-6 font-inter bg-slate-50 min-h-screen" 
             x-data="inventoryManager({{ json_encode($inventory_items) }})">

            <!-- 1. Header & Top Stats (Stock Health) -->
            <div class="mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Inventory Management</h1>
                        <p class="text-sm text-slate-500 mt-1">Real-time stock tracking and updates</p>
                    </div>

                    <!-- Stats Cards -->
                    <div class="flex flex-wrap gap-4 w-full md:w-auto">
                        <!-- Total Units -->
                        <div class="bg-white border border-slate-200 rounded-lg p-3 shadow-sm min-w-[140px] flex-1">
                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Total Units</div>
                            <div class="text-2xl font-bold text-slate-800 mt-1">{{ number_format($stats['total_units']) }}</div>
                        </div>

                        <!-- Low Stock Alerts -->
                        <div class="bg-white border border-orange-200 bg-orange-50/30 rounded-lg p-3 shadow-sm min-w-[160px] flex-1">
                            <div class="text-xs font-semibold text-orange-600 uppercase tracking-wide flex items-center gap-1">
                                <i class="mdi mdi-alert-circle-outline"></i> Low Stock
                            </div>
                            <div class="text-2xl font-bold text-orange-700 mt-1">{{ $stats['low_stock_alerts'] }} <span class="text-xs font-normal text-orange-600">products</span></div>
                        </div>

                        <!-- Out of Stock -->
                        <div class="bg-white border border-red-200 bg-red-50/30 rounded-lg p-3 shadow-sm min-w-[140px] flex-1">
                            <div class="text-xs font-semibold text-red-600 uppercase tracking-wide flex items-center gap-1">
                                <i class="mdi mdi-close-circle-outline"></i> Out of Stock
                            </div>
                            <div class="text-2xl font-bold text-red-700 mt-1">{{ $stats['out_of_stock'] }} <span class="text-xs font-normal text-red-600">products</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Filters & Toolbar -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-4 bg-white p-3 rounded-lg border border-slate-200 shadow-sm">
                <!-- Left: Filters -->
                <div class="flex items-center gap-4">
                    <!-- Show Low Stock Only Toggle -->
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <div class="relative">
                            <input type="checkbox" class="sr-only peer" x-model="filters.lowStockOnly">
                            <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-orange-500"></div>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Low Stock Only</span>
                    </label>

                    <div class="h-6 w-px bg-slate-200"></div>

                    <!-- Category Filter -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-slate-500"><i class="mdi mdi-filter-variant"></i></span>
                        <select x-model="filters.category" 
                                class="bg-transparent border-none text-sm font-medium text-slate-700 focus:ring-0 cursor-pointer py-1 pl-0 pr-8">
                            <option value="">All Categories</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Home">Home</option>
                            <option value="Footwear">Footwear</option>
                        </select>
                    </div>
                </div>

                <!-- Right: Search -->
                <div class="relative w-full max-w-xs">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="mdi mdi-magnify text-slate-400"></i>
                    </div>
                    <input type="text" x-model="search" placeholder="Search SKU or Product..." 
                           class="block w-full text-sm p-2 pl-9 text-slate-900 border border-slate-300 rounded-md bg-slate-50 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-400">
                </div>
            </div>

            <!-- 3. Main Table (Spreadsheet Layout) -->
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-100 border-b border-slate-200">
                            <tr>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">SKU / ID</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider">Product Name</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-48 text-center">Current Stock</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-24 text-center">Reserved</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-24 text-center">Available</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-32 text-center">Status</th>
                                <th class="p-3 text-xs font-semibold text-slate-600 uppercase tracking-wider w-24 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <template x-for="item in filteredItems" :key="item.id">
                                <tr class="hover:bg-blue-50/50 transition-colors group">
                                    <!-- SKU / ID -->
                                    <td class="p-3">
                                        <span class="font-mono text-xs font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded" x-text="item.id"></span>
                                    </td>

                                    <!-- Product Name -->
                                    <td class="p-3">
                                        <div class="text-sm font-medium text-slate-800" x-text="item.name"></div>
                                        <div class="text-xs text-slate-400" x-text="item.category"></div>
                                    </td>

                                    <!-- Current Stock (Input Box) -->
                                    <td class="p-3">
                                        <div class="flex items-center justify-center gap-1">
                                            <button @click="decrementStock(item)" 
                                                    class="w-7 h-7 flex items-center justify-center rounded bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors">
                                                <i class="mdi mdi-minus text-xs"></i>
                                            </button>

                                            <input type="number" x-model.number="item.stock" @input="updateStatus(item)"
                                                   class="w-16 h-8 text-center text-sm font-semibold text-slate-800 border-2 rounded focus:ring-0 focus:border-blue-500 transition-colors"
                                                   :class="{ 
                                                        'border-slate-200': item.stock > 5, 
                                                        'border-orange-300 bg-orange-50': item.stock <= 5 && item.stock > 0,
                                                        'border-red-300 bg-red-50': item.stock == 0
                                                   }">

                                            <button @click="incrementStock(item)"
                                                    class="w-7 h-7 flex items-center justify-center rounded bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors">
                                                <i class="mdi mdi-plus text-xs"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <!-- Reserved -->
                                    <td class="p-3 text-center">
                                        <span class="text-sm text-slate-500 font-medium" x-text="item.reserved"></span>
                                    </td>

                                    <!-- Available (Calculated) -->
                                    <td class="p-3 text-center">
                                        <span class="text-sm font-bold" 
                                              :class="item.stock - item.reserved > 0 ? 'text-slate-700' : 'text-red-600'"
                                              x-text="Math.max(0, item.stock - item.reserved)">
                                        </span>
                                    </td>

                                    <!-- Status Badge -->
                                    <td class="p-3 text-center">
                                        <!-- In Stock -->
                                        <span x-show="item.stock > 5" 
                                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            In Stock
                                        </span>
                                        <!-- Low Stock -->
                                        <span x-show="item.stock <= 5 && item.stock > 0" 
                                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                            Low Stock
                                        </span>
                                        <!-- Out of Stock -->
                                        <span x-show="item.stock == 0" 
                                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                            Out of Stock
                                        </span>
                                    </td>

                                    <!-- Update Button -->
                                    <td class="p-3 text-center">
                                        <button @click="saveItem(item)" 
                                                class="text-xs font-medium text-blue-600 hover:text-blue-800 hover:underline transition-all">
                                            Save
                                        </button>
                                    </td>
                                </tr>
                            </template>

                            <!-- Empty State -->
                            <tr x-show="filteredItems.length === 0">
                                <td colspan="7" class="p-8 text-center text-slate-500">
                                    <i class="mdi mdi-package-variant-closed text-4xl mb-2 opacity-50 block"></i>
                                    No products found matching your filters.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Quick Footer -->
                <div class="bg-slate-50 p-3 border-t border-slate-200 flex justify-end">
                    <button class="bg-slate-800 hover:bg-slate-900 text-white text-xs px-4 py-2 rounded font-medium transition shadow-sm flex items-center gap-2">
                        <i class="mdi mdi-content-save-all"></i> Save All Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Alpine Logic -->
        <script>
            function inventoryManager(initialItems) {
                return {
                    items: initialItems,
                    search: '',
                    filters: {
                        lowStockOnly: false,
                        category: ''
                    },

                    get filteredItems() {
                        return this.items.filter(item => {
                            // 1. Search Filter
                            const matchesSearch = item.name.toLowerCase().includes(this.search.toLowerCase()) || 
                                                  item.id.toLowerCase().includes(this.search.toLowerCase());

                            // 2. Category Filter
                            const matchesCategory = this.filters.category === '' || item.category === this.filters.category;

                            // 3. Low Stock Filter (<= 5)
                            const matchesLowStock = !this.filters.lowStockOnly || item.stock <= 5;

                            return matchesSearch && matchesCategory && matchesLowStock;
                        });
                    },

                    incrementStock(item) {
                        item.stock++;
                        this.updateStatus(item);
                    },

                    decrementStock(item) {
                        if (item.stock > 0) {
                            item.stock--;
                            this.updateStatus(item);
                        }
                    },

                    updateStatus(item) {
                        // Logic handled in view binding, just ensuring reactivity if needed in future
                    },

                    saveItem(item) {
                        // Mock save action
                        const originalText = event.target.innerText;
                        event.target.innerText = 'Saved!';
                        event.target.classList.add('text-green-600');
                        setTimeout(() => {
                            event.target.innerText = originalText;
                            event.target.classList.remove('text-green-600');
                        }, 1000);
                    }
                }
            }
        </script>
@endsection