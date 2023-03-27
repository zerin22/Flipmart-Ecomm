<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentReply;
use App\Models\Comment;
use Carbon\Carbon;

class AdminCommentController extends Controller
{
    // show item in comment index page
    public function adminCommentIndex(){
        $comments = Comment::with('product')->orderBy('id', 'desc')->get();
        return view('admin.comment.comment', compact('comments'));
    }
    // show item in approved page
    // public function adminApprovedCommentShow(){
    //     $comments = Comment::with('product')->where('status', 'approved')->orderBy('id', 'desc')->get();
    //     return view('admin.comment.commentApproved', compact('comments'));
    // }

    // approved status
    public function commentsApproved($id){
        Comment::findOrFail($id)->update([
            'status' => 'approved'
        ]);
        return redirect()->back()->with('success', 'Approved Success');
    }
    // pending status
    public function commentsPending($id){
        Comment::findOrFail($id)->update([
            'status' => 'pending',
        ]);
        return redirect()->back()->with('success', 'Pending Success');
    }
    // comment reply
    public function commentsReplay($id){
        $data = Comment::findOrFail($id);
        return view('admin.comment.commentReply', compact('data'));
    }
    // comment reply store
    public function commentsReplayStore(Request $request){
        $request->validate([
            '*' => 'required',
        ]);
        $data = new CommentReply();
        $data->reply_id = $request->reply_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect()->route('admin.comment.comment')->with('success', 'Comment Reply Success');
    }

    //Approved Or Pending Comment Delete Item
    public function commentDelete($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Comment Delete Success');
    }

    // search
    public function productCommentApproveSearch()
    {
        $comments = Comment::with('product')->where('status', 'approved')->orderBy('id', 'desc')->get();
        return view('admin.comment.comment', compact('comments'));
    }

    public function productCommentPendingSearch()
    {
        $comments = Comment::with('product')->where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('admin.comment.comment', compact('comments'));
    }
}
