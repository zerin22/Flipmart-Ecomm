@extends('layouts.admin.admin-master')
@section('title', 'Product Restore')
@section('storeroom') menu-is-opening menu-open @endsection
@section('productstoreActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Product Restore</li>
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
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name English</th>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th>Selling Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($productCount <= 0)
                                <p style="color:red; font-weight:700; font-size:20px">No Data Found</p>
                            @else
                                @foreach($productTrash as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th><img width="100px" height="100px" src="{{ asset($item->product_thumbnail) }}" alt=""></th>
                                        <td>{{ $item->product_name_en }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to restore this item?');" href="{{ route('product.restore', [ 'id' => $item->id])}}" class="btn btn-info">Re-store</a>
                                            <a href="{{ route('product.permanentDelete', [ 'id' => $item->id])}}" onclick="return confirm('Are you sure Permanent delete this item?')"  class="btn btn-danger">Permanent-Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection




