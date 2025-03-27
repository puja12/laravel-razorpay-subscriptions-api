<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorPayController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('payment-initiate');
});

Route::get('/create-subscription-plan', [RazorPayController::class,'create_subscription_plan']);
Route::get('/create-subscription', [RazorPayController::class,'create_subscription']);

Route::get('/payment-initiate',function(){
    return view('payment-initiate');
});

// for Initiate the order
Route::post('payment-initiate-request', [PaymentController::class, 'Initiate'])->name('payment-initiate-request');

// for Payment complete
Route::post('payment-complete',[PaymentController::class,'Complete']);


Route::get('/success', function () {
    //return view('welcome');
    return view('payment-success-page');
});
