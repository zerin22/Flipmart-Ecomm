@extends('layouts.admin.admin-master')
@section('title', 'Single Product')
@section('product') menu-is-opening menu-open @endsection
@section('allproductActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                                    <li class="breadcrumb-item active">View Product</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">{{ $viewProducts->product_name_en }}</h3>
                            </div>
                            <div class="card-body p-5">
                                <table class="table table-bordered p-3">
                                    <tr>
                                        <th>Product Name English</th>
                                        <td>{{ $viewProducts->product_name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name Bangle</th>
                                        <td>{{ $viewProducts->product_name_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Title English</th>
                                        <td>{{ $viewProducts->product_title_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Title Bangle</th>
                                        <td>{{ $viewProducts->product_title_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Description English</th>
                                        <td>{!! $viewProducts->product_desc_en !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Description Bangle</th>
                                        <td>{!! $viewProducts->product_desc_bn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Size English</th>
                                        <td>{{ $viewProducts->product_size_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Size Bangle</th>
                                        <td>{{ $viewProducts->product_size_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Tags English</th>
                                        <td>{{ $viewProducts->product_tags_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Tags Bangle</th>
                                        <td>{{ $viewProducts->product_tags_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Color English</th>
                                        <td>{{ $viewProducts->product_color_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Color Bangle</th>
                                        <td>{{ $viewProducts->product_color_bn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Code</th>
                                        <td>{{ $viewProducts->product_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Quantity</th>
                                        <td>{{ $viewProducts->product_qty }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Selling Price</th>
                                        <td>{{ $viewProducts->selling_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Discount Price</th>
                                        <td>{{ $viewProducts->discount_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Hot Deals</th>
                                        <td>
                                            @if($viewProducts->hot_deals == 1)
                                                <span style="color:green;">Yes</span>
                                            @else
                                                <span style="color:red">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Featured</th>
                                        <td>
                                            @if($viewProducts->featured == 1)
                                                <span style="color:green;">Yes</span>
                                            @else
                                                <span style="color:red">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Spacial Offer</th>
                                        <td>
                                            @if($viewProducts->spacial_offer == 1)
                                                <span style="color:green;">Yes</span>
                                            @else
                                                <span style="color:red">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Spacial Deals</th>
                                        <td>
                                            @if($viewProducts->spacial_deals == 1)
                                                <span style="color:green;">Yes</span>
                                            @else
                                                <span style="color:red">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Thumbnail</th>
                                        <td>
                                            <img width="400px" height="400px" src="{{ asset($viewProducts->product_thumbnail) }}" alt="image">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


