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
            </div>
        </div>

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
                            @foreach($items as $item)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
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
                                            <span class="badge badge-fill badge-success">{{ round($discountAmount) }}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $item->status == 1)
                                            <span class="badge badge-fill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-fill badge-danger">Inactive</span>
                                        @endif
                                        {{-- @if( $item->status == 1)
                                            <a href="{{ route('products.inactive', ['id' => $item->id]) }}"  class="btn btn-warning">Inactive</a>
                                        @else
                                            <a href="{{ route('products.active', ['id' => $item->id]) }}" class="btn btn-success">Active</a>
                                        @endif --}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                             Action
                                            </button>
                                            <div class="dropdown-menu">
                                            @if( $item->status == 1 )
                                                <a href="{{ route('products.inactive', ['id' => $item->id]) }}" class="dropdown-item">Inactive</a>
                                            @else
                                                <a href="{{ route('products.active', ['id' => $item->id]) }}"  class="dropdown-item">Active</a>
                                            @endif
                                              <a class="dropdown-item" href="{{ route('products.show', $item->id) }}">View</a>
                                              <a class="dropdown-item" href="{{ route('product.edit', ['id' => $item->id]) }}">Edit</a>
                                              <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $item->id }}" >Delete</a>

                                            </div>
                                        </div>
                                        {{-- <button data-id="{{ $item->id }}" class="btn btn-danger productDeleteButton">Delete</button> --}}
                                        {{-- <a href="{{ route('products.show', $item->id) }}" class="btn btn-warning">View</a>
                                        <a href="{{ route('product.edit', ['id' => $item->id]) }}" class="btn btn-info mx-2">Edit</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</button> --}}

                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure, you want to delete data?</p>
                                                        {{-- <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong> --}}
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('softDelete.delete', $item->id) }}" class="btn btn-danger">Delete</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection


