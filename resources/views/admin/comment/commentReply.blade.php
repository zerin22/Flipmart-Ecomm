@extends('layouts.admin.admin-master')
@section('title', 'Comment Reply')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('comments.approved.show') }}">Approved Comment</a></li>
                                    <li class="breadcrumb-item active">Comment Reply</li>
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
                        <form action="{{ route('comments.replay.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="reply_id" value="{{ $data->id }}">
                            <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                            <div class="form-group">
                                <label>Comment Reply</label>
                                <textarea name="description" rows="7" class="form-control" placeholder="Write here..."></textarea>
                            </div>
                            <button class="btn btn-primary mt-3">Comment</button>
                        </form>
                    </div>
                </div>
            </div><
        </section>
    </div>

@endsection


