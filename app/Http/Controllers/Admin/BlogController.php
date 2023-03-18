<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.blog_index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::latest()->get();
        return view('admin.blog.create_blog', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image_settings($image)
    {
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $location = 'backend/images/blog/';
        $final_image = $location.$name_gen;
        Image::make($image)->save($final_image);
        return $final_image;
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'feature_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'description' => 'required',
        ]);

        $thumbnail_image = $request->file('thumbnail_image');
        $final_thumbnail_image = $this->image_settings($thumbnail_image );
        Image::make($thumbnail_image)->resize(390, 215)->save($final_thumbnail_image);

        $feature_image = $request->file('feature_image');
        $final_feature_image = $this->image_settings($feature_image );
        Image::make($feature_image)->save($final_feature_image);

        $blog = new Blog;
        $blog->auth_id = Auth::id();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->thumbnail_image = $final_thumbnail_image;
        $blog->feature_image = $final_feature_image;
        $blog->save();
        return redirect()-> back()->with('success', 'Blog added success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.view_blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit_blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        if($request->thumbnail_image)
        {
            unlink($blog->thumbnail_image);
            $thumbnail_image = $request->file('thumbnail_image');
            $final_thumbnail_image = $this->image_settings($thumbnail_image );
            Image::make($thumbnail_image)->resize(390, 215)->save($final_thumbnail_image);
            $blog->thumbnail_image = $final_thumbnail_image;
        }

        if($request->feature_image)
        {
            unlink($blog->feature_image);
            $feature_image = $request->file('feature_image');
            $final_feature_image = $this->image_settings($feature_image );
            Image::make($feature_image)->save($final_feature_image);
            $blog->feature_image = $final_feature_image;
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        // unlink($blog->thumbnail_image);
        unlink($blog->feature_image);
        $blog->delete();
        return redirect()-> back()->with('success', 'Blog deleted success');
    }
}
