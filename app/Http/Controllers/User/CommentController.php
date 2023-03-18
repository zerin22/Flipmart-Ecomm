<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommentController extends Controller
{

    public function commentStore(Request $request){
        $request->validate([
            '*' => 'required',
        ]);
        $data = new Comment();
        $data->product_single_id = $request->product_single_id;
        $data->name = $request->auth_name;
        $data->description = $request->description;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect()->back()->with('success', 'Comment Success');
    }



}
