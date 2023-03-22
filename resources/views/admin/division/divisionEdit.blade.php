@extends('layouts.admin.admin-master')
@section('title', 'Update Division')
@section('shoppingArea') menu-is-opening menu-open @endsection
@section('division') menu-is-opening menu-open @endsection
@section('alldivisionActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('division.index') }}">Division</a></li>
                                    <li class="breadcrumb-item active">Update Division</li>
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
                                <h4>Update Division</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('division.update', $divisions->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Division Name</label>
                                        <input type="text" class="form-control @error('division_name') is-invalid @enderror" value="{{ $divisions->division_name }}" name="division_name">

                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
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



