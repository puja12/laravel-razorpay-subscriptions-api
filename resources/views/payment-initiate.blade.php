@extends('layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Laravel Razorpay Subscriptions</h1>
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Payment Form</h2>
        <form action="{{ route('payment-initiate-request') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>
            
            <div>
                <label for="contactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="contactNumber" name="contactNumber" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>
            
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>
            
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="text" id="amount" name="amount" class="w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="subscribe" name="subscribe" value="yes" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="subscribe" class="ml-2 text-sm text-gray-700">Subscribe for Auto-Renewal</label>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Submit</button>
        </form>
    </div>
@endsection