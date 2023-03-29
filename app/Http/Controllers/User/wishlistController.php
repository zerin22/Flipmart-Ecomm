<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class wishlistController extends Controller
{

    //================ view wishlist page =====================

    public function wishlistPageView(){
        return view('wishlist');

    }

    //============================== get wishlist =====================

    function getWishListData(){

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
         return response()->json($wishlist);
    }


    // ============= add wishlist ==========================
    public function addWishlist(Request $request, $product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => ' <h4>Wishlist Product Added Successfully</h4>']);
            }else {
                return response()->json(['success' => ' <h4>Wishlist Already Exists</h4>']);
            }
        }else {
            return response()->json(['error' => ' <h4>At First Login Your Account</h4>']);
        }
    }
    //================ remove wishlist controller ========================

    public function removeWishlistData($id){
        $result = Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json($result);
    }

}
