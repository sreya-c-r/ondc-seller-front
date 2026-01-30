@extends('layouts.app')
@section('content')

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#3b82f6',
            secondary: '#f3f4f6',
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
    .dashboard-container {
      font-family: 'Inter', sans-serif;
    }

    /* Scoped styles/helpers if needed */
  </style>

  <div class="dashboard-container p-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
        <p class="text-gray-500 text-sm mt-1">Welcome back! Here's what's happening today.</p>
      </div>
      <div class="flex bg-white rounded-lg shadow-sm border border-gray-200 p-1">
        <button class="px-4 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 rounded-md">7 Days</button>
        <!-- <button class="px-4 py-1.5 text-xs font-medium text-gray-500 hover:text-gray-900">30 Days</button> -->
        <button class="px-4 py-1.5 text-xs font-medium text-gray-500 hover:text-gray-900">Month</button>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <!-- Stat Card 1 -->
      <div
        class="bg-white rounded-xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
        <div
          class="absolute right-0 top-0 w-24 h-24 bg-blue-50 rounded-full -mr-6 -mt-6 transition-transform group-hover:scale-110">
        </div>
        <div class="relative font-inter">
          <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
          <div class="flex items-baseline gap-2">
            <h3 class="text-2xl font-bold text-gray-900">1,254</h3>
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-1.5 py-0.5 rounded">+3.2%</span>
          </div>
          <div class="mt-4 flex items-center justify-between">
            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
              <div class="h-full bg-blue-500 w-[70%] rounded-full"></div>
            </div>
          </div>
          <p class="text-xs text-gray-400 mt-2">18 New Today</p>
        </div>
      </div>

      <!-- Stat Card 2 -->
      <div
        class="bg-white rounded-xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
        <div
          class="absolute right-0 top-0 w-24 h-24 bg-purple-50 rounded-full -mr-6 -mt-6 transition-transform group-hover:scale-110">
        </div>
        <div class="relative">
          <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
          <div class="flex items-baseline gap-2">
            <h3 class="text-2xl font-bold text-gray-900">$75,600</h3>
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-1.5 py-0.5 rounded">+15%</span>
          </div>
          <div class="mt-4 flex items-center justify-between">
            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
              <div class="h-full bg-purple-500 w-[50%] rounded-full"></div>
            </div>
          </div>
          <p class="text-xs text-gray-400 mt-2">Net Profit: $45,300</p>
        </div>
      </div>

      <!-- Stat Card 3 -->
      <div
        class="bg-white rounded-xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
        <div
          class="absolute right-0 top-0 w-24 h-24 bg-orange-50 rounded-full -mr-6 -mt-6 transition-transform group-hover:scale-110">
        </div>
        <div class="relative">
          <p class="text-sm font-medium text-gray-500 mb-1">Active Shipments</p>
          <div class="flex items-baseline gap-2">
            <h3 class="text-2xl font-bold text-gray-900">85</h3>
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-1.5 py-0.5 rounded">+5</span>
          </div>
          <div class="mt-4 flex items-center justify-between">
            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
              <div class="h-full bg-orange-500 w-[35%] rounded-full"></div>
            </div>
          </div>
          <p class="text-xs text-gray-400 mt-2">12 Arriving Today</p>
        </div>
      </div>

      <!-- Stat Card 4 -->
      <div
        class="bg-white rounded-xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 relative overflow-hidden group hover:shadow-lg transition-all duration-300">
        <div
          class="absolute right-0 top-0 w-24 h-24 bg-pink-50 rounded-full -mr-6 -mt-6 transition-transform group-hover:scale-110">
        </div>
        <div class="relative">
          <p class="text-sm font-medium text-gray-500 mb-1">Low Stock Items</p>
          <div class="flex items-baseline gap-2">
            <h3 class="text-2xl font-bold text-gray-900">18</h3>
            <span class="text-xs font-semibold text-red-500 bg-red-50 px-1.5 py-0.5 rounded">Critical</span>
          </div>
          <div class="mt-4 flex items-center justify-between">
            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
              <div class="h-full bg-pink-500 w-[25%] rounded-full"></div>
            </div>
          </div>
          <p class="text-xs text-gray-400 mt-2">3 Out of Stock</p>
        </div>
      </div>
    </div>

    <!-- Charts Section and Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
      <!-- Main Chart Area -->
      <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-lg font-bold text-gray-900">Sales Overview</h3>
          <button class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
        <!-- Mock Chart Placeholder (CSS Visual) -->
        <div class="h-64 flex items-end justify-between gap-2 px-2">
          <div class="w-full bg-blue-100 rounded-t-sm h-[40%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">40%</span>
          </div>
          <div class="w-full bg-blue-100 rounded-t-sm h-[65%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">65%</span>
          </div>
          <div class="w-full bg-blue-100 rounded-t-sm h-[50%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">50%</span>
          </div>
          <div
            class="w-full bg-blue-500 rounded-t-sm h-[85%] hover:bg-blue-600 transition-all relative group shadow-lg shadow-blue-200">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">85%</span>
          </div>
          <div class="w-full bg-blue-100 rounded-t-sm h-[60%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">60%</span>
          </div>
          <div class="w-full bg-blue-100 rounded-t-sm h-[75%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">75%</span>
          </div>
          <div class="w-full bg-blue-100 rounded-t-sm h-[55%] hover:bg-blue-200 transition-all relative group">
            <span
              class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">55%</span>
          </div>
        </div>
        <div class="flex justify-between mt-4 text-xs text-gray-400 font-medium uppercase">
          <span>Mon</span><span>Tue</span><span>Wed</span><span
            class="text-blue-600 font-bold">Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
        </div>
      </div>

      <!-- Sidebar Stats / Retention -->

    </div>
  </div>
@endsection