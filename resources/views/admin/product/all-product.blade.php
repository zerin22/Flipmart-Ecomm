@extends('layouts.admin.admin-master')
@section('title', 'Products')
@section('product') menu-is-opening menu-open @endsection
@section('allproductActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- <div class="row mb-2">
                    <div class="col-sm-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row --> --}}
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Product</li>
                                </ul>
                            </div>
                            <div class="item_2">
                                <a class="btn btn-primary" href="{{ route('products.create') }}">Add New Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name English</th>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th>Selling Price</th>
                                <th>Product Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($items as $item)

                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <th><img width="100px" height="100px" src="{{ asset($item->product_thumbnail) }}" alt=""></th>
                                    <td>{{ Str::limit($item->product_name_en, 20) }}</td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        @if($item->discount_price == NULL)
                                             <span class="badge badge-fill badge-danger">No Discount</span>
                                        @else
                                            @php
                                                $amount = $item->selling_price - $item->discount_price;
                                                $discountAmount = ($amount / $item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-fill badge-danger">{{ round($discountAmount) }}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $item->status == 1)
                                            <a href="{{ route('products.inactive', ['id' => $item->id]) }}"  class="btn btn-warning">Inactive</a>
                                        @else
                                            <a href="{{ route('products.active', ['id' => $item->id]) }}" class="btn btn-success">Active</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $item->id) }}" class="btn btn-warning">View</a>
                                        <a href="{{ route('subcategoryEdit', ['id' => $item->id]) }}" class="btn btn-info mx-2">Edit</a>
                                        <button data-id="{{ $item->id }}" class="btn btn-danger productDeleteButton">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()

@section('scripts')
    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection()


