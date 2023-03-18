@extends('layouts.admin.admin-master')
@section('title','Update SubCategory')
@section('category')menu-is-opening menu-open @endsection
@section('subcategoryActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('subCategory.index') }}">SubCategory</a></li>
                                    <li class="breadcrumb-item active">Update SubCategory</li>
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
                                <h4>Update SubCategory</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('subCategory.update',$subcategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">

                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $subcategory->category_id == $cat->id ? 'selected' : " " }}>{{ $cat->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>SubCategory Name Bn</label>
                                        <input type="text" class="form-control" value="{{ $subcategory->subcategory_name_bn }}" name="subcategory_name_bn">
                                        @error('subcategory_name_bn')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>SubCategory Name En</label>
                                        <input type="text" class="form-control"  value="{{ $subcategory->subcategory_name_en }}" name="subcategory_name_en">
                                        @error('subcategory_name_en')
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

