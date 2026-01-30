<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Details - Seller Hub</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f8fafc;
        }
        /* Make inputs feel interactive */
        input:focus, select:focus {
            transition: all 0.2s;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        /* Force uppercase for PAN/GSTIN visually */
        .uppercase-input { text-transform: uppercase; }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { primary: '#3b82f6' } }
            }
        }
    </script>
</head>
<body class="text-gray-700">

    <nav class="bg-white shadow-sm fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <i class="fa-solid fa-shop text-blue-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800 tracking-tight">Seller<span class="text-blue-500">Hub</span></span>
                </div>
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500">
                    <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs">Step 2 of 3</span>
                    <span>Business Details</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-24 pb-20 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
        
        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-8">
            <div class="bg-blue-600 h-1.5 rounded-full" style="width: 33%"></div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
            
            <div class="mb-8 border-b border-gray-100 pb-4">
                <h1 class="text-2xl font-bold text-gray-900">Tell us about your Business</h1>
                <p class="mt-1 text-sm text-gray-600">
                    We need your legal details to generate invoices and set up your store.
                </p>
            </div>

            <form action="#" method="POST">
                
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-id-badge"></i> Identity & Tax
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Legal Business Name <span class="text-red-500">*</span></label>
                        <input type="text" name="legal_name" required 
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="As per GST/PAN (e.g. Sreya Trading Pvt Ltd)">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Store Display Name <span class="text-red-500">*</span></label>
                        <input type="text" name="display_name" required 
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="Name customers will see (e.g. Sreya's Electronics)">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">PAN Number <span class="text-red-500">*</span></label>
                        <input type="text" name="pan" required maxlength="10" 
                            class="uppercase-input w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="ABCDE1234F">
                        <p class="text-xs text-gray-400 mt-1">Required for tax identity.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">GSTIN <span class="text-gray-400 font-normal">(Optional)</span></label>
                        <input type="text" name="gstin" maxlength="15" 
                            class="uppercase-input w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="22AAAAA0000A1Z5">
                        <p class="text-xs text-green-600 mt-1"><i class="fa-solid fa-check-circle"></i> Needed to claim Input Tax Credit.</p>
                    </div>
                </div>

                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot"></i> Registered Address
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Building & Street <span class="text-red-500">*</span></label>
                        <input type="text" name="address_line_1" required 
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="Flat/House No, Building Name, Street">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Area / Landmark</label>
                        <input type="text" name="address_line_2" 
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="Near Central Park, Main Road">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" required 
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="e.g. Kochi">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">State <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="state" required class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none bg-white appearance-none">
                                <option value="" disabled selected>Select State</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Delhi">Delhi</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">PIN Code <span class="text-red-500">*</span></label>
                        <input type="text" name="pincode" required pattern="[0-9]{6}" maxlength="6"
                            class="w-full rounded-lg border-gray-300 border px-3 py-2.5 text-sm focus:outline-none placeholder-gray-400" 
                            placeholder="682001">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <input type="text" value="India" readonly 
                            class="w-full rounded-lg border-gray-300 bg-gray-50 border px-3 py-2.5 text-sm text-gray-500 cursor-not-allowed">
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-gray-100">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        Continue to Plans <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>