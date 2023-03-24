<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->orderBy("id", "DESC")->get();
        return view('user.home', compact('orders'));
    }
    public function userNameGetId($id){
        $data = User::findOrFail($id);
        return view('user.user-name', compact('data'));
    }

    public function userNameUpdateStore(Request $request, $id){
        User::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('user.dashboard');
    }

    // User Email Edit

    public function userEmailGetId ($id){
        $data = User::findOrFail($id);
        return view('user.user-email', compact('data'));
    }

    public function userEmailUpdateStore(Request $request, $id){
        User::findOrFail($id)->update([
            'email' => $request->email,
        ]);
        return redirect()->route('user.dashboard');
    }

    // update password
    public function updatePasswordShow(){
        return view('user.update-password');
    }

    public function passwordStore(Request $request){
        $request->validate([
            "old_password" => 'required',
            "new_password" => 'required',
            "password_confirmation" => 'required',
        ]);

        $old_password = Auth::user()->getAuthPassword();
        $current_password = $request->old_password;
        $new_password = $request->new_password;
        $c_password = $request->password_confirmation;

        if($new_password == $c_password){
            if(Hash::check($current_password, $old_password)){
                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($new_password)
                ]);
                Auth::logout();
                return redirect()->route('login')->with('success', 'Password Change Successfully. Try new password');

            }else {
                return redirect()->back()->with('fail', "Current Password and old Password are not matched");
            }
        }else {
            return redirect()->back()->with('fail', "Password and Confirm Password are not matched");
        }
    }

    // image upload
    public function image_settings($image)
    {
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $location = 'fontend/assets/images/upload/';
        $final_image = $location.$name_gen;
        Image::make($image)->resize(200, 200)->save($final_image);
        return $final_image;
    }

    // user image update
    public function photoUpload(Request $request){
        if(User::findOrFail(Auth::id())->image == 'fontend/assets/images/upload/profile_img.png'){
                $profileImage = $request->file('photo');
                $image = $this->image_settings($profileImage);
                User::findOrFail(Auth::id())->Update([
                    'image' => $image,
                ]);
                return redirect()->route('user.dashboard');
            }else {
                $img = User::findOrFail(Auth::id());
                $old_image = $img->image;
                if(file_exists($old_image)){
                    unlink($old_image);
                }
                $profileImage = $request->file('photo');
                $image = $this->image_settings($profileImage);
                User::findOrFail(Auth::id())->Update([
                    'image' => $image,
                ]);
                return redirect()->route('user.dashboard');
            }
        }

}
