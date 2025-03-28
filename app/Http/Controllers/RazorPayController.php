<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

use Illuminate\Support\Str;

use Session;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RazorPayController extends Controller
{
   public function create_subscription_plan(){
        $key_id=env('RAZORPAY_KEY');
        $secret= env('RAZORPAY_SECRET');
        echo $key_id;
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $plan = $api->plan->create([
            'period' => 'weekly',
            'interval' => 1,
            'item' => [
                'name' => 'Test Weekly plan 2',
                'description' => 'Description for the weekly 1 plan',
                'amount' => 5000, // Make sure this is in paise (600 paise = ₹6)
                'currency' => 'INR',
            ],
            'notes' => [
                'key1' => 'value3',
                'key2' => 'value2'
            ]
        ]);
        dd($plan->id);

    }

    public function create_subscription(){
        $planId = env('RAZORPAY_SUBSCRIPTION_PLAN_ID');
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $subscription = $api->subscription->create([
            'plan_id' => $planId,
            'customer_notify' => 1,
            'quantity' => 1,
            'total_count' => 12, // Example: Monthly subscription for a year
            'notes' => [
                'email' => 'prabhupuja12@gmail.com',
                'name' => 'Puja',
            ]
        ]);

        dd($subscription);
    }
}
