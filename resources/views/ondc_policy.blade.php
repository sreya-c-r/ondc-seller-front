@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">ONDC Network Policy</h1>
                <p class="mt-4 text-lg text-gray-500">
                    Understanding the guidelines and principles of the Open Network for Digital Commerce.
                </p>
            </div>

            <div class="prose prose-blue prose-lg text-gray-500 mx-auto">
                <h3>1. Introduction to ONDC</h3>
                <p>
                    Open Network for Digital Commerce (ONDC) is an initiative aiming to promote open networks for all
                    aspects of exchange of goods and services over digital or electronic networks. ONDC is to be based on
                    open-sourced methodology, using open specifications and open network protocols independent of any
                    specific platform.
                </p>

                <h3>2. Seller Responsibilities</h3>
                <ul>
                    <li><strong>Product Authenticity:</strong> Sellers must ensure that all products listed are authentic
                        and do not violate intellectual property rights.</li>
                    <li><strong>Fair Pricing:</strong> Pricing should be competitive and transparent, without hidden
                        charges.</li>
                    <li><strong>Order Fulfillment:</strong> Sellers are expected to adhere to strict timelines for packing
                        and dispatching orders to ensure customer satisfaction.</li>
                </ul>

                <h3>3. Returns and Refunds</h3>
                <p>
                    The network mandates a standardized return policy framework, but sellers have the flexibility to define
                    specific return windows for their categories, provided they meet the minimum network standards. Refunds
                    must be processed within the stipulated timeline upon receipt of returned goods.
                </p>

                <h3>4. Data Privacy and Security</h3>
                <p>
                    All participants on the network must adhere to the data privacy laws of India. Customer data shared for
                    the purpose of order fulfillment must be strictly used for that purpose alone and cannot be used for
                    unauthorized marketing or shared with third parties.
                </p>

                <h3>5. Dispute Resolution</h3>
                <p>
                    ONDC provides an Online Dispute Resolution (ODR) framework. Sellers agree to participate in good faith
                    in any dispute resolution processes initiated by buyers or network participants.
                </p>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 my-6">
                    <p class="font-medium text-blue-900">Note:</p>
                    <p class="text-sm text-blue-800">
                        This policy document is a summary for SellerHub users. For the full, official ONDC protocol
                        specifications, please visit the official ONDC website.
                    </p>
                </div>

                <p>
                    By registering on SellerHub and listing your products, you agree to abide by these network policies as
                    they evolve.
                </p>
            </div>

            <div class="mt-10 flex justify-center">
                <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-500 font-medium">
                    &larr; Back to Home
                </a>
            </div>

        </div>
    </div>
@endsection