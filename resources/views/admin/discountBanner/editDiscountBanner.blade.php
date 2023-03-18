@extends('layouts.admin.admin-master')
@section('title', 'Update DiscountBanner')
@section('bannerActive') active @endsection
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 m-auto">
                    <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                        <div class="item_1">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Update Banner</li>
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
                            <h4>Update Discount Banner</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('banner.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Banner Image: (848px 201px)</label>
                                    <input type="file" onchange="document.getElementById('img_id_left').src=window.URL.createObjectURL(this.files[0])" name="image_left" class="mb-3">
                                    <img id="img_id_left" width="848px" height="201px" src="{{ asset($banners->image_left) }}" alt="">
                                    @error('image_left')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group text-center mt-4">
                                    <input type="submit"  name="submit" value="Update" class="btn btn-warning btn-lg">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection
