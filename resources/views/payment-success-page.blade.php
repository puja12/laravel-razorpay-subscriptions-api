@extends('layouts.app')

@section('title', 'Payment-Success')
@section('content')
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg text-center">
        <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful!</h1>
        <p class="text-gray-600 mb-4">Thank you for your payment. Your transaction was completed successfully.</p>
        <a href="/" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Go to Home</a>
    </div>
@endsection
