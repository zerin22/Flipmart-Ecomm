<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class RoleController extends Controller
{
     public function allUserIndex(){
         $users = User::orderBy('id', 'DESC')->get();
         return view('admin.user.index',compact('users'));
     }

     public function userBanned($banned_id){
         User::findOrFail($banned_id)->update(['Isban' => 1]);
         return redirect()->back();
     }
     public function userUnBanned($unbanned_id){
         User::findOrFail($unbanned_id)->update(['Isban' => 0]);
         return redirect()->back();
     }

     public function adminRoleChange($admin_role_change_id){
            User::findOrFail($admin_role_change_id)->update([
                'role_id' => 1,
            ]);
            return back();
     }
     public function userRoleChange($role_change_id){
            User::findOrFail($role_change_id)->update([
                'role_id' => 2,
            ]);
            return back();
     }

     public function userDelete($id){
         $user = User::findOrFail($id);
         if(file_exists($user->image)){
             unlink($user->image);
         }
         $user->delete();
         return redirect()->back()->with('success', 'User Delete Successfully');
     }



}
