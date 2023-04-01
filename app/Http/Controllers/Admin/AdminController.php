<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBio;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\VisitorCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
   public function index(){
        $totalProduct = Product::count();
        $totalOrder = Order::where('status', 'pending')->count();
        $totalUser = User::where('role_id', '2')->count();
        $totalvisitor = VisitorCheck::count();

        //For Chart
        $monthOrder = [];
        for ($i=2020; $i <=2023 ; $i++) {
            $monthOrder []  = Order::where('order_year', $i)->count();
        }
        return view('admin.home', compact('totalProduct','totalOrder', 'totalUser','totalvisitor', 'monthOrder'));
   }

   public function adminProfileShow(){
   $adminBios = AdminBio::where('auth_id', Auth::user()->id)->get();
    return view('admin.profile', compact('adminBios'));
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
    public function image_settings($image)
    {
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $location = 'fontend/assets/images/upload/';
        $final_image = $location.$name_gen;
        Image::make($image)->resize(200, 200)->save($final_image);
        return $final_image;
    }

    public function photoUpload(Request $request){
        if(User::findOrFail(Auth::id())->image == 'fontend/assets/images/upload/profile_img.png'){
            $profileImage = $request->file('photo');
            $image = $this->image_settings($profileImage);
            User::findOrFail(Auth::id())->Update([
                'image' => $image,
            ]);
            return redirect()->route('admin.dashboard');
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
            return redirect()->route('admin.dashboard');
        }
    }


}
