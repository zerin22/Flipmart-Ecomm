@extends('layouts.fontend.fontend-master')
@section('title', 'SSLHost Payment')
@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>SSLHOST</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{  Cart::count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (BDT)</span>
                            <strong>{{ $totalAmount }} TK</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <form method="POST" class="needs-validation" novalidate>

                        <input type="hidden" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                       value="{{ $shipping->shipping_name }}" required>

                        <input type="hidden" name="customer_mobile" class="form-control" id="mobile" value="{{ $shipping->shipping_phone }}" placeholder="Mobile" required>

                        <input type="hidden" name="customer_email" class="form-control" id="email"
                                   placeholder="you@example.com" value="{{ $shipping->shipping_email }}" required>
                        <input type="hidden" class="form-control" id="address" placeholder="1234 Main St"
                                   value="{{ $shipping->shipping_address }}" required>

                        <input type="hidden" value="{{ $totalAmount }}" name="amount" id="total_amount" required/>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $shipping->authID }}">
                        <input type="hidden" name="division_id" id="division_id" value="{{ $shipping->division_id }}">
                        <input type="hidden" name="district_id" id="district_id"  value="{{ $shipping->district_id }}">
                        <input type="hidden" name="state_id" id="state_id"  value="{{ $shipping->state_id }}">
                        <input type="hidden" name="postCode" id="postCode"  value="{{ $shipping->postCode }}">

                        <button style="margin-top: 46px;margin-left: 100px;" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                        </button>
                    </form>
                </div>
            </div>

            <!-- =================== BRANDS CAROUSEL =================================== -->
        @include('layouts.fontend.brandlogo')
        <!-- =============== BRANDS CAROUSEL : END ==================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
    {{-- easy payment system --}}
@endsection()
@section('scripts')
    <script type="text/javascript">
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();
        obj.user_id = $('#user_id').val();
        obj.division_id = $('#division_id').val();
        obj.district_id = $('#district_id').val();
        obj.state_id = $('#state_id').val();
        obj.postCode = $('#postCode').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>


    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>

@endsection()

