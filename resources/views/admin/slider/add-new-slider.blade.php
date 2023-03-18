@extends('layouts.admin.admin-master')
@section('title', 'Add Slider')
@section('slider') menu-is-opening menu-open @endsection
@section('addsliderActive') active @endsection
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
                                <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Slider</a></li>
                                <li class="breadcrumb-item active">Add New Slider</li>
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
                <div class="col-md-8 m-auto">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h4>Add New Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>SubTitle Eng</label>
                                    <input type="text" class="form-control" value="{{ old('subTitle_en') }}" name="subTitle_en" placeholder="Top Brands">
                                </div>
                                <div class="form-group">
                                    <label>SubTitle Bn</label>
                                    <input type="text" class="form-control" value="{{ old('subTitle_bn') }}" name="subTitle_bn" placeholder="শীর্ষ ব্র্যান্ড">
                                </div>
                                <div class="form-group">
                                    <label>Title En</label>
                                    <input type="text" class="form-control" value="{{ old('title_en') }}" name="title_en" placeholder="New Collections">
                                </div>
                                <div class="form-group">
                                    <label>Title Bn</label>
                                    <input type="text" class="form-control" value="{{ old('title_bn') }}" name="title_bn" placeholder="নতুন সংগ্রহ">
                                </div>

                                <div class="form-group">
                                    <label>Description En</label>
                                    <textarea name="description_en" value="{{ old('description_en') }}" class="form-control" cols="30" rows="5" placeholder="Write Something..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Description Bn</label>
                                    <textarea name="description_bn"  value="{{ old('description_bn') }}" class="form-control" cols="30" rows="5" placeholder="কিছু লিখুন"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Slider Image: (870px 370px)</label>
                                    <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="sliderImage" class="mb-3">
                                    <img id="img_id" width="500px" height="300px" src="{{ asset('backend') }}/images/brand/default-image.jpg" alt="">

                                    @error('sliderImage')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group text-center mt-4">
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
@endsection

