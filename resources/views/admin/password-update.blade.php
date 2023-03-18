@extends('layouts.admin.admin-master')
@section('title', 'Update Password')
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
                            <li class="breadcrumb-item active">Update Password</li>
                        </ul>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

            <div class="profile_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4" style="margin-right: 30px;">
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
                                <label class="emailLabel">User Email: </label>
                                <input class="profileInput" type="text" value="{{ Auth::user()->email }}">
                                <a href="{{ route('adminEmailShow' , [ 'id' => Auth::user()->id])}}"  class="nameEdit"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <div class="profile_password mt-3">
                                <a class="btn btn-primary" href="{{ route('admin.profile')}}" >Back Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" style="margin-left: 30px;">
                        <center><h2>Update Password</h2></center>
                        <form action="{{ route('updatePassword-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="old_password" placeholder="Old password" class="form-control">
                                @error('old_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="new_password" placeholder="New password" class="form-control">
                                @error('new_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="password" name="password_confirmation" placeholder="Re-Type Password" class="form-control">
                                @error('password_confirmation')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit"  class="form-control" style="background-color:#59b210; color: #fff">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- script section start here--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
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



