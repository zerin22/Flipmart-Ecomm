@extends('layouts.fontend.fontend-master')
@section('title', 'payment')

@section('content')

    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;}
        .stripePaymetBody {
            padding:70px !important;
        }
    </style>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body stripePaymetBody">
                                        <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
                                            @csrf
                                            <div class="form-row">
                                                <input type="hidden" name="user_id" value="{{ $shipping->authID }}">
                                                <input type="hidden" name="division_id" value="{{ $shipping->division_id }}">
                                                <input type="hidden" name="district_id" value="{{ $shipping->district_id }}">
                                                <input type="hidden" name="state_id" value="{{ $shipping->state_id }}">
                                                <input type="hidden" name="name" value="{{ $shipping->shipping_name }}">
                                                <input type="hidden" name="email" value="{{ $shipping->shipping_email }}">
                                                <input type="hidden" name="phone" value="{{ $shipping->shipping_phone }}">
                                                <input type="hidden" name="postCode" value="{{ $shipping->postCode }}">
                                                <input type="hidden" name="address" value="{{ $shipping->shipping_address }}">
                                                <label for="card-element">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary">Submit Payment</button>
                                        </form>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            @foreach($carts as $item)
                                                <li>
                                                    <string>Image</string>
                                                    <img style="margin-top:10px" width="80px" height="80px" src="{{ asset($item->options->image) }}" alt="">
                                                    <strong>Qty: {{ $item->qty }}</strong>
                                                </li>
                                            @endforeach
                                            <hr>
                                            <h4 style="font-family: roboto"><span style="font-weight: 700">SubTotal: </span>${{ $cartTotal }}</h4>

                                            @if(Session::has('coupon'))
                                                <h4 style="font-family: roboto; margin:15px 0px"><span style="font-weight: 700">Discount: </span> {{ session()->get('coupon')['coupon_discount'] }}% </h4>
                                                <h4 style="font-family: roboto"><span style="color:#59b210; font-weight: 700">Grand Total:</span>
                                                    ${{ session()->get('coupon')['total_amount'] }}

                                                    @else
                                                    @endif
                                                </h4>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div> 					<!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- =================== BRANDS CAROUSEL =================================== -->
        @include('layouts.fontend.brandlogo')
        <!-- =============== BRANDS CAROUSEL : END ==================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51JRdqsL1ewd4d4iDN9GiUToTGwMNrYwyZNWDYpUO7AvnUqAOUUvlutslgVXj5f5f4cnguN1nrdmtBKhMQNW5UoA7005Pmxn0Qy');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>

@endsection()





