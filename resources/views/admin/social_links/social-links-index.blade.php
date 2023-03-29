@extends('layouts.admin.admin-master')
@section('title','Settings')
@section('allSocialLinksActive') active @endsection
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1 ">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Settings</li>
                                </ul>
                            </div>

                            <div class="item_2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add New Social Links
                                </button>
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
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Class name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($socialLinks as $socialLink)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $socialLink->name }}</td>
                                        <td>{{ $socialLink->social_link }}</td>
                                        <td>{{ $socialLink->class_name }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                 Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModal__{{ $socialLink->id }}">Edit</a>
                                                    <a class="dropdown-item deleteBtn"  data-toggle="modal" data-target="#exampleModalDelete__{{ $socialLink->id }}">Delete</a>
                                                </div>


                                            <!-- Modal For Delete -->
                                            <div class="modal fade" id="exampleModalDelete__{{ $socialLink->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('social-links.destroy', $socialLink->id) }}" method="POST" >
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

                                    <!--Edit Social Link Modal -->
                                    <div class="modal fade" id="exampleModal__{{ $socialLink->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content card card-warning">
                                                <div class="modal-header card-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Social Link</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{ route('social-links.update', $socialLink->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Link Name</label>
                                                            <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{ $socialLink->name }}" name="name" placeholder="Social Link Name">
                                                            @error('name')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Social Link</label>
                                                            <input type="url"  class="form-control @error('social_link') is-invalid @enderror" value="{{ $socialLink->social_link }}" name="social_link" placeholder="Social Link">
                                                            @error('social_link')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Class Name</label>
                                                            <input type="text"  class="form-control @error('class_name') is-invalid @enderror" value="{{ $socialLink->class_name }}" name="class_name" placeholder="Social Link Name">
                                                            @error('class_name')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn btn-warning custom_lg_btn">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="card m-auto">

                    </div>
                </div>
            </div>

        </section>

        <!--Add Social Link Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content card card-warning">
                    <div class="modal-header card-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Social Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('social-links.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Link Name</label>
                                <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Social Link Name">
                                @error('name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Social Link</label>
                                <input type="url"  class="form-control @error('social_link') is-invalid @enderror" value="{{ old('social_link') }}" name="social_link" placeholder="Social Link">
                                @error('social_link')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text"  class="form-control @error('class_name') is-invalid @enderror" value="{{ old('class_name') }}" name="class_name" placeholder="Social Link Name">
                                @error('class_name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning custom_lg_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

    </script>

@endsection
