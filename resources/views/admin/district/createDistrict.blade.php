@extends('layouts.admin.admin-master')
@section('title', 'Add New District')
@section('shoppingArea') menu-is-opening menu-open @endsection
@section('district') menu-is-opening menu-open @endsection
@section('adddistrictActive') active @endsection
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
                                    <li class="breadcrumb-item active">Add District</li>
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
                                <h4>Add New District</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('district.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control @error('division_id') is-invalid @enderror">
                                            <option label="--Choose--"></option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>District Name</label>
                                        <input type="text" class="form-control @error('district_name') is-invalid @enderror" value="{{ old('district_name') }}" name="district_name" placeholder="District Name">
                                        @error('district_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit"  name="submit" value="Save" class="btn btn-warning custom_lg_btn">
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



