@extends('layouts.admin.admin-master')
@section('title', 'BrandStore')
@section('storeroom') menu-is-opening menu-open @endsection
@section('brandstoreActive') active @endsection
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
                                    <li class="breadcrumb-item active">BrandStore</li>
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

                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name Bn</th>
                                <th>Brand Name En</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($brandTrashs as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->brand_name_bn }}</td>
                                    <td>{{ $item->brand_name_en }}</td>
                                    <td><img src="{{ asset($item->brand_image) }}" alt=""></td>
                                    <td>
                                        @if($item->created_at == NULL)
                                            <p style="color:red; font-weight:700">No Time Set</p>
                                        @else
                                            <p style="color:green; font-weight:700">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('brand.restore', [ 'id' =>$item->id])}}" class="btn btn-info">Re-store</a>
                                        <a href="{{ url('admin/brand/permanentDelete/'.$item->id) }}" onclick="return confirm('Are you sure Permanent delete this item?')"  class="btn btn-danger">Permanent-Delete</a> --}}

                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                            </button>
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModalRestore__{{ $item->id }}">Re-store</a>
                                            <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</a>
                                            </div>
                                        </div>
                                        <!-- Modal For Restore -->
                                        <div class="modal fade" id="exampleModalRestore__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"></path><circle cx="12" cy="16" r="1" fill="#f7b731"></circle><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"></path></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: #f7d307">Re-Store</h4>
                                                        <p class="card-text">Are you sure, you want to restore data?</p>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('brand.restore', [ 'id' => $item->id])}}" class="btn btn-warning">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure you want to delete data?</p>
                                                        <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('brand.permanentDelete', [ 'id' => $item->id])}}" class="btn btn-danger">Delete</a>
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
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



@section('scripts')
    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection





