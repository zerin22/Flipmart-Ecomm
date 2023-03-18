@extends('layouts.admin.admin-master')
@section('title','All Category')
@section('category')menu-is-opening menu-open @endsection
@section('allcategoryActive') active @endsection
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
                            <li class="breadcrumb-item active">Category</li>
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
                    <div class="col-md-8">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name Bn</th>
                                    <th>Category Name En</th>
                                    <th>Icon</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($categoryItems as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{  $item->category_name_bn  }}  <span style="color:red; font-weight:700">({{ $item->subcategory->count()}} )</span></td>
                                    <td>{{ $item->category_name_en }}</td>
                                    <td><img src="{{ asset($item->category_icon) }}" alt=""></td>
                                    <td>
                                        @if($item->created_at == NULL)
                                            <p style="color:red; font-weight:700">No Time Set</p>
                                        @else
                                            <p style="color:green; font-weight:700">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-around">
                                        <a href="{{ route('category.edit',  $item->id) }}" class="btn btn-info mr-2">Edit</a>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Category Name Bn</label>
                                        <input type="text" class="form-control" name="category_name_bn" placeholder="ইলেকট্রনিক্স">
                                        @error('category_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name En</label>
                                        <input type="text" class="form-control" name="category_name_en" placeholder="Electronics">
                                        @error('category_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Category Icon: (30px 30px)</label>
                                        <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="category_icon" class="mb-3">
                                        <img id="img_id" width="150px" height="150px" src="{{ asset('backend') }}/images/brand/default-image.jpg" alt="">
                                        @error('category_icon')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Add" class="btn btn-warning btn-lg">
                                    </div>
                                </form>
                            </div>
                        </div>
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
@endsection
