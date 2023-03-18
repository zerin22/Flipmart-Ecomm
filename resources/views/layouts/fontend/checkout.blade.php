@extends('layouts.fontend.fontend-master')
@section('title', 'checkout')


@section('content')


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
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <form class="register-form" id="paymentForm">
                                                @csrf
                                                <div class="col-md-6 col-sm-6 already-registered-login">
                                                    <div class="form-group">
                                                        <input type="hidden" id="authID" name="authID" value="{{ Auth::id() }}">
                                                    </div>
                                                        <div class="form-group">
                                                            <label class="info-title" for="name">Name <span>*</span></label>
                                                            <input type="text" value="{{ Auth::user()->name }}" data-validation="required" class="selectClass form-control " id="shipping_name" name="shipping_name" placeholder="Full Name">
                                                        </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="email">Email<span>*</span></label>
                                                        <input value="{{ Auth::user()->email }}" type="text" data-validation="required" name="shipping_email" class="form-control selectClass" id="shipping_email" placeholder="Email">
                                                    </div>
                                                        <div class="form-group">
                                                            <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                                            <input type="text" data-validation="required" name="shipping_phone" class="selectClass form-control" id="shipping_phone" placeholder="Number">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="info-title" for="postCode">Post Code<span>*</span></label>
                                                            <input type="text" data-validation="required" name="postCode" class="form-control selectClass" id="postCode" placeholder="Post Code">
                                                        </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="info-title" style="margin-bottom:13px;" for="division_id">Select Region<span>*</span></label>
                                                        <select name="division_id" id="division_id" class="form-control selectClass" >
                                                            <option value>Choose your Region</option>
                                                            @foreach($divisions as $division)
                                                                <option value="{{ $division->id }}">{{ $division->division_name  }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" style="margin-bottom:13px;" for="district_id">Select Area<span>*</span></label>
                                                        <select name="district_id" id="district_id" class="form-control selectClass">
                                                            <option>Choose Your Area</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" style="margin-bottom:13px;" for="state_id">Select State<span>*</span></label>
                                                        <select name="state_id" id="state_id" class="form-control selectClass">
                                                            <option>Choose Your City </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" style="margin-bottom:13px;" for="address">Address<span>*</span></label>
                                                        <textarea data-validation="required" name="shipping_address" class="form-control" id="shipping_address" cols="30" rows="4" placeholder="For Example: House# 123, Street# 123, ABC Road"></textarea>
                                                    </div>

                                                </div>

                                                <div class="payment_list">
                                                    <div class="col-md-12">
                                                        <div class="payment_item">
                                                            <ul>
                                                                <li>
                                                                    <input id="ssl" type="radio" name="payment_method" value="sshost">
                                                                    <label for="ssl"><img width="200px" src="{{ asset('fontend/assets/images/ssl.png') }}" alt=""></label>
                                                                </li>
                                                                <li>
                                                                    <input id="stripe" type="radio" name="payment_method" value="stripe">
                                                                    <label for="stripe"><img width="150px" src="{{ asset('fontend/assets/images/stripe.jpg') }}" alt=""></label>
                                                                </li>
                                                                <li>
                                                                    <input id="cash" type="radio" name="payment_method" value="cash">
                                                                    <label for="cash" class="labelcash">
                                                                        <img width="100px" src="{{ asset('fontend/assets/images/caseOnDelivery.png') }}" alt="">
                                                                        <div class="p-para">
                                                                            <p>  Cash On Delivery</p>
                                                                        </div>
                                                                    </label>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="paymentBtnNext">Proceed to pay</button>
                                                </div>
                                            </form>
                                          <div class="paymentParents">
                                              <div class="PaymentPageLoader text-center" style="position:absolute; top:320px; left:800px">
                                                  <img  width="160px" height="160px" src="{{ asset('fontend/assets/images/loader.gif') }}" alt="">
                                              </div>
                                          </div>

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                        </div><!-- /.checkout-steps -->
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


@endsection()





