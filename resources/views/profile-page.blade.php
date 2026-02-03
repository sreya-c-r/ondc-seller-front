@extends('layouts.app')

@section('content')
  {{-- Tailwind CSS Setup --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#3b82f6',
            secondary: '#f3f4f6',
            danger: '#ef4444',
            success: '#22c55e',
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
    .profile-wrapper {
      font-family: 'Inter', sans-serif;
    }
    /* Toggle Switch Custom Styles */
    .toggle-checkbox:checked {
        right: 0;
        border-color: #3b82f6;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #3b82f6;
    }
    .toggle-checkbox {
        right: 0;
        z-index: 10;
    }
    .toggle-label {
        width: 3rem;
        height: 1.5rem;
    }
    /* Hide scrollbar for cleaner look */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
  </style>

<div class="profile-wrapper min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto space-y-6">

        {{-- 1. Header (Identity Card) --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">
            {{-- Decorative Gradient Background --}}
            <div class="h-32 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
            
            <div class="px-6 pb-6">
                <div class="relative flex flex-col sm:flex-row items-center sm:items-end -mt-12 mb-4">
                    {{-- Avatar --}}
                    <div class="relative group">
                        <div class="h-24 w-24 rounded-full p-1 bg-white shadow-lg">
                            <img src="https://ui-avatars.com/api/?name=Sreya+Menon&background=random&size=256" alt="Profile" class="h-full w-full rounded-full object-cover">
                        </div>
                        {{-- Camera Icon --}}
                        <button class="absolute bottom-1 right-1 p-1.5 bg-gray-900 text-white rounded-full hover:bg-gray-700 transition-colors shadow-sm" title="Change Photo">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                    
                    {{-- User Info --}}
                    <div class="mt-4 sm:mt-0 sm:ml-4 text-center sm:text-left flex-1">
                        <div class="flex flex-col sm:flex-row items-center sm:items-baseline gap-2">
                            <h1 class="text-2xl font-bold text-gray-900">Sreya Menon</h1>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-800 border border-indigo-200">
                                Owner
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Member Since Jan 2026</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Personal Details Section --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Personal Details</h2>
            </div>
            <div class="p-6 space-y-6">
                
                {{-- Full Name --}}
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-gray-100 rounded-lg text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-medium text-gray-500 uppercase">Full Name</label>
                        <div class="text-gray-900 font-medium">Sreya Menon</div>
                    </div>
                </div>

                {{-- Email Address --}}
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-gray-100 rounded-lg text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-medium text-gray-500 uppercase">Email Address</label>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500 font-medium select-none">sreya@example.com</span>
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Verified
                            </span>
                        </div>
                    </div>
                    {{-- Lock Icon for Read-only feel --}}
                    <div class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>

                {{-- Mobile Number --}}
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-gray-100 rounded-lg text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-medium text-gray-500 uppercase">Mobile Number</label>
                        <div class="text-gray-900 font-medium">+91 98765 43210</div>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700 text-sm font-semibold hover:underline">Edit</button>
                </div>

            </div>
        </div>

        {{-- 3. Account Security --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Account Security</h2>
            </div>
            <div class="p-6 space-y-6">
                {{-- Password --}}
                <div class="flex items-center justify-between">
                    <div>
                        <label class="block text-sm font-medium text-gray-900">Password</label>
                        <div class="text-gray-500 tracking-widest mt-1">********</div>
                    </div>
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                        Change Password
                    </button>
                </div>

                <div class="border-t border-gray-50"></div>

                {{-- 2FA --}}
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <label class="block text-sm font-medium text-gray-900">Two-Factor Authentication</label>
                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-600 border border-blue-100 uppercase tracking-wide">Pro</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Ask for OTP when logging in from a new device.</p>
                    </div>
                    
                    {{-- Toggle Switch --}}
                    <label for="toggle-2fa" class="flex items-center cursor-pointer relative">
                        <input type="checkbox" id="toggle-2fa" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>

        {{-- 4. Preferences --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">App Preferences</h2>
            </div>
            <div class="p-6 space-y-6">
                
                {{-- Notifications --}}
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Email Alerts</p>
                            <p class="text-xs text-gray-500">Receive daily summaries</p>
                        </div>
                        <label class="flex items-center cursor-pointer relative">
                            <input type="checkbox" checked class="sr-only peer">
                             <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900">WhatsApp Alerts</p>
                            <p class="text-xs text-gray-500">Get important order updates</p>
                        </div>
                        <label class="flex items-center cursor-pointer relative">
                            <input type="checkbox" class="sr-only peer">
                             <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>

                <div class="border-t border-gray-50"></div>

                {{-- Language & Theme --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">Language</label>
                        <select class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 border bg-gray-50">
                            <option>English (US)</option>
                            <option>Hindi</option>
                            <option>Malayalam</option>
                        </select>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                             <label class="block text-sm font-medium text-gray-900">Theme</label>
                             <span class="text-xs text-gray-400">Experimental</span>
                        </div>
                         <div class="flex items-center p-1 bg-gray-100 rounded-lg w-max">
                            <button class="px-3 py-1.5 rounded-md bg-white text-gray-900 font-medium text-xs shadow-sm shadow-gray-200">Light</button>
                            <button class="px-3 py-1.5 rounded-md text-gray-500 font-medium text-xs hover:text-gray-900">Dark</button>
                         </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- 5. Danger Zone --}}
        <div class="mt-8 pt-6 border-t border-gray-200">
            <button class="w-full flex items-center justify-center gap-2 px-6 py-3 text-red-600 bg-red-50 hover:bg-red-100 border border-red-100 rounded-xl transition-colors font-semibold group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Log Out of All Devices
            </button>
            <p class="text-center text-xs text-gray-400 mt-4">
                Version 1.0.4 • © 2026 SellerHub
            </p>
        </div>

    </div>
</div>
@endsection
