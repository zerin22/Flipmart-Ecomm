@extends('layouts.admin.admin-master')
@section('title','Update Category')
@section('category')menu-is-opening menu-open @endsection
@section('allcategoryActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                                    <li class="breadcrumb-item active">Update Category</li>
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
                                <h4>Update Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.update', $categoryDatas->id ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Category Name Bn</label>
                                        <input type="text" class="form-control" name="category_name_bn" value="{{ $categoryDatas->category_name_bn }}">
                                        @error('category_name_bn')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name En</label>
                                        <input type="text" class="form-control" name="category_name_en" value="{{ $categoryDatas->category_name_en }}">
                                        @error('category_name_en')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Category Icon</label>
                                        {{-- <input type="text" class="form-control" name="category_icon"   value="{{ $categoryDatas->category_icon}}"> --}}
                                        <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="category_icon" class="mb-3">
                                        <img id="img_id" width="150px" height="150px" src="{{ asset($categoryDatas->category_icon) }}" alt="">
                                        @error('category_icon')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-success btn-lg">
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


