@extends('layouts.admin.admin-master')
@section('title','Admin Email Update')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <div class="breadrow d-flex justify-content-between mb-3 mt-4">
                            <div class="item_1">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Update Email</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="profile_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 m-auto">
                                <div class="profile-inner text-center" >
                                    <div class="user-profile-image">
                                        <div class="overlay"></div>
                                        <img id="img_id" src="{{ asset(Auth::user()->image) }}" alt="img">
                                        <input type="file" id="imageInput" class="profile_file">
                                    </div>
                                    <div class="profile_name">
                                        <label class="nameLabel">User Name: </label>
                                        <input  class="profileInput" type="text" value="{{  Auth::user()->name  }}" name="name">
                                        <a href="{{ route('admin.NameShow' , [ 'id' => Auth::user()->id])}}" class="nameEdit"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <div class="profile_email">
                                        <form action="{{ route('adminEmailUpdate-store', ['id' => Auth::user()->id]) }}" method="POST">
                                            @csrf
                                            <input type="text" class="profileEmailEdit" value="{{ $data->email }}" name="email">
                                            <div class="nameUpdateBtnGroup">
                                                <a href="{{ route('admin.profile') }}" class="nameUpdateCancelBtn">Cancel</a>
                                                <input type="submit" value="Update" name="update" class="nameUpdateBtn">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="profile_password mt-3">
                                        <a class="btn btn-primary" href="{{ route('admin.passwordShow')}}" >Update Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 m-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection()

{{-- script section start here --}}
@section('scripts')
    <script type="text/javascript">

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
                    }else{
                        toastr.error('Image Update Fail');
                    }
                })
                .catch(function(error){
                    toastr.error('Image Update Fail');
                })

        })




    </script>
@endsection








