<!-- Auto-clicks the Pay button on page load -->
<button id="rzp-button1" hidden>Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{$response['razorpayId']}}", // Razorpay Key ID
        "subscription_id": "{{$response['subscriptionId']}}", // Subscription ID from Razorpay
        "currency": "{{$response['currency']}}",
        "name": "{{$response['name']}}",
        "description": "{{$response['description']}}",
        "image": "https://fifaindia.org/images/logo3.png",
        "handler": function (response){
            // After successful payment
            document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
            document.getElementById('rzp_subscriptionid').value = response.razorpay_subscription_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;
            document.getElementById('rzp-paymentresponse').click();
        },
        "prefill": {
            "name": "{{$response['name']}}",
            "email": "{{$response['email']}}",
            "contact": "{{$response['contactNumber']}}"
        },
        "notes": {
            "address": "{{$response['address']}}"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);

    window.onload = function(){
        document.getElementById('rzp-button1').click();
    };

    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
</script>

<!-- Hidden form to send payment response -->
<form action="{{url('/subscription-payment-complete')}}" method="POST" hidden>
    <input type="hidden" value="{{csrf_token()}}" name="_token" />
    <input type="text" class="form-control" id="rzp_paymentid" name="rzp_paymentid">
    <input type="text" class="form-control" id="rzp_subscriptionid" name="rzp_subscriptionid">
    <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form>
