@extends('layouts.admin.admin-master')
@section('title', 'Single Blog')
@section('blog') menu-is-opening menu-open @endsection
@section('allBlogActive') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-10 m-auto">
                    <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                        <div class="item_1">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                                <li class="breadcrumb-item active">View Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    >
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>{{ $blog->title }}</h4>
                            </div>
                            <div class="card-body p-5">
                                <table class="table table-bordered p-3">
                                    <tr>
                                        <th>Blog Title</th>
                                        <td>{{ $blog->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $blog->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Blog Thumbnail</th>
                                        <td>
                                            <img width="390px" height="215px" src="{{ asset($blog->thumbnail_image) }}" alt="image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blog Feature Image</th>
                                        <td>
                                            <img width="400px" height="300px" src="{{ asset($blog->feature_image) }}" alt="image">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection


