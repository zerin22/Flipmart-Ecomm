@extends('layouts.admin.admin-master')
@section('title', 'All User')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">All User</li>
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
                        @php
                            $onlineUser = 0;
                        @endphp

                        @foreach($users as $row)
                            @php
                                if($row->userIsOnline()){
                                    $onlineUser = $onlineUser + 1;
                                }
                            @endphp
                        @endforeach

                        <h4 style="font-weight:600; margin-bottom: 20px;">Total User: <span class="badge badge-primary">{{ count($users) }}</span> || Active User <span class="badge badge-primary" style="background-color:green">{{ $onlineUser }}</span></h4>
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Last Seen</th>
                                <th>Role Change</th>
                                <th>Account</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="100px" height="100px" src="{{ asset($item->image) }}" alt="image">
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if($item->role_id == 1)
                                            Admin
                                        @else
                                            User
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->userIsOnline())
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-primary">{{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select name="" id="" class="form-control" onchange="location = this.value">
                                            <option label="--Change Role--"></option>
                                            <option value="{{ route('admin.role.change', $item->id )}}">Admin</option>
                                            <option value=" {{ route('user.role.change', $item->id )}}">User</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if($item->Isban == 1)
                                            <span class="badge badge-danger">Banned</span>
                                        @else
                                            <span class="badge badge-primary">UnBanned</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->Isban == 0)
                                            <a href="{{ route('user.banned', $item->id) }}" class="btn btn-danger">Banned</a>
                                        @else
                                            <a href="{{ route('user.unbanned', $item->id) }}" class="btn btn-success">UnBanned</a>
                                        @endif
                                            {{-- <button data-id="{{ $item->id }}" class="btn btn-danger userDeleteButton">Delete</button> --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $item->id }}">Delete</button>
                                            <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure to delete data?</p>
                                                        <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        <a href="{{ route('user.delete', $item->id) }}" class="btn btn-danger">Delete</a>
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
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



