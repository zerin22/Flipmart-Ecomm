@extends('layouts.admin.admin-master')
@section('title', 'Slider')
@section('slider') menu-is-opening menu-open @endsection
@section('allsliderActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
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
                                <th>SubTitle En</th>
                                <th>SubTitle Bn</th>
                                <th>Title En</th>
                                <th>Title Bn</th>
                                <th>Description En</th>
                                <th>Description Bn</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->subTitle_en }}</td>
                                    <td>{{ $item->subTitle_bn }}</td>
                                    <td>{{ $item->title_en }}</td>
                                    <td>{{ $item->title_bn }}</td>
                                    <td>{{ Str::limit($item->description_en, 20) }}</td>
                                    <td>{{ Str::limit($item->description_bn, 20) }}</td>
                                    <td><img width="200px" height="150px" src="{{ asset($item->sliderImage) }}" alt=""></td>
                                    <td>
                                        @if( $item->status == 1)
                                            <a href="{{ route('sliders.inactive', ['id' => $item->id]) }}"  class="btn btn-success">Inactive</a>
                                        @else
                                            <a href="{{ route('sliders.active', ['id' => $item->id]) }}" class="btn btn-primary">active</a>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href=" {{ route('sliders.edit', $item->id) }} " class="btn btn-info">Edit</a>
                                        <form action="{{ route('sliders.destroy', $item->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are u sure to delete this item?')" class="btn btn-danger">Delete</button>
                                        </form>
                                        </span>
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

