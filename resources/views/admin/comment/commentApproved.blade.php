@extends('layouts.admin.admin-master')
@section('title', 'Approved Comment')
@section('comment') menu-is-opening menu-open @endsection
@section('commentApproved') active @endsection
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
                                    <li class="breadcrumb-item"><a href="{{ route('comments.store') }}">Pending Comment</a></li>
                                    <li class="breadcrumb-item active">Approved Comment</li>
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
                                    @php
                                        $commentsCount= App\Models\CommentReply::where('reply_id', $item->id)->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $item->name }} ||
                                            @if($commentsCount > 0)
                                                <span class="text-info font-weight-bold" >( {{ $commentsCount }} Replay)</span>
                                            @else
                                                <span class="text-danger font-weight-bold" >( {{ $commentsCount }} Replay)</span>
                                            @endif

                                        </td>
                                        <td>
                                            <img width="100px"  src="{{ asset( $item->product->product_thumbnail ) }}" alt="">
                                        </td>

                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <span class="badge badge-success" >{{ $item->status }}</span>
                                        </td>
                                        <td>
                                            <button data-id="{{$item->id }}" class="btn btn-danger commentsDeleteButton">Delete</button>
                                            <a href="{{ route('adminComments.replay',$item->id) }}" class="btn btn-info">Replay</a>
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


@endsection()

