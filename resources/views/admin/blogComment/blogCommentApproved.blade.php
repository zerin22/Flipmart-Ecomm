@extends('layouts.admin.admin-master')
@section('title', 'Approved Comment')
@section('blogComment') menu-is-opening menu-open @endsection
@section('blogcommentApproved') active @endsection
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
                            <li class="breadcrumb-item active">Approved Blog Comment</li>
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
                                @foreach($blogCommentsApproves  as $blogCommentsApprove)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $blogCommentsApprove->relationWithUser->name }}</td>
                                    <td>{{ $blogCommentsApprove->relationWithBlog->title }}</td>
                                    <td>{{ $blogCommentsApprove->comment }}</td>
                                    <td>
                                        <span class="badge badge-success" >{{ $blogCommentsApprove->status }}</span>
                                    </td>

                                    <td>
                                        <span class="d-flex justify-content-around">
                                            <form action="{{ route('blogcomment.destroy', $blogCommentsApprove->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('blogcomments.replay',$blogCommentsApprove->id) }}" class="btn btn-warning">Reply</a>
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

@endsection()

