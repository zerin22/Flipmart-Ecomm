@extends('layouts.admin.admin-master')
@section('title', 'Update DiscountBannerTwo')
@section('banner')menu-is-opening menu-open @endsection
@section('allBannerTwoActive') active @endsection
@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                        <div class="item_1">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('bannerTwo.index') }}">Discount Banner Two</a></li>
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
                            <h4>Update Discount Banner Two</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bannerTwo.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Banner Image: (850px 200px)</label>
                                    <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" name="image" class="mb-3">
                                    <img id="img_id" width="850px" height="200px" src="{{ asset($banners->image) }}" alt="">
                                    @error('image')
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
        </div>
    </section>
</div>

@endsection
