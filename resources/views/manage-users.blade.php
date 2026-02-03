@extends('layouts.app')

@section('content')
    {{-- Tailwind CSS CDN --}}
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
        /* Scope resets to avoid breaking the sidebar/nav */
        .manage-users-wrapper {
            font-family: 'Inter', sans-serif;
        }

        .manage-users-wrapper table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .manage-users-wrapper td {
            vertical-align: middle;
        }
    </style>

    @php
        $users = [
            [
                'id' => 1,
                'name' => 'Rahul (You)',
                'email' => 'rahul@store.com',
                'role' => 'Super Admin',
                'avatar' => 'https://ui-avatars.com/api/?name=Rahul+Kumar&background=4F46E5&color=fff',
                'last_login' => 'Now',
                'status' => true,
            ],
            [
                'id' => 2,
                'name' => 'Aditi Sharma',
                'email' => 'aditi.ops@store.com',
                'role' => 'Manager',
                'avatar' => 'https://ui-avatars.com/api/?name=Aditi+Sharma&background=0EA5E9&color=fff',
                'last_login' => 'Today, 9:15 AM',
                'status' => true,
            ],
            [
                'id' => 3,
                'name' => 'Vikram Singh',
                'email' => 'vikram.pack@store.com',
                'role' => 'Staff',
                'avatar' => 'https://ui-avatars.com/api/?name=Vikram+Singh&background=F59E0B&color=fff',
                'last_login' => 'Yesterday, 5:30 PM',
                'status' => false,
            ],
        ];
    @endphp

    <div class="manage-users-wrapper px-6 py-8 min-h-screen bg-gray-50">
        {{-- Top Control Panel --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Manage Users</h1>
                <p class="text-sm text-gray-500 mt-2 flex items-center gap-2">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ count($users) }} Active Users
                    </span>
                    <span class="text-gray-400">|</span>
                    <span>Control who has access to your store</span>
                </p>
            </div>
            <div>
                <button onclick="toggleModal('addUserModal')"
                    class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg shadow-blue-500/30 transition-all duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New User
                </button>
            </div>
        </div>

        {{-- Main Content: User Table --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-1/4 px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Name & Avatar
                            </th>
                            <th scope="col"
                                class="w-1/4 px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Email ID
                            </th>
                            <th scope="col"
                                class="w-1/6 px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="w-1/6 px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Last Login
                            </th>
                            <th scope="col"
                                class="w-1/12 px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="w-1/12 px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                {{-- Name & Avatar --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white shadow-sm"
                                                src="{{ $user['avatar'] }}" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $user['name'] }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
                                </td>

                                {{-- Role --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user['role'] === 'Super Admin')
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                            👑 {{ $user['role'] }}
                                        </span>
                                    @elseif($user['role'] === 'Manager')
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            💼 {{ $user['role'] }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            📦 {{ $user['role'] }}
                                        </span>
                                    @endif
                                </td>

                                {{-- Last Login --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-500">{{ $user['last_login'] }}</span>
                                </td>

                                {{-- Status Toggle --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        class="{{ $user['status'] ? 'bg-green-500' : 'bg-gray-200' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                                        role="switch" aria-checked="{{ $user['status'] ? 'true' : 'false' }}">
                                        <span aria-hidden="true"
                                            class="{{ $user['status'] ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                    </button>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end space-x-3">
                                        <button
                                            class="text-gray-400 hover:text-blue-600 transition-colors p-1 rounded hover:bg-blue-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button
                                            class="text-gray-400 hover:text-red-600 transition-colors p-1 rounded hover:bg-red-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination Placeholder --}}
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <span class="text-sm text-gray-500">Showing <span class="font-medium">1</span> to <span
                        class="font-medium">3</span> of <span class="font-medium">3</span> results</span>
                <div class="flex space-x-2">
                    <button
                        class="px-3 py-1 border border-gray-300 rounded-md text-sm bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50"
                        disabled>Previous</button>
                    <button
                        class="px-3 py-1 border border-gray-300 rounded-md text-sm bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50"
                        disabled>Next</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add User Modal --}}
    {{-- Use inline style display:none as fallback, ensuring it's hidden on load --}}
    <div id="addUserModal" style="display: none;" class="hidden fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-sm"
            onclick="toggleModal('addUserModal')"></div>

        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0 w-full">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Invite Team Member
                            </h3>
                            <div class="mt-2 text-sm text-gray-500">
                                Give them access to your store. They will receive an email to set their password.
                            </div>

                            {{-- Form --}}
                            <div class="mt-6 space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <div class="mt-1">
                                        <input type="text" name="name" id="name"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                                            placeholder="e.g. Rahul Kumar">
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <div class="mt-1">
                                        <input type="email" name="email" id="email"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                                            placeholder="e.g. rahul@store.com">
                                    </div>
                                </div>

                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700">Select Role</label>
                                    <div class="mt-1 relative">
                                        <select id="role" name="role"
                                            class="block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                            <option value="manager" selected>💼 Manager (Operations)</option>
                                            <option value="staff">📦 Staff (Fulfillment)</option>
                                            <option value="admin">👑 Super Admin</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Managers can't see bank details. Staff can only
                                        see orders.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto transition-all"
                        onclick="toggleModal('addUserModal')">Send Invitation</button>
                    <button type="button"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-all"
                        onclick="toggleModal('addUserModal')">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            // We toggle the hidden class for Tailwind
            modal.classList.toggle("hidden");
            // We also toggle the 'flex' class
            modal.classList.toggle("flex");

            // Handle the inline style fallback
            if (modal.style.display === "none" || modal.style.display === "") {
                modal.style.display = "flex";
            } else {
                modal.style.display = "none";
            }
        }
    </script>
@endsection