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
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                 Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('comments.pending', ['id' => $item->id]) }}"  class="dropdown-item">Pending</a>
                                                    <a href="{{ route('adminComments.replay',$item->id) }}"  class="dropdown-item">Reply</a>
                                                    <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $item->id }}" >Delete</a>
                                                </div>
                                            </div>

                                            <!-- Modal For Delete -->
                                            {{-- <div class="modal fade" id="exampleModal__{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">

                                                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                            <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                            <p class="card-text">Are you sure you want to delete data?</p>
                                                            <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a  href="{{ route('comments.delete',$item->id) }}" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </td>
                                    </tr>
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

