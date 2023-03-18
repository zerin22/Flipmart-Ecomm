@extends('layouts.admin.admin-master')
@section('title','Coupon')
@section('coupon') menu-is-opening menu-open @endsection
@section('allcouponActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Coupon</a></li>
                                    <li class="breadcrumb-item active">Update Coupon</li>
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
                                <h4>Update Coupon</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('coupon.update', $coupons->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ $coupons->coupon_name  }}" name="coupon_name" placeholder="Coupon Name">

                                        @error('coupon_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Discount Percentage</label>
                                        <input type="number" class="form-control @error('coupon_discount') is-invalid @enderror" value="{{ $coupons->coupon_discount  }}" name="coupon_discount" placeholder="Coupon Discount">

                                        @error('coupon_discount')
                                            <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Coupon Validate Date</label>
                                        <input type="date" class="form-control @error('coupon_validity') is-invalid @enderror " value="{{ $coupons-> coupon_validity}}" name="coupon_validity" min="{{ \Carbon\Carbon::now()->format('Y-m-d')}}">

                                        @error('coupon_validity')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Update" class="btn btn-success">
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


