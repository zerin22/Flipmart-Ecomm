<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogUserCommentController extends Controller
{
    public function blogCommentStore(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        $blogcomments = new BlogComment;
        $blogcomments->auth_id = Auth::id();
        $blogcomments->blog_id = $request->blog_id;
        $blogcomments->comment = $request->comment;
        $blogcomments->save();
        return redirect()->back()->with('success', 'Comment Success');
    }
}
