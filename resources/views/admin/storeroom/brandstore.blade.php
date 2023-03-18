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

                        <table class="table table-bordered text-center">
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
                            @if ($barndCount <= 0)
                                <p style="color:red; font-weight:700; font-size:20px">No Data Found</p>
                            @else
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
                                        <a href="{{ route('brand.restore', [ 'id' =>$item->id])}}" class="btn btn-info">Re-store</a>
                                         <a href="{{ url('admin/brand/permanentDelete/'.$item->id) }}" onclick="return confirm('Are you sure Permanent delete this item?')"  class="btn btn-danger">Permanent-Delete</a>
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


@section('scripts')

    <script type="text/javascript">

        // $("#permanentDeleteBtn").on("click", function (){
        //
        //     let id = $(this).attr("data-id");
        //
        //     swal({
        //         title: "Are you sure? Permanent Delete this item.",
        //         text: "Once deleted, you will not be able to recover this imaginary file!",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //             swal("Poof! Your imaginary file has been deleted!", {
        //                 icon: "success",
        //             });
        //             window.location.href =  ;
        //         } else {
        //             swal("Your imaginary file is safe!");
        //         }
        //     });
        //
        // })

    </script>

@endsection




