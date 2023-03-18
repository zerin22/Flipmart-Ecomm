
@include('layouts.fontend.inc.header');


{{--user profile section start here --}}
<style>
    input[type="text"] {
        border: none;
    }
</style>
<div class="profile_section">
    <div class="container">


        <div class="row">
            <div class="col-md-4" style="margin-right: 30px;">
                <div class="profile-inner text-center" >
                    <div class="user-profile-image">
                        <div class="overlay"></div>
                        <form action="">
                            <img id="img_id" src="{{ asset(Auth::user()->image) }}" alt="img">
                            <input type="file" id="imageInput" class="profile_file">
                        </form>
                    </div>
                    <div class="profile_name">
                        <label class="nameLabel">User Name: </label>
                        <input type="text" value="{{  Auth::user()->name  }}" name="name">
                        <a href="{{ route('userUpdate-Id' , [ 'id' => Auth::user()->id])}}" class="nameEdit"></a>
                    </div>
                    <div class="profile_email">
                        <label class="emailLabel">User Email: </label>
                        <input type="text" value="{{ Auth::user()->email }}">
                        <a href="{{ route('emailGet-Id' , [ 'id' => Auth::user()->id])}}"  class="nameEdit"></a>
                    </div>
                    <div class="profile_item">
                        <h4>Total Buy: <span style="color:green; font-weight:700">4 Items</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="margin-left: 30px;">
                <center><h2>Change Password</h2></center>
                <form action="{{ route('password-store') }}" method="POST">
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



@include('layouts.fontend.inc.footer');

