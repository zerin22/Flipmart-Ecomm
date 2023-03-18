@extends('layouts.admin.admin-master')
@section('title', 'Update District')
@section('shoppingArea') menu-is-opening menu-open @endsection
@section('district') menu-is-opening menu-open @endsection
@section('alldistrictActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('district.index') }}">District</a></li>
                                    <li class="breadcrumb-item active">Update District</li>
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
                                <h4>Update District</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('district.update', $district->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control">
                                            <option value>--Select--</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : ' '}} >{{ $division->division_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>District Name</label>
                                        <input type="text" class="form-control @error('district_name') is-invalid @enderror" value="{{$district->district_name}}" name="district_name" placeholder="District Name">
                                        @error('district_name')
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



