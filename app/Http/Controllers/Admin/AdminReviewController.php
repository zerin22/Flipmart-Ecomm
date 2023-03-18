<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewModel;

class AdminReviewController extends Controller
{
    public function index(){
        $datas = ReviewModel::with('user', 'product')->orderBy('id', 'desc')->get();
        return view('admin.review.review', compact('datas'));
    }

    public function reviewApproved($id){
       ReviewModel::findOrFail($id)->update([
           'status' => 'approved'
       ]);
       return redirect()->back()->with('success', 'Approved Success');
    }

    public function reviewPending($id)
    {
        ReviewModel::findOrFail($id)->update([
            'status' => 'pending',
        ]);
        return redirect()->back()->with('success', 'Pending Success');
    }
}
