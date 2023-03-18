@extends('layouts.admin.admin-master')
@section('title', 'Comment')
@section('comment') menu-is-opening menu-open @endsection
@section('commentPending') active @endsection
@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Comment</li>
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
                                <th>Name</th>
                                <th>Product Thumbnail</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comments as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img width="100px"  src="{{ asset( $item->product->product_thumbnail ) }}" alt="">
                                    </td>

                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <span class="badge badge-success" >{{ $item->status }}</span>
                                    </td>

                                    <td>
                                        @if( $item->status == 'pending' )
                                            <a href="{{ route('comments.approved', $item->id )}}" class="btn btn-info">Approved</a>
                                        @else
                                            <a href="{{ route('comments.pending', $item->id )}}" class="btn btn-warning">Pending</a>
                                        @endif
                                        <a href="" class="btn btn-danger">Delete</a>
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

