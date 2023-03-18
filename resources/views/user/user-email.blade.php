
@include('layouts.fontend.inc.header');
<style>
    input[type="text"] {
        border: none;
    }
    .nameUpdateBtnGroup a {
        text-decoration: none;
    }
</style>

<div class="profile_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
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
                        <form action="{{ route('userEmailUpdate-store', ['id' => Auth::user()->id]) }}" method="POST">
                            @csrf
                            <input type="text" class="nameInput" value="{{ $data->email }}" name="email">
                            <div class="nameUpdateBtnGroup">
                                <a href="{{ route('user.dashboard') }}" class="nameUpdateCancelBtn">Cancel</a>
                                <input type="submit" value="Update" name="update" class="nameUpdateBtn">
                            </div>
                        </form>
                    </div>
                    <div class="profile_item">
                        <h4>Total Buy: <span style="color:green; font-weight:700">4 Items</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>
</div>


@include('layouts.fontend.inc.footer');
