@extends('layouts.admin.admin-master')
@section('title','Update State')
@section('shoppingArea') menu-is-opening menu-open @endsection
@section('state') menu-is-opening menu-open @endsection
@section('allstateActive') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('state.index') }}">State</a></li>
                                    <li class="breadcrumb-item active">Update State</li>
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
                                <h4>Update State</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('state.update', $state->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control @error('division_id') is-invalid @enderror">
                                            <option label="--Choose--"></option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $division->id === $state->division_id ? 'selected' : ' ' }}>{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_name')
                                        <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label>Select District</label>
                                        <select class="form-control @error('district_id') is-invalid @enderror" name="district_id">
                                            <option label="--Choose--"></option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" {{ $district->id === $state->district_id ? 'selected' : ' ' }}>{{ $district->district_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>State Name</label>
                                        <input type="text" class="form-control @error('state_name') is-invalid @enderror" value="{{ $state->state_name }}" name="state_name" placeholder="State Name">
                                        @error('state_name')
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
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('select[name="division_id"]').on('change', function(event){
            toastr.error("Somthing Wrong! Please try again");
            event.preventDefault();
            let division_id = $(this).val();
            axios.get("/admin/district-get/ajax/"+division_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="district_id"]').empty();
                        $.each(response.data, function(key, value){
                            $('select[name="district_id"]').append( '<option value="'+ value.id +'">'+ value.district_name+'</option>')
                        })
                    }
                })
                .catch(function(error){
                    toastr.error("Somthing Wrong! Please try again");
                });
        })

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
