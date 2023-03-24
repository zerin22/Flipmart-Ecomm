@extends('layouts.admin.admin-master')
@section('title', 'Profile')

<style>
    .profile_section{
        margin: 0 !important;
        padding: 0px 50px;
    }
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid" style="padding: 0px 50px">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ul>
                            </div><!-- /.col -->
                            <div class="item_2">
                                @if (count($adminBios) <= 0)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Add Profile
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="profile_section">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-inner text-center" >
                                <div class="user-profile-image">
                                    <div class="overlay"></div>
                                    <form action="">
                                        <img id="img_id" src="{{ asset(Auth::user()->image) }}" alt="img">
                                        <input type="file" id="imageInput" class="profile_file">
                                    </form>
                                </div>
                                <div class="profile_name">
                                    <label class="nameLabel">Admin Name: </label>
                                    <input class="profileInput" type="text" value="{{  Auth::user()->name  }}" name="name">
                                    <a href="{{ route('admin.NameShow' , [ 'id' => Auth::user()->id])}}" class="nameEdit" ><i class="fas fa-pencil-alt"></i></a>
                                </div>
                                <div class="profile_email">
                                    <label class="nameLabel">Admin Email: </label>
                                    <input class="profileInput" type="text" value="{{ Auth::user()->email }}">
                                    <a  href="{{ route('adminEmailShow' , [ 'id' => Auth::user()->id])}}" class="nameEdit"><i class="fas fa-pencil-alt"></i></a>
                                </div>
                                <div class="profile_password mt-3">
                                    <a class="btn btn-primary" href="{{ route('admin.passwordShow')}}" >Update Password</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 m-auto">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4>Admin Profile</h4>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal__{{ Auth::user()->id }}"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="profile_name">
                                        <p><strong>Admin Bio</strong></p>
                                        <p>{!! Auth::user()->relationWithAdminBio->bio ?? '' !!}</p>
                                    </div>

                                    <div class="profile_name">
                                        <p><strong>Company Name: </strong>{{ Auth::user()->relationWithAdminBio->company_name ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Edit Bio Modal -->
        <div class="modal fade" id="exampleModal__{{ Auth::user()->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">Update profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('bio.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text"  class="form-control" value="{{ Auth::user()->relationWithAdminBio->company_name ?? '' }}" name="company_name" placeholder="Company Name">
                                @error('company_name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" id="editorBio__1" name="bio" placeholder="Example...">{{ Auth::user()->relationWithAdminBio->bio ?? '' }}</textarea>
                                @error('bio')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Add Bio Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content card card-warning">
                    <div class="modal-header card-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('bio.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text"  class="form-control" value="{{ old('company_name') }}" name="company_name" placeholder="Company Name">
                                @error('company_name')
                                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" id="editorBio"  value="{{ old('description') }}" name="bio" placeholder="Example..."></textarea>
                                @error('bio')
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

{{--script section start here --}}
@section('scripts')
    <script type="text/javascript">

    CKEDITOR.replace( 'editorBio' );
    CKEDITOR.replace( 'editorBio__1' );

        $('#add_more').click(function (){
            let new_properties_html =
            `<div class="row new_properties">
                <div class="col-10">
                    <input type="url" name="option[]" class="form-control mb-1" placeholder="Social Link...">
                </div>
                <div class="col-2">
                <button type="button" class="close remove--new_properties">
                    <span class="btn btn-danger">&times;</span>
                </button>
                </div>
            </div>`;
            $('.properties-container').append(new_properties_html);
        });
        $(document).on('click', '.remove--new_properties', function(){
            $(this).closest(".new_properties").remove();
        });


        $('#add_more_edit').click(function (){
            let new_properties_html =
            `<div class="row new_properties">
                <div class="col-10">
                    <input type="url" name="option[]" class="form-control mb-1" placeholder="Social Link...">
                </div>
                <div class="col-2">
                <button type="button" class="close remove--new_properties">
                    <span class="btn btn-danger">&times;</span>
                </button>
                </div>
            </div>`;
            $('.properties-container').append(new_properties_html);
        });
        $(document).on('click', '.remove--new_properties', function(){
            $(this).closest(".new_properties").remove();
        });


        $('#imageInput').change(function (){
            let Reader = new FileReader();
            Reader.readAsDataURL(this.files[0]);
            Reader.onload=function(event){
                let imgSrc = event.target.result;
                $("#img_id").attr('src', imgSrc);
            }

            // img settings
            let photoFile = $("#imageInput").prop('files')[0];
            let formData = new FormData();
            formData.append('photo',photoFile);
            photoUpload: '{{route("file.Upload")}}';
            axios.post("photoUpload", formData)
                .then(function(response){
                    if(response.status===200){
                        toastr.success('Image Update Success');
                    }
                })
                .catch(function(error){
                    toastr.error('Image Update Fail');
                })
        })
    </script>
@endsection
{{--script section ending here --}}








