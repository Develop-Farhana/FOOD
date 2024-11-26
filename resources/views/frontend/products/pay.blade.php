@extends('frontend.main')
@section('title', 'home')

@section('style')
@endsection

@section('content')

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('../frontend/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Pay With Paypal
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5 d-flex justify-content-center">
    <div class="card bg-light shadow-sm" style="width: 100%; max-width: 500px;">
        <div class="card-body text-center">
            <!-- Replace "test" with your own sandbox Business account app client ID -->

            <!-- Set up a container element for the button -->
            <h3 class="card-title mb-4">Complete Your Payment</h3>
            <div id="paypal-button-container"></div>

        </div>
    </div>
</div>




  @endsection
@section('script')
<script src="https://www.paypal.com/sdk/js?client-id=ATR1vpxSnKwuzcrP3gPpIiSevinX1gNC3iFl2rOjJSr6fPIgbbEHxKUCwFc5SxP1FT5N0q4PcNyP1sJ3&currency=USD"></script>
<script>
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '{{Session::get('price')}}' // Can also reference a variable or function
                                }
                            }]
                        });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            window.location.href = 'http://127.0.0.1:8000/products/success';
                        });
                    }
                }).render('#paypal-button-container');
            </script>
@endsection
