@extends('layouts.admin.admin-master')
@section('title', 'Update Brand')
@section('page')menu-is-opening menu-open @endsection
@section('brandActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-8 m-auto">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brand</a></li>
                            <li class="breadcrumb-item active">Update Brand</li>
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
                    <div class="col-md-8 m-auto">
                        <div class="card  card-warning">
                            <div class="card-header">
                                <h4>Update Brand</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('brands.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="old_id" value="{{$datas->id}}">
                                    <div class="form-group">
                                        <label>Brand Name Bn</label>
                                        <input type="text" class="form-control" name="brand_name_bn" value="{{ $datas->brand_name_bn }}" >
                                        @error('brand_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Brand Name En</label>
                                        <input type="text" class="form-control" name="brand_name_en" value="{{ $datas->brand_name_en }}">
                                        @error('brand_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Brand Image: (166px 110px )</label>
                                        <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="brand_image" class="mb-3">
                                        <img id="img_id" width="150px" height="150px" src="{{ asset($datas->brand_image) }}" alt="">

                                        @error('brand_image')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-warning custom_lg_btn">
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
@endsection

