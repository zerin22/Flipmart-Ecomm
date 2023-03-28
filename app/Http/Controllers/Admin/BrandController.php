<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Brand::latest()->get();
        return view('admin.brand.allBrand', compact('items'));
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
    public function image_setting($image)
    {
        $img_ext = strtolower($image->getClientOriginalExtension());
        $hex_name = hexdec(uniqid());
        $img_name = $hex_name . '.' . $img_ext;
        $location = 'backend/images/brand/';
        $last_image = $location. $img_name;
        Image::make($image)->resize(116, 110)->save($last_image);
        return $last_image;
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name_bn' => 'required',
            'brand_name_en' => 'required',
            'brand_image' => 'required',
            'brand_image.*' => 'mimes:jpeg,jpg,png'
        ], [
            'brand_name_bn.required' => 'Enter Bangla Brand Name',
            'brand_name_en.required' => 'Enter English Brand Name',
            'brand_image.required' => 'Image Field is Required',
        ]);
        $images = $request->file('brand_image');
        $last_image = $this->image_setting($images);
        $result = Brand::insert([
            'brand_name_bn' => $request->brand_name_bn,
            'brand_name_en' => $request->brand_name_en,
            'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            'brand_slug_en' =>  strtolower(str_replace(' ', '-',$request->brand_name_en )),
            'brand_image' => $last_image,
            'created_at'=> Carbon::now(),
        ]);
        if($result){
            return redirect()->route('brands.index')->with('success', 'Data added success');
        }else {
            return redirect()->route('brands.index')->with('fail', 'Data not added! Please try again');
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
        $datas = Brand::findOrFail($id);
        return view('admin.brand.brandedit', compact('datas'));
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
       $brand = Brand::findOrFail($id);
        $request->validate([
            'brand_name_bn' => 'required',
            'brand_name_en' => 'required',
        ], [
            'brand_name_bn.required' => 'Enter Bangla Brand Name',
            'brand_name_en.required' => 'Enter English Brand Name',
        ]);

        $images = $request->file('brand_image');
        if($images != "")
        {
            $img = Brand::findOrFail($id);
            $old_img = $img->brand_image;
            if(file_exists($old_img)){
                unlink($old_img);
                $last_image = $this->image_setting($images);
                $brand->brand_image = $last_image;
            }
        }
            $brand->brand_name_bn = $request->brand_name_bn;
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_slug_bn = str_replace(' ', '-', $request->brand_name_bn);
            $brand->brand_slug_en = strtolower(str_replace(' ', '-', $request->brand_name_en));
            $brand->save();
            return redirect()->route('brands.index')->with('success', 'Brand Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Brand::findOrFail($id)->delete();
        $brand = Brand::findOrFail($id);
        unlink($brand->brand_image);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Data Delete success');
    }

}
