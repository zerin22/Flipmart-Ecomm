<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryItems = Category::latest()->get();
        return view('admin.category.all-category', compact('categoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name_bn' => 'required|unique:categories',
            'category_name_en' => 'required|unique:categories',
            'category_icon' => 'required',
        ]);

        $images = $request->file('category_icon');
        $img_ext = strtolower($images->getClientOriginalExtension());
        $hex_name = hexdec(uniqid());
        $img_name = $hex_name . '.' . $img_ext;
        $location = 'backend/images/category/';
        $last_image = $location. $img_name;
        Image::make($images)->resize(30, 30)->save($last_image);
        $result = Category::create([
            'category_name_bn' => $request->category_name_bn,
            'category_name_en' => $request->category_name_en,
            'category_slug_bn' => str_replace(' ', '-',  $request->category_name_bn ),
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_icon' => $last_image,
            'created_at' => Carbon::now(),
        ]);
        if($result){
            return redirect()->back()->with('success', 'Data added success');
        }else {
            return redirect()->back()->with('fail', 'Data not added! Please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryDatas = Category::findOrFail($id);
        return view('admin.category.categoryEdit', compact('categoryDatas'));
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
        $request->validate([
            'category_name_bn' => 'required',
            'category_name_en' => 'required',
        ]);

        $category = Category::findOrFail($id);
        if($request->hasFile('category_icon'))
        {
            unlink($category->category_icon);
            $images = $request->file('category_icon');
            $img_ext = strtolower($images->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'backend/images/category/';
            $last_image = $location. $img_name;
            Image::make($images)->resize(30, 30)->save($last_image);
            $category->category_icon = $last_image;
        }

        $category->category_name_bn = $request->category_name_bn;
        $category->category_name_en = $request->category_name_en;
        $category->category_slug_bn = str_replace(' ', '-',  $request->category_name_bn );
        $category->category_slug_en = strtolower(str_replace(' ', '-', $request->category_name_en));
        $category->save();

        return redirect()->route('category.index')->with('success', 'Data Update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = SubCategory::where('category_id', $id)->count();
        if($count > 0){
            return redirect()->back()->with('fail', "District available ! you can't delete");
        }
        else {
            Category::findOrFail($id)->forceDelete();
            return redirect()->back()->with('success', 'Data Delete success');
        }
    }
}
