@extends('layouts.admin.admin-master')
@section('title', 'DiscountBannerTwo')
@section('banner')menu-is-opening menu-open @endsection
@section('allBannerTwoActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Discount Banner Two</li>
                                </ul>
                            </div><!-- /.col -->
                            <div class="item_2">
                                @if (count($banners) <= 1)
                                <a class="btn btn-primary" href="{{ route('bannerTwo.create') }}">Add New Banner</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Banner Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img width="200px" height="150px" src="{{ asset($banner->image)  }}" alt=""></td>
                                    <td>
                                        <span class="d-flex justify-content-center">
                                            <a href=" {{ route('bannerTwo.edit', $banner->id) }} " class="btn btn-info">Edit</a>
                                            {{-- <form action="{{ route('bannerTwo.destroy', $banner->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}
                                        </span>
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

