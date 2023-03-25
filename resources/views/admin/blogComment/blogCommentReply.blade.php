@extends('layouts.admin.admin-master')
@section('title', 'Blog Comment Reply')
@section('blogComment') menu-is-opening menu-open @endsection
@section('blogcommentApproved') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1 ">
                                <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('blogcomment.index') }}">Blog Comments</a></li>
                                    <li class="breadcrumb-item active">Blog Comment Reply</li>
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
                        <form action="{{ route('blogcomments.replay.store', $blogComment->id ) }}" method="post">
                            @csrf
                            <input type="hidden" name="blogcomment_id" value="{{ $blogComment->id }}">
                            <div class="form-group">
                                <label>Comment</label>
                                <input class="form-control" type="text"  value="{{ $blogComment->comment }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Comment Reply</label>
                                <textarea name="description" rows="7" class="form-control" placeholder="Write here..."></textarea>
                            </div>
                            <button class="btn btn-primary mt-3">Comment</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
