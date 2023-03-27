@extends('layouts.admin.admin-master')
@section('title', 'BlogComment')
@section('blogComment') menu-is-opening menu-open @endsection
@section('blogcommentPending') active @endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1 ">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Blog Comments</li>
                                </ul>
                            </div>
                            <div class="item_2">
                                <label for="">Search By status</label>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        Select Status
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('blogcomment.index') }}">All</a>
                                        <a class="dropdown-item" href="{{ route('blogcomments.pending.search') }}">Pending</a>
                                        <a class="dropdown-item" href="{{ route('blogcomments.approved.search') }}">Approved</a>
                                    </div>
                                </div>
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
                                <th>index</th>
                                <th>User Name</th>
                                <th>Blog Title</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blogComments as $blogComment)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $blogComment->relationWithUser->name }}</td>
                                    <td>{{ $blogComment->relationWithBlog->title }}</td>

                                    <td>
                                        {{ $blogComment->comment }} || <span class="text-info font-weight-bold" >( {{ $blogComment->relationWithBlogReply->count() }} Replay)</span>
                                    </td>
                                    <td>
                                        @if( $blogComment->status == 'approved')
                                            <span class="badge badge-fill badge-success">{{ $blogComment->status }}</span>
                                        @else
                                            <span class="badge badge-fill badge-color">{{ $blogComment->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                             Action
                                            </button>
                                            <div class="dropdown-menu">
                                                @if( $blogComment->status == 'pending' )
                                                    <a href="{{ route('blogcomment.approved', $blogComment->id )}}" class="dropdown-item">Approved</a>
                                                @else
                                                    <a href="{{ route('blogcomment.pending', $blogComment->id ) }}"  class="dropdown-item">Pending</a>
                                                @endif
                                                @if($blogComment->status == 'approved')
                                                    <a class="dropdown-item" href="{{ route('blogcomments.replay',$blogComment->id) }}">Reply</a>
                                                @endif
                                                <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $blogComment->id }}" >Delete</a>
                                            </div>
                                        </div>


                                        <!-- Modal For Delete -->
                                        <div class="modal fade" id="exampleModal__{{ $blogComment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">

                                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                        <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                        <p class="card-text">Are you sure, you want to delete data?</p>
                                                        <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('blogcomment.destroy', $blogComment->id) }}" method="POST" >
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
            </div>
        </section>
    </div>
@endsection


@section('scripts')

    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

    </script>

@endsection

