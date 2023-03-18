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
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1 ">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Blogs</li>
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
                                        <span class="d-flex justify-content-around">
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-warning">View</a>
                                            <a href="{{ route('blog.edit',  $blog->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </span>
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
