<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function Initiate(Request $request)
    {
        logger($request);
         // Create an object of razorpay
         $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        if ($request->has('subscribe') && $request->subscribe == 'yes') {
            // Subscription plan details
            $planId = env('RAZORPAY_SUBSCRIPTION_PLAN_ID'); // Pre-created plan in Razorpay Dashboard

            // Creating a subscription
            $subscription = $api->subscription->create([
                'plan_id' => $planId,
                'customer_notify' => 1,
                'quantity' => 1,
                'total_count' => 12, // Example: Monthly subscription for a year
                'notes' => [
                    'email' => $request->email,
                    'name' => $request->name,
                ]
            ]);

            $response = [
                'subscriptionId' => $subscription['id'],
                'razorpayId' => env('RAZORPAY_KEY'),
                'name' => $request->name,
                'email' => $request->email,
                'contactNumber' => $request->contactNumber,
                'address' => $request->address,
                'description' => 'Subscription for Renewal',
            ];
            
            return view('subscription-payment-page', compact('response'));
        }else {
            // One-time payment
            
            $receiptId = Str::random(20);
           
            // In razorpay you have to convert rupees into paise so we multiply by 100 and Currency will be INR
            // Creating order
            $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['amount'] * 100,
            'currency' => 'INR'
            )
            );

            // Return response on payment page
            $response = [
                'orderId' => $order['id'],
                'razorpayId' => env('RAZORPAY_KEY'),
                'amount' => $request->all()['amount'] * 100,
                'name' => $request->all()['name'],
                'currency' => 'INR',
                'email' => $request->all()['email'],
                'contactNumber' => $request->all()['contactNumber'],
                'address' => $request->all()['address'],
                'description' => 'Testing description',
            ];
            return view('payment-page',compact('response'));
        }
    }


    public function Complete(Request $request)
    {
        // Verify the signature is correct 
        $signatureStatus = $this->SignatureVerify(
                                    $request->all()['rzp_signature'],
                                    $request->all()['rzp_paymentid'],
                                    $request->all()['rzp_orderid']
                                );
        if($signatureStatus == true){
            return view('payment-success-page');
        }else{
            return view('payment-failed-page');
        }
    }

    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
        try
        {
            // Create an object of razorpay class
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $attributes = array('razorpay_signature' => $_signature, 'razorpay_payment_id' => $_paymentId , 'razorpay_order_id' => $_orderId);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
        }
    }

    public function SubscriptionComplete(Request $request)
    {
        $signatureStatus = $this->SignatureVerify(
            $request->input('rzp_signature'),
            $request->input('rzp_paymentid'),
            $request->input('rzp_subscriptionid')
        );

        if ($signatureStatus) {
            echo "Subscription Successful";
        } else {
            echo "Subscription Faailed";
        }
    }
}
