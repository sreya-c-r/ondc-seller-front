@extends('layouts.app')

@section('content')
    @php
        // Mock Data for Grievances
        $stats = [
            'open_tickets' => 3,
            'sla_breached' => 1,
            'resolved' => 124
        ];

        $tickets = [
            [
                'id' => 'TKT-9988',
                'order_id' => 'ORD-123',
                'customer' => 'Rahul Sharma',
                'issue_type' => 'Wrong Product Delivered',
                'description' => 'I ordered a Blue shirt but received a Red one. This is completely unacceptable as I needed it for an event.',
                'photos' => ['https://via.placeholder.com/300x200?text=Wrong+Shirt'],
                'status' => 'open',
                'sla_deadline' => now()->addHours(4)->timestamp, // 4 hours left
                'messages' => [
                    ['sender' => 'buyer', 'text' => 'I ordered a Blue shirt but got Red.', 'time' => '2 hours ago'],
                    ['sender' => 'app', 'text' => 'Complaint logged by Buyer App.', 'time' => '2 hours ago']
                ]
            ],
            [
                'id' => 'TKT-9989',
                'order_id' => 'ORD-129',
                'customer' => 'Priya Singh',
                'issue_type' => 'Item Missing',
                'description' => 'The package arrived but the main item was missing. Only the accessories were inside.',
                'photos' => ['https://via.placeholder.com/300x200?text=Empty+Box'],
                'status' => 'escalated', // SLA Breached
                'sla_deadline' => now()->subHours(2)->timestamp, // Overdue by 2 hours
                'messages' => [
                    ['sender' => 'buyer', 'text' => 'Box was empty!', 'time' => '26 hours ago'],
                    ['sender' => 'seller', 'text' => 'Checking CCTV footage...', 'time' => '20 hours ago']
                ]
            ],
            [
                'id' => 'TKT-9990',
                'order_id' => 'ORD-145',
                'customer' => 'Vikram Malhotra',
                'issue_type' => 'Quality Issue',
                'description' => 'The product has a tear in the fabric.',
                'photos' => ['https://via.placeholder.com/300x200?text=Torn+Fabric'],
                'status' => 'open',
                'sla_deadline' => now()->addHours(22)->timestamp,
                'messages' => [
                    ['sender' => 'buyer', 'text' => 'Look at this tear.', 'time' => '1 hour ago']
                ]
            ]
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

        /* Custom scrollbar for chat */
        .chat-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .chat-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .chat-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
    </style>

    <div class="grievances-page p-6 font-inter bg-slate-50 min-h-screen"
        x-data="grievanceManager({{ json_encode($tickets) }})" x-cloak>

        <!-- HEADER -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Grievances & Support</h1>
                <p class="text-sm text-slate-500 mt-1">Manage IGM tickets and buyer complaints</p>
            </div>
            <div x-show="currentView === 'detail'" class="animate-fade-in">
                <button @click="currentView = 'list'"
                    class="text-sm font-medium text-slate-600 hover:text-slate-900 flex items-center gap-1 bg-white border border-slate-300 px-3 py-2 rounded-lg shadow-sm hover:bg-slate-50 transition-colors">
                    <i class="mdi mdi-arrow-left"></i> Back to List
                </button>
            </div>
        </div>

        <!-- LIST VIEW -->
        <div x-show="currentView === 'list'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100">

            <!-- 1. Top Status Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Open Tickets -->
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Open Tickets</div>
                        <div class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['open_tickets'] }}</div>
                        <div class="text-xs text-slate-400 mt-1">Requiring action</div>
                    </div>
                    <div class="h-12 w-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                        <i class="mdi mdi-ticket-account text-2xl"></i>
                    </div>
                </div>

                <!-- SLA Breached -->
                <div
                    class="bg-white border border-red-200 bg-red-50/20 rounded-xl p-5 shadow-sm flex items-center justify-between relative overflow-hidden">
                    <div class="absolute inset-0 border-l-4 border-red-500"></div>
                    <div>
                        <div class="text-xs font-semibold text-red-600 uppercase tracking-wide flex items-center gap-1">
                            <i class="mdi mdi-alert-circle"></i> SLA Breached
                        </div>
                        <div class="text-3xl font-bold text-red-700 mt-1">{{ $stats['sla_breached'] }}</div>
                        <div class="text-xs text-red-500 mt-1">Critical Attention Needed</div>
                    </div>
                    <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                        <i class="mdi mdi-clock-alert text-2xl"></i>
                    </div>
                </div>

                <!-- Resolved -->
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Total Resolved</div>
                        <div class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['resolved'] }}</div>
                        <div class="text-xs text-green-600 mt-1 flex items-center">
                            <i class="mdi mdi-trending-up mr-1"></i> +12 this week
                        </div>
                    </div>
                    <div class="h-12 w-12 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                        <i class="mdi mdi-check-circle-outline text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- 2. The Main List (Inbox Style) -->
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-semibold text-slate-800">Active Complaints</h3>
                    <div class="flex gap-2 text-sm">
                        <button class="px-3 py-1.5 rounded-full bg-slate-200 text-slate-700 font-medium">All</button>
                        <button
                            class="px-3 py-1.5 rounded-full hover:bg-slate-100 text-slate-500 transition-colors">Open</button>
                        <button
                            class="px-3 py-1.5 rounded-full hover:bg-slate-100 text-slate-500 transition-colors">Escalated</button>
                    </div>
                </div>

                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Ticket ID</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Order ID</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Issue Type</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase">Time Left (SLA)</th>
                            <th class="px-6 py-3 text-xs font-semibold text-slate-500 uppercase text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="ticket in tickets" :key="ticket.id">
                            <tr class="hover:bg-blue-50/30 transition-colors group cursor-pointer"
                                @click="openTicket(ticket)">
                                <td class="px-6 py-4">
                                    <span
                                        class="font-mono text-sm font-medium text-slate-700 bg-slate-100 px-2 py-1 rounded"
                                        x-text="ticket.id"></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-blue-600 hover:underline" @click.stop
                                        x-text="ticket.order_id"></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-slate-800" x-text="ticket.issue_type"></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border"
                                        :class="{
                                                'bg-blue-50 text-blue-700 border-blue-200': ticket.status === 'open',
                                                'bg-red-50 text-red-700 border-red-200': ticket.status === 'escalated',
                                                'bg-green-50 text-green-700 border-green-200': ticket.status === 'resolved'
                                              }" x-text="ticket.status.charAt(0).toUpperCase() + ticket.status.slice(1)">
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2"
                                        :class="getTimeLeft(ticket.sla_deadline).isOverdue ? 'text-red-600 font-bold' : 'text-slate-600'">
                                        <i class="mdi"
                                            :class="getTimeLeft(ticket.sla_deadline).isOverdue ? 'mdi-fire' : 'mdi-clock-outline'"></i>
                                        <span x-text="getTimeLeft(ticket.sla_deadline).text"></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button
                                        class="text-sm font-medium text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded transition-colors shadow-sm">
                                        View
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- DETAIL VIEW (WORKSPACE) -->
        <div x-show="currentView === 'detail'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="flex flex-col lg:flex-row gap-6 h-[calc(100vh-140px)]">

            <template x-if="activeTicket">
                <!-- Left Side: The Problem -->
                <div
                    class="w-full lg:w-1/2 bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <div class="p-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                        <h2 class="font-semibold text-slate-800 flex items-center gap-2">
                            <span class="text-slate-400">#</span><span x-text="activeTicket.id"></span>
                            <span class="mx-1 text-slate-300">|</span>
                            <span x-text="activeTicket.issue_type"></span>
                        </h2>
                        <span class="text-xs text-slate-500">Raised by <span class="font-medium text-slate-900"
                                x-text="activeTicket.customer"></span></span>
                    </div>

                    <div class="p-6 overflow-y-auto flex-1">
                        <div class="space-y-6">
                            <!-- Issue Description -->
                            <div>
                                <h4 class="text-xs uppercase tracking-wide text-slate-500 font-semibold mb-2">Customer
                                    Complaint</h4>
                                <div class="bg-red-50/50 p-4 rounded-lg border border-red-100 text-slate-800 text-sm leading-relaxed"
                                    x-text="activeTicket.description"></div>
                            </div>

                            <!-- Photos -->
                            <div x-show="activeTicket.photos && activeTicket.photos.length">
                                <h4 class="text-xs uppercase tracking-wide text-slate-500 font-semibold mb-2">Attachments /
                                    Proof</h4>
                                <div class="flex gap-3 overflow-x-auto pb-2">
                                    <template x-for="photo in activeTicket.photos">
                                        <div
                                            class="relative group cursor-pointer border border-slate-200 rounded-lg overflow-hidden w-40 h-32 flex-shrink-0">
                                            <img :src="photo"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                            <div
                                                class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                <i class="mdi mdi-magnify-plus text-white text-2xl"></i>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Order Details Snippet -->
                            <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-xs font-semibold text-slate-500 uppercase">Order Details</h4>
                                    <a href="#" class="text-xs text-blue-600 hover:underline">View Full Order</a>
                                </div>
                                <div class="flex gap-4 items-start">
                                    <div
                                        class="h-12 w-12 bg-white border border-slate-200 rounded flex items-center justify-center">
                                        <i class="mdi mdi-package-variant text-slate-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-slate-900">Men's Cotton Shirt</div>
                                        <div class="text-xs text-slate-500">Qty: 1 • ₹999</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="activeTicket">
                <!-- Right Side: Action Console -->
                <div class="w-full lg:w-1/2 flex flex-col gap-4">

                    <!-- Chat Box -->
                    <div class="bg-white border border-slate-200 rounded-xl shadow-sm flex-1 flex flex-col overflow-hidden">
                        <div
                            class="p-3 border-b border-slate-200 bg-slate-50 text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            Conversation History
                        </div>

                        <div class="flex-1 overflow-y-auto p-4 space-y-4 chat-scroll bg-slate-50/30">
                            <template x-for="msg in activeTicket.messages">
                                <div class="flex flex-col" :class="msg.sender === 'seller' ? 'items-end' : 'items-start'">
                                    <div class="max-w-[80%] rounded-2xl px-4 py-2 text-sm shadow-sm border" :class="{
                                                'bg-blue-600 text-white border-blue-600 rounded-tr-none': msg.sender === 'seller',
                                                'bg-white text-slate-700 border-slate-200 rounded-tl-none': msg.sender === 'buyer',
                                                'bg-gray-200 text-gray-600 border-gray-200 text-xs italic text-center mx-auto': msg.sender === 'app'
                                             }">
                                        <span x-text="msg.text"></span>
                                    </div>
                                    <span class="text-[10px] text-slate-400 mt-1 px-1" x-text="msg.time"></span>
                                </div>
                            </template>
                        </div>

                        <div class="p-3 border-t border-slate-200 bg-white">
                            <div class="flex gap-2">
                                <input type="text" placeholder="Type a reply to the customer..."
                                    class="flex-1 text-sm border-slate-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <button class="bg-slate-900 text-white p-2 rounded-lg hover:bg-slate-800 transition-colors">
                                    <i class="mdi mdi-send"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Resolution Actions (Fixed at bottom right) -->
                    <div class="bg-white border border-slate-200 rounded-xl shadow-lg p-4">
                        <h4 class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-3">Resolve Ticket</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <button
                                class="flex flex-col items-center justify-center p-3 rounded-lg border border-green-200 bg-green-50 text-green-700 hover:bg-green-100 transition-colors gap-1 group">
                                <i class="mdi mdi-cash-refund text-xl group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold">Full Refund</span>
                            </button>

                            <button
                                class="flex flex-col items-center justify-center p-3 rounded-lg border border-blue-200 bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors gap-1 group">
                                <i class="mdi mdi-swap-horizontal text-xl group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold">Replace Item</span>
                            </button>

                            <button
                                class="flex flex-col items-center justify-center p-3 rounded-lg border border-red-200 bg-red-50 text-red-700 hover:bg-red-100 transition-colors gap-1 group">
                                <i class="mdi mdi-close-octagon text-xl group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold">Reject</span>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

    </div>

    <!-- Logic -->
    <script>
        function grievanceManager(tickets) {
            return {
                tickets: tickets,
                currentView: 'list', // 'list' or 'detail'
                activeTicket: null,

                init() {
                    // Update timers every minute
                    setInterval(() => {
                        this.tickets = [...this.tickets]; // Trigger reactivity
                    }, 60000);
                },

                openTicket(ticket) {
                    this.activeTicket = ticket;
                    this.currentView = 'detail';
                },

                getTimeLeft(deadlineParams) {
                    const now = Math.floor(Date.now() / 1000);
                    const diff = deadlineParams - now;

                    if (diff < 0) {
                        const overdue = Math.abs(diff);
                        const hours = Math.floor(overdue / 3600);
                        return { text: `${hours}h Overdue`, isOverdue: true };
                    }

                    const hours = Math.floor(diff / 3600);
                    const minutes = Math.floor((diff % 3600) / 60);
                    return { text: `${hours}h ${minutes}m left`, isOverdue: false };
                }
            }
        }
    </script>
@endsection