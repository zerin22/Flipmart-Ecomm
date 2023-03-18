<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
   public function index(){
       return view('admin.home');
   }

   public function adminProfileShow(){
    $adminBio = AdminBio::first();
    return view('admin.profile', compact('adminBio'));
    //    return view('admin.profile');
   }

    // admin name settings  start
   public function adminNameShow($id){
       $data = User::findOrFail($id);
       return view('admin.admin-username', compact('data'));
   }
    public function adminNameStore(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.profile');
    }
    // admin email settings ending
    public function adminEmailShow($id){
        $data = User::findOrFail($id);
        return view('admin.admin-email', compact('data'));

    }
    public function adminEmailStore(Request $request, $id){
        User::findOrFail($id)->update([
            'email' => $request->email,
        ]);
        return redirect()->route('admin.profile');
    }



    // password update settings
    public function showPasswordUpdatePage(){
       return view('admin.password-update');
    }
    public function adminPasswordStore(Request $request){
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

    public function photoUpload(Request $request){
        if(User::findOrFail(Auth::id())->image == 'fontend/assets/images/upload/profile_img.png'){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload_location = 'fontend/assets/images/upload/';
            $last_image = $upload_location.$img_name;
            Image::make($image)->resize(200, 200)->save($last_image);
            User::findOrFail(Auth::id())->Update([
                'image' => $last_image,
            ]);
            return redirect()->route('user.dashboard');
        }else {
            $img = User::findOrFail(Auth::id());
            $old_image = $img->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload_location = 'fontend/assets/images/upload/';
            $last_image = $upload_location.$img_name;
            Image::make($image)->resize(200, 200)->save($last_image);
            User::findOrFail(Auth::id())->Update([
                'image' => $last_image,
            ]);
            return redirect()->route('user.dashboard');
        }
    }


}
