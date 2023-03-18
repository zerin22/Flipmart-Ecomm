@extends('layouts.fontend.fontend-master')

@section('content')

    <div class="body-content" style="margin:100px">
        <div class="container-fluid">
            <div class="sign-in-page register-page">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="bg-success" style="padding:20px; font-weight:700">Shipping Details</h3>
                        <div class="shipping_tables" style="background-color:#ddd; margin-top: 30px; padding: 35px 0px 20px 25px">
                            <table class="table table-bordered" style="font-size: 16px">
                                <tr>
                                    <th>Shipping Name: </th>
                                    <td>{{ $orders->name}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Phone: </th>
                                    <td>{{ $orders->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Email: </th>
                                    <td>{{ $orders->email }}</td>
                                </tr>
                                <tr>
                                    <th>Division: </th>
                                    <td>{{ $orders->division->division_name }}</td>
                                </tr>
                                <tr>
                                    <th>District: </th>
                                    <td>{{ $orders->district->district_name}}</td>
                                </tr>
                                <tr>
                                    <th>State: </th>
                                    <td>{{ $orders->state->state_name}}</td>
                                </tr>
                                <tr>
                                    <th>Post Code: </th>
                                    <td>{{ $orders->postCode }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date: </th>
                                    <td>{{ $orders->order_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="bg-success" style="padding:20px; font-weight:700">Order Details</h3>
                        <div class="shipping_tables" style="background-color:#ddd; margin-top: 30px; padding: 35px 0px 20px 25px">
                            <table class="table table-bordered" style="font-size: 16px">
                                <tr>
                                    <th>Name: </th>
                                    <td>{{ ucwords($orders->User->name )  }}</td>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <td>{{ ucwords($orders->User->phone )  }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Type: </th>
                                    <td>{{ $orders->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Tranx Id: </th>
                                    <td>{{ $orders->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice: </th>
                                    <td>{{ $orders->invoice_no }}</td>
                                </tr>
                                <tr>
                                    <th>Total: </th>
                                    <td>{{ $orders->amount }}TK</td>
                                </tr>
                                <tr>
                                    <th>Order: </th>
                                    <td>
                                        @if($orders->status == "Processing")
                                            <span class="badge badge-danger" style="background-color:red">
                                            {{ $orders->status}}
                                        </span>
                                        @else
                                            <span class="badge badge-danger" style="background-color:green">
                                            {{ $orders->status}}
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="bg-success" style="padding:20px; font-weight:700">Product Details</h3>
                        <div class="product_table" style="background-color:#ddd; margin-top: 30px; padding: 35px 0px 20px 25px">
                        <table class="table table-bordered" style="margin-top: 50px">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">Image</th>
                                <th  class="text-center"  scope="col">Product Name</th>
                                <th  class="text-center"  scope="col">Product Code</th>
                                <th  class="text-center" scope="col">Color</th>
                                <th  class="text-center"  scope="col">Size</th>
                                <th  class="text-center"  scope="col">Quantity</th>
                                <th  class="text-center"  scope="col">Single Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderItems as $orderItem)
                            <tr class="text-center">
                                <td><img width="100px" height="100px" src="{{ asset($orderItem->product->product_thumbnail) }}" alt=""></td>
                                <td>{{ $orderItem->product->product_name_en }}</td>
                                <td>{{ $orderItem->product->product_code }}</td>
                                <td>
                                    @if($orderItem->color == NULL)
                                        <span style="color:red; font-weight: 700;" >NO COLOR FOUND</span>
                                    @else
                                        {{ ucwords( $orderItem->color)  }}
                                    @endif
                                </td>
                                <td>
                                    @if($orderItem->size == NULL)
                                        <span style="color:red; font-weight: 700;" >NO SIZE FOUND</span>
                                    @else
                                        {{ ucwords( $orderItem->size)  }}
                                    @endif
                                </td>
                                <td> {{ $orderItem->qty }}</td>
                                <td> {{ $orderItem->price }}TK</td>
                                @if($orders->status == "Delivered")
                                    <td><a href="{{ route('review.create', $orderItem->product_id) }}">Write a review</a></td>
                                @endif
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @if($orders->status == "Delivered")
                        <div class="col-md-12">
                            <div class="return_orders">
                                <form action="{{ route("order.return", $orders->id ) }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <label style="margin-bottom:10px; margin-top: 60px;">Do you want to return this order?</label>
                                        <textarea  class="form-control @error('return_reason') is-invalid @enderror" name="return_reason" id="" cols="198" rows="10" placeholder="Message"></textarea>
                                    </div>
                                   <div>
                                       @error('return_reason')
                                       <span style="color:red; font-weight:700; font-size:18px"> {{ $message }}</span>
                                       @enderror
                                   </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>


@endsection


