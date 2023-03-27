<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\BlogcommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogComments = BlogComment::with('relationWithBlog')->latest()->get();
        return view('admin.blogComment.blogComment-index', compact('blogComments'));
    }

    public function blogCommentsApproved($id)
    {
        BlogComment::findOrFail($id)->update([
            'status' => 'approved',
        ]);
        return redirect()->back()->with('success', 'Approved Success');
    }

    public function blogCommentsPending($id)
    {
        BlogComment::findOrFail($id)->update([
            'status' => 'pending',
        ]);
        return redirect()->back()->with('success', 'Pending Success');
    }

    public function blogCommentReply($id)
    {
        $blogComment = BlogComment::with('relationWithBlog')->findOrFail($id);
        return view('admin.blogComment.blogCommentReply', compact('blogComment'));
    }

    public function blogCommentReplyStore(Request $request)
    {
        $blogReply = new BlogcommentReply;
        $blogReply->blogcomment_id = $request->blogcomment_id;
        $blogReply->auth_id = Auth::id();
        $blogReply->description = $request->description;
        $blogReply->save();
        return redirect()->route('blogcomment.index')->with('success', 'Comment Reply Success');
    }

    public function destroy($id)
    {
        BlogComment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Comment Delete Success');
    }

    //search
    public function blogCommentSearchApprove()
    {
        $blogComments = BlogComment::where('status', 'approved')->latest()->get();
        return view('admin.blogComment.blogComment-index', compact('blogComments'));
    }
    public function blogCommentSearchPending()
    {
        $blogComments = BlogComment::where('status', 'pending')->latest()->get();
        return view('admin.blogComment.blogComment-index', compact('blogComments'));
    }
}
