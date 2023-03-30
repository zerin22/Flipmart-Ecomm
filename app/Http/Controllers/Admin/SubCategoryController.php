<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::latest()->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.subcategory.allsubcategory', compact('subcategory','categories'));
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
            "category_id" => "required",
            "subcategory_name_bn" => "required",
            "subcategory_name_en" => "required",
        ],[
            "category_id.required" => "Category name is required",
            "subcategory_name_bn.required" => "SubCategory Bangla name field required",
            "subcategory_name_en.required" => "SubCategory English field required",
        ]);

        $checkName = SubCategory::where('category_id', $request->category_id)->where('subcategory_name_bn',$request->subcategory_name_bn)->orWhere( 'subcategory_name_en', $request->subcategory_name_en)->exists();

        if($checkName)
        {
            return redirect()->back()->with('fail', 'Subcategory already exists!');
        }else{
            $result = SubCategory::create([
                'category_id' => $request->category_id,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
                'subcategory_slug_en'=> strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
                'created_at' => Carbon::now(),
            ]);
            if($result){
                return redirect()->back()->with('success', 'Data added success');
            }else {
                return redirect()->back()->with('fail', 'Data not added! Please try again');
            }
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
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.subcategory.subcategoryEdit', compact('subcategory', 'categories' ));
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
            "category_id" => "required",
            "subcategory_name_bn" => "required",
            "subcategory_name_en" => "required",
        ],[
            "category_id.required" => "Category name is required",
            "subcategory_name_bn.required" => "SubCategory Bangla name field required",
            "subcategory_name_en.required" => "SubCategory English field required",
        ]);

        $checkName = SubCategory::where('category_id', '!=' , $request->category_id)
                    ->where('subcategory_name_bn',$request->subcategory_name_bn)
                    ->orWhere( 'subcategory_name_en', $request->subcategory_name_en)
                    ->exists();

        if($checkName)
        {
            return redirect()->back()->with('fail', 'Subcategory already exists!');
        }else{
            $result = SubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'subcategory_name_bn' => $request->subcategory_name_bn,
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
                'subcategory_slug_en'=> strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
                'created_at' => Carbon::now(),
            ]);
            if($result){
                return redirect()->route('subCategory.index')->with('success', 'Data update success');
            }else {
                return redirect()->route('subCategory.index')->with('fail', 'Data not update! Please try again');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = SubSubCategory::where('subcategory_id', $id)->count();
        if($count > 0){
            return redirect()->back()->with('fail', "District available ! you can't delete");
        }
        else {
            SubCategory::findOrFail($id)->forceDelete();
            return redirect()->back()->with('success', 'Data Delete Successfully');
        }
    }
}
