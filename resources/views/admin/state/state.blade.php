@extends('layouts.admin.admin-master')
@section('title','State')
@section('shoppingArea') menu-is-opening menu-open @endsection
@section('state') menu-is-opening menu-open @endsection
@section('allstateActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">State</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 ">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Division Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($states as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->division->division_name }}</td>
                                    <td> {{$item->district->district_name }}
                                    </td>
                                    <td>{{ $item->state_name }}</td>
                                    <td>
                                        @if( $item->status == 1)
                                            <span class="badge badge-fill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-fill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                             Action
                                            </button>
                                            <div class="dropdown-menu">
                                            @if( $item->status == 1 )
                                                <a href="{{ route('state.active', ['id' => $item->id]) }}" class="dropdown-item">Inactive</a>
                                            @else
                                                <a href="{{ route('state.inactive', ['id' => $item->id]) }}"  class="dropdown-item">Active</a>
                                            @endif
                                              <a class="dropdown-item" href="{{ route('state.edit', $item->id) }}">Edit</a>
                                              <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $item->id }}" >Delete</a>
                                            </div>
                                        </div>
                                        {{-- <span class="d-flex justify-content-center">
                                            <a href=" {{ route('state.edit', $item->id) }} " class="btn btn-info mr-3">Edit</a>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</button>
                                        </span> --}}

                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure you want to delete data?</p>
                                                        <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('state.destroy', $item->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-warning custom_lg_btn">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4 ">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Add New State</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('state.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Division</label>
                                        <select name="division_id" class="form-control">
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
                                        <label>Select District</label>
                                        <select class="form-control" name="district_id">
                                            <option label="--Choose--"></option>
                                        </select>
                                        @error('district_id')
                                            <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>State Name</label>
                                        <input type="text" class="form-control @error('state_name') is-invalid @enderror" value="{{ old('state_name') }}" name="state_name" placeholder="State Name">
                                        @error('state_name')
                                            <p style="color: red; font-weight:700">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Save" class="btn btn-warning custom_lg_btn">
                                    </div>
                                </form>
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
            event.preventDefault();
            let division_id = $(this).val();
            axios.get("/admin/district-get/ajax/"+division_id)
                .then(function(response){
                    if(response.status === 200){
                        $('select[name="district_id"]').empty();
                        $.each(response.data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name+'</option>')
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
@endsection()
