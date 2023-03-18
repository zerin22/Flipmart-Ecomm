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
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1 ">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Blog Comment Pending</li>
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
                                    <td>{{ $blogComment->comment }}</td>
                                    <td>
                                        <span class="badge badge-success" >{{ $blogComment->status }}</span>
                                    </td>

                                    <td>
                                        @if( $blogComment->status == 'pending' )
                                            <a href="{{ route('blogcomment.approved', $blogComment->id )}}" class="btn btn-info">Approved</a>
                                        @else
                                            <a href="{{ route('blogcomment.pending', $blogComment->id )}}" class="btn btn-warning">Pending</a>
                                        @endif
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}
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


@section('scripts')

    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

    </script>

@endsection

