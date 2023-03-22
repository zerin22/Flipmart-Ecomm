@extends('layouts.admin.admin-master')
@section('title','All Blogs')
@section('blog')menu-is-opening menu-open @endsection
@section('allBlogActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Blogs</li>
                                    </ul>
                                </ul>
                            </div><!-- /.col -->
                            <div class="item_2">
                                <a class="btn btn-primary" href="{{ route('blog.create') }}">Add New Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <table class="table table-bordered text-center" id="table_id">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Thumbnail Image</th>
                                    <th>Feature Image</th>
                                    <th>Description</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->index +1}}</td>
                                    <td>{{  Str::limit($blog->title, '20')  }}  <span style="color:red; font-weight:700">({{ $blog->relationWithblogComment->count() }}) Comment</span></td>
                                    <td><img width="200px" height="150px" src="{{ asset($blog->thumbnail_image) }}" alt=""></td>
                                    <td><img width="200px" height="150px" src="{{ asset($blog->feature_image) }}" alt=""></td>
                                    <td>{!! Str::limit($blog->description, '20') !!}</td>
                                    <td>
                                        @if($blog->created_at == NULL)
                                            <p style="color:red; font-weight:700">No Time Set</p>
                                        @else
                                            <p style="color:green; font-weight:700">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="d-flex justify-content-center">
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-warning mr-3">View</a>
                                            <a href="{{ route('blog.edit',  $blog->id) }}" class="btn btn-info mr-3">Edit</a>

                                                {{-- <button type="submit" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger">Delete</button> --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal__{{ $blog->id }}">Delete</button>
                                        </span>

                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
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


@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
