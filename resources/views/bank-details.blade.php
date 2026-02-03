@extends('layouts.app')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <style>
        [x-cloak] { display: none !important; }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s;
        }
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>

    <div class="bank-details-page min-h-screen bg-gray-50 p-6 font-sans" 
         x-data="bankAccountManager()">

        <div class="max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Bank Account Setup</h1>
                <p class="text-gray-500 mt-1">Manage your bank details to receive payouts securely.</p>
            </div>

            <!-- A. Status Banner -->
            <div class="mb-8 rounded-lg border p-4 flex items-start gap-4 shadow-sm"
                 :class="{
                     'bg-green-50 border-green-200 text-green-800': status === 'verified',
                     'bg-yellow-50 border-yellow-200 text-yellow-800': status === 'pending',
                     'bg-red-50 border-red-200 text-red-800': status === 'rejected'
                 }">
                
                <!-- Icon -->
                <div class="mt-0.5">
                    <template x-if="status === 'verified'">
                        <i class="fas fa-check-circle text-xl text-green-600"></i>
                    </template>
                    <template x-if="status === 'pending'">
                        <i class="fas fa-clock text-xl text-yellow-600"></i>
                    </template>
                    <template x-if="status === 'rejected'">
                        <i class="fas fa-exclamation-circle text-xl text-red-600"></i>
                    </template>
                </div>

                <!-- Text -->
                <div>
                    <h3 class="font-bold text-base" x-text="statusTitles[status]"></h3>
                    <p class="text-sm mt-1 opacity-90" x-text="statusMessages[status]"></p>
                </div>
            </div>

            <!-- VIEW MODE: Current Bank Account Card -->
            <div x-show="mode === 'view'" x-transition 
                 class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h2 class="font-semibold text-gray-800">Current Bank Account</h2>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide bg-gray-100 text-gray-600">Primary</span>
                </div>
                
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Bank Name</label>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded bg-blue-50 flex items-center justify-center text-blue-700">
                                    <i class="fas fa-university text-lg"></i>
                                </div>
                                <span class="text-lg font-medium text-gray-900">HDFC Bank</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Account Holder</label>
                            <div class="text-lg font-medium text-gray-900">Sreya's Electronics</div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Account Number</label>
                            <div class="text-lg font-family-mono font-medium text-gray-900 tracking-wider">XXXX-XXXX-1234</div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">IFSC Code</label>
                            <div class="text-lg font-family-mono font-medium text-gray-900">HDFC0001234</div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-100 flex justify-end">
                        <button @click="initiateChange()" 
                                class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 hover:text-gray-900 px-6 py-2.5 rounded-lg font-medium shadow-sm transition-all flex items-center gap-2">
                            <i class="fas fa-pen text-sm"></i> Change Bank Account
                        </button>
                    </div>
                </div>
            </div>

            <!-- EDIT MODE: Form -->
            <div x-show="mode === 'edit'" x-cloak x-transition
                 class="bg-white rounded-xl shadow-lg border border-blue-100 overflow-hidden relative">
                
                <!-- Loading Overlay (Mock OTP) -->
                <div x-show="isLoading" 
                     class="absolute inset-0 bg-white/90 z-20 flex flex-col items-center justify-center backdrop-blur-sm transition-opacity">
                    <div class="animate-spin rounded-full h-12 w-12 border-4 border-blue-500 border-t-transparent mb-4"></div>
                    <p class="text-gray-600 font-medium">Verifying OTP...</p>
                </div>

                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-blue-50/30">
                    <h2 class="font-semibold text-blue-900">Update Bank Details</h2>
                    <button @click="mode = 'view'" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <div class="p-8">
                    <form @submit.prevent="saveDetails">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            
                            <!-- Account Holder -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Account Holder Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="As mentioned in PAN Card" class="form-input" required value="Sreya's Electronics">
                                <p class="text-xs text-gray-500 mt-1">Must match the registered business owner name.</p>
                            </div>

                            <!-- Account Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Account Number <span class="text-red-500">*</span></label>
                                <input type="password" placeholder="Enter account number" class="form-input" required>
                            </div>

                            <!-- Confirm Account Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Account Number <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Re-enter account number" class="form-input" required>
                            </div>

                            <!-- IFSC Code -->
                            <div class="md:col-span-2 space-y-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">IFSC Code <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" x-model="form.ifsc" @input="lookupIFSC" maxlength="11"
                                           placeholder="e.g. SBIN0001234" 
                                           class="form-input uppercase placeholder-normal">
                                    <div class="absolute right-3 top-3 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                
                                <!-- Auto-detect Branch Result -->
                                <div x-show="branchName" x-transition class="bg-blue-50 border border-blue-100 rounded-md p-3 flex items-start gap-3">
                                    <i class="fas fa-building text-blue-600 mt-1"></i>
                                    <div>
                                        <p class="text-sm font-bold text-blue-900" x-text="bankName"></p>
                                        <p class="text-xs text-blue-700" x-text="branchName"></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Type -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Account Type <span class="text-red-500">*</span></label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 w-full transition-colors">
                                        <input type="radio" name="acc_type" class="text-blue-600 focus:ring-blue-500" checked>
                                        <span class="text-sm font-medium text-gray-700">Savings Account</span>
                                    </label>
                                    <label class="flex items-center gap-2 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 w-full transition-colors">
                                        <input type="radio" name="acc_type" class="text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Current Account</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Upload Document -->
                        <div class="mb-8 p-6 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 text-center hover:bg-gray-100 transition-colors">
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mb-1">
                                    <i class="fas fa-cloud-upload-alt text-xl"></i>
                                </div>
                                <h4 class="text-sm font-bold text-gray-800">Upload Cancelled Cheque or Passbook</h4>
                                <p class="text-xs text-gray-500 max-w-sm mx-auto">Upload a clear image or PDF (Max 2MB). This is required to verify the account holder's name.</p>
                                <button type="button" class="mt-2 text-blue-600 text-sm font-medium hover:underline">Choose File to Upload</button>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                            <button type="button" @click="mode = 'view'" class="px-5 py-2.5 rounded-lg text-gray-600 font-medium hover:bg-gray-100 transition-colors">Cancel</button>
                            <button type="submit" class="px-6 py-2.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all flex items-center gap-2">
                                <span>Save & Verify</span>
                                <i class="fas fa-arrow-right text-sm"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Note -->
            <div class="mt-6 flex items-start gap-3 p-4 bg-yellow-50 rounded-lg border border-yellow-100 text-yellow-800 text-sm">
                <i class="fas fa-shield-alt mt-0.5 text-yellow-600"></i>
                <p>
                    <strong>Security Notice:</strong> Changing your bank account details will trigger a temporary payout hold for 24-48 hours until verification is complete.
                </p>
            </div>
        </div>
    </div>

    <script>
        function bankAccountManager() {
            return {
                mode: 'view', // 'view' or 'edit'
                status: 'verified', // 'verified', 'pending', 'rejected'
                isLoading: false,
                form: {
                    ifsc: ''
                },
                bankName: '',
                branchName: '',

                statusTitles: {
                    'verified': 'Your bank account is verified',
                    'pending': 'Verification in progress',
                    'rejected': 'Verification failed'
                },
                statusMessages: {
                    'verified': 'Payouts are active and will be deposited to the account below.',
                    'pending': 'Payouts are on hold until verification is complete. This usually takes 24 hours.',
                    'rejected': 'We could not verify your document. Please ensure the image is clear and the name matches.'
                },

                // Mock OTP initiation
                initiateChange() {
                    const confident = confirm("For security, we will verify this action. Click OK to proceed to Edit Mode.");
                    if(confident) {
                        this.mode = 'edit';
                        this.form.ifsc = '';
                        this.branchName = '';
                        this.bankName = ''; // Reset
                    }
                },

                // Mock IFSC Lookup
                lookupIFSC() {
                    if(this.form.ifsc.length === 11) {
                        // Simulate API call
                        this.bankName = 'State Bank of India';
                        this.branchName = 'MG Road Branch, Bangalore';
                    } else {
                        this.bankName = '';
                        this.branchName = '';
                    }
                },

                // Mock Save
                saveDetails() {
                    this.isLoading = true;
                    // Simulate processing
                    setTimeout(() => {
                        this.isLoading = false;
                        this.status = 'pending'; // Switch to pending after update
                        this.mode = 'view';
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }, 1500);
                }
            }
        }
    </script>
@endsection