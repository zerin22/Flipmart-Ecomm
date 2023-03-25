<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class StockManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::latest()->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $subSubCategories = SubSubCategory::all();
        return view('admin.stockManagement.index', compact('items','categories','subCategories','subSubCategories'));
    }

    public function stockCheckBysubCategory(Request $request)
    {
        // return $request;
        // $items = Product::where('subcategory_id', $request->subcategory_id)->get();
        // $items = Product::where('subsubcategory_id', $request->subsubcategory_id)->get();
        $items = Product::where(['category_id' => $request->category_id, 'subcategory_id' => $request->subcategory_id, 'subsubcategory_id' => $request->subsubcategory_id])->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $subSubCategories = SubSubCategory::all();
        return view('admin.stockManagement.index', compact('items', 'categories', 'subCategories', 'subSubCategories'));
    }

    public function SubCategoryAjaxShow(Request $request){
        $result = SubCategory::where('category_id', $request->category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return  json_encode ($result);
    }

    public function SubSubCategoryAjaxShow(Request $request){
        $result = SubSubCategory::where('subcategory_id', $request->subCategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return  json_encode ($result);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
