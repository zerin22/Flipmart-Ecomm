@extends('layouts.admin.admin-master')
@section('title', 'Processing Order View')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid" style="padding: 0px 100px">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('order.pending') }}">Pending Order</a></li>
                                    <li class="breadcrumb-item active">Processing Order View</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid" style="padding: 0px 100px">
                <div class="row">
                    <div class="col-md-6">
                         <div class="shipping_details">
                             <ul class="list-group">
                                 <h4 class="list-group-item bg-warning text-center font-weight-bold" aria-current="true">
                                     Shipping Information
                                 </h4>
                                 <li class="list-group-item">
                                     <strong>User:</strong> {{ $orders->name  }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>Email:</strong> {{ $orders->email }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>Phone:</strong> {{ $orders->phone }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>Division:</strong> {{ $orders->division->division_name }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>District:</strong> {{ $orders->district->district_name }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>State:</strong> {{ $orders->state->state_name }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>Post Code:</strong> {{ $orders->postCode }}
                                 </li>
                                 <li class="list-group-item">
                                     <strong>Order Date:</strong> {{ $orders->order_date }}
                                 </li>

                             </ul>
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_details">
                            <ul class="list-group">
                                <h4 class="list-group-item bg-warning text-center font-weight-bold" aria-current="true">
                                    Order Information
                                </h4>
                                <li class="list-group-item">
                                    <strong>Name:</strong> {{ ucwords($orders->user->name) }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Email:</strong> {{ $orders->user->email }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Phone:</strong> {{ $orders->user->phone }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Payment Type:</strong> {{ $orders->payment_method }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Tnx Id:</strong> {{ $orders->transaction_id }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Invoice:</strong> {{ $orders->invoice_no }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Total:</strong> {{ $orders->amount }} TK
                                </li>
                                <li class="list-group-item">
                                    <strong>Order Status:</strong>
                                    <span class="badge badge-success">{{ $orders->status }}</span>
                                </li>

                                    @if($orders->status == "Pending")
                                    <li class="list-group-item">
                                        <a href=" {{ url("admin/pending-to-confirm/".$orders->id) }}" class="btn btn-primary d-block" id="confirm">Confirm Order</a>  <a href=" {{ url("admin/pending-to-cancel/".$orders->id) }}" class="btn btn-danger d-block" id="cancel" style="margin-top:10px">Cancel Order</a>
                                        @elseif($orders->status == "Confirm")
                                    <li class="list-group-item">
                                        <a href=" {{ url("admin/confirm-to-processing/".$orders->id) }}" class="btn btn-primary d-block" id="confirm">Processing Order</a> </li>
                                    @elseif($orders->status == "Processing")
                                    <li class="list-group-item">
                                        <a href=" {{ url("admin/processing-to-picked/".$orders->id) }}" class="btn btn-primary d-block" id="confirm">Picked Order</a> </li>
                                    @elseif($orders->status == "Picked")
                                    <li class="list-group-item">
                                        <a href=" {{ url("admin/picked-to-shipped/".$orders->id) }}" class="btn btn-primary d-block" id="confirm"> Shipped Order</a>  </li>
                                        @elseif($orders->status == "Shipped")
                                    <li class="list-group-item">
                                        <a href=" {{ url("admin/shipped-to-deliver/".$orders->id) }}" class="btn btn-primary d-block" id="confirm"> Delivery Order</a> </li>
                                    @endif


                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 pb-5">
                        <span class="bg-warning text-center font-weight-bold" aria-current="true" style="margin-top: 60px; font-size:25px; display:block; padding:14px 0px">
                            Product Information
                        </span>
                        <div class="product_table" style="background-color:#ddd; padding: 35px 0px 20px 25px">
                            <table class="table table-bordered" >
                                <thead>
                                <tr>
                                    <th class="text-center" scope="col">Image</th>
                                    <th class="text-center" scope="col">Product Name</th>
                                    <th class="text-center" scope="col">Product Code</th>
                                    <th class="text-center" scope="col">Color</th>
                                    <th class="text-center" scope="col">Size</th>
                                    <th class="text-center" scope="col">Quantity</th>
                                    <th class="text-center" scope="col">Single Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td><img width="100px" height="100px" src="{{ asset($orderItems->product->product_thumbnail) }}" alt=""></td>
                                        <td>{{ $orderItems->product->product_name_en }}</td>
                                        <td>{{ $orderItems->product->product_code }}</td>
                                        <td>
                                            @if($orderItems->color == NULL)
                                                <span style="color:red; font-weight: 700;" >NO COLOR FOUND</span>
                                            @else
                                                {{ ucwords( $orderItems->color)  }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($orderItems->size == NULL)
                                                <span style="color:red; font-weight: 700;" >NO SIZE FOUND</span>
                                            @else
                                                {{ ucwords( $orderItems->size)  }}
                                            @endif
                                        </td>
                                        <td> {{ $orderItems->qty }}</td>
                                        <td> {{ $orderItems->price }}TK</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()



