<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategory = SubSubCategory::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        $subcategories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.allsubsubcategory.allsubsubcategory', compact('subsubcategory','categories','subcategories'));
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
            "subcategory_id" => "required",
            "subsubcategory_name_bn" => "required",
            "subsubcategory_name_en" => "required",
        ],[
            "category_id.required" => "Category name is required",
            "subcategory_id.required" => "Sub Category name is required",
            "subsubcategory_name_bn.required" => "SubCategory Bangla name field required",
            "subsubcategory_name_en.required" => "SubCategory English field required",
        ]);

        $checkName = SubSubCategory::where('subcategory_id', $request->subcategory_id)->where('subsubcategory_name_bn', $request->subsubcategory_name_bn)->orWhere('subsubcategory_name_en', $request->subsubcategory_name_en)->exists();
        if($checkName)
        {
            return redirect()->back()->with('fail', 'Sub SubCategory already exists under this subcategory');
        }else{

            $result = SubSubCategory::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),
                'subsubcategory_slug_en'=> strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
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
        $subsubcategories = SubSubCategory::findOrFail($id);
        $categories = Category::orderBy('id', 'DESC')->get();
        $subcategories = SubCategory::where('category_id', $subsubcategories->category_id)->get();
        return view('admin.allsubsubcategory.editsubsubcategory', compact('categories', 'subcategories', 'subsubcategories'));
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
            "subcategory_id" => "required",
            "subsubcategory_name_bn" => "required",
            "subsubcategory_name_en" => "required",
        ],[
            "category_id.required" => "Category name is required",
            "subcategory_id.required" => "Sub Category name is required",
            "subsubcategory_name_bn.required" => "SubCategory Bangla name field required",
            "subsubcategory_name_en.required" => "SubCategory English field required",
        ]);


        $checkName = SubSubCategory::where('subcategory_id', '!=', $request->subcategory_id)
                    ->where('subsubcategory_name_en',  $request->subsubcategory_name_en)
                    ->orWhere('subsubcategory_name_bn', $request->subsubcategory_name_bn)
                    ->exists();

        if($checkName){
            return redirect()->back()->with('fail', 'Sub SubCategory already exists under this subcategory');
        }else{

            $result = SubSubCategory::findOrFail($id)->Update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
                'subsubcategory_name_en' => $request->subsubcategory_name_en,
                'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),
                'subsubcategory_slug_en'=> strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
                'created_at' => Carbon::now(),
            ]);

            if($result){
                return redirect()->route('SubSubCategory.index')->with('success', 'Data update success');
            }else {
                return redirect()->route('SubSubCategory.index')->with('fail', 'Data not update! Please try again');
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
        $result = SubSubCategory::findOrFail($id)->delete();
        if($result){
            return redirect()->back()->with('success', 'Data Delete Success');
        }else {
            return redirect()->back()->with('fail', 'Data Delete Failed! Please try again');
        }
    }

    public function SubSubCategoryAjaxShow(Request $request){
        $result = SubCategory::where('category_id', $request->category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return  json_encode ($result);

    }

}
