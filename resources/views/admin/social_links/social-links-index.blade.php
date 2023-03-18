@extends('layouts.admin.admin-master')
@section('title','Social Links')
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
                                    <li class="breadcrumb-item active">Social Links</li>
                                </ul>
                            </div><!-- /.col -->
                            <div class="item_2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add Social Links
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
                                            <span class="d-flex justify-content-around">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal__{{ $socialLink->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{ route('social-links.destroy', $socialLink->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>

                                    <!--Edit Social Link Modal -->
                                    <div class="modal fade" id="exampleModal__{{ $socialLink->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header ">
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
                                                            <input type="text"  class="form-control" value="{{ $socialLink->name }}" name="name" placeholder="Social Link Name">
                                                            @error('name')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Social Link</label>
                                                            <input type="url"  class="form-control" value="{{ $socialLink->social_link }}" name="social_link" placeholder="Social Link">
                                                            @error('social_link')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Class Name</label>
                                                            <input type="text"  class="form-control" value="{{ $socialLink->class_name }}" name="class_name" placeholder="Social Link Name">
                                                            @error('class_name')
                                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Update</button>
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
            </div>

        </section>
        <!--Add Social Link Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
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
                                <input type="text"  class="form-control" value="{{ old('name') }}" name="name" placeholder="Social Link Name">
                                @error('name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Social Link</label>
                                <input type="url"  class="form-control" value="{{ old('social_link') }}" name="social_link" placeholder="Social Link">
                                @error('social_link')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text"  class="form-control" value="{{ old('class_name') }}" name="class_name" placeholder="Social Link Name">
                                @error('class_name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Save</button>
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
