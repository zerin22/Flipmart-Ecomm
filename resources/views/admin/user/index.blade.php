@extends('layouts.admin.admin-master')
@section('title', 'All User')
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
                            <li class="breadcrumb-item active">All User</li>
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
                                            <button data-id="{{ $item->id }}" class="btn btn-danger userDeleteButton">Delete</button>
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
@endsection()



