<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sliders;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = sliders::latest()->get();
        return view('admin.slider.slider-page', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add-new-slider');
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
           'sliderImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $images = $request->file('sliderImage');
        $img_ext = strtolower($images->getClientOriginalExtension());
        $hex_name = hexdec(uniqid());
        $img_name = $hex_name . '.' . $img_ext;
        $location = 'backend/images/sliders/';
        $last_image = $location. $img_name;
        Image::make($images)->resize(870, 370)->save($last_image);
        $data = new sliders();
        $data->subTitle_en = $request->subTitle_en;
        $data->subTitle_bn = $request->subTitle_bn;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->sliderImage = $last_image;
        $data->save();
        return redirect()->back()->with('success', 'Data added successfully');

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

        $datas = sliders::findOrFail($id);
        return view('admin.slider.slider-edit', compact('datas'));
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
            'sliderImage' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $images = $request->file('sliderImage');
        if($images != ""){
            $old_img = sliders::findOrFail($id);
            $existImg = $old_img->sliderImage;
            if(file_exists($existImg)){
                unlink($existImg);
            }
            $img_ext = strtolower($images->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'backend/images/sliders/';
            $last_image = $location. $img_name;
            Image::make($images)->resize(870, 370)->save($last_image);
            sliders::findOrFail($id)->update([
                 "subTitle_en" => $request->subTitle_en,
                 "subTitle_bn" => $request->subTitle_bn,
                 "title_en" => $request->title_en,
                 "title_bn" => $request->title_bn,
                 "description_en" => $request->description_en,
                 "description_bn" => $request->description_bn,
                 "sliderImage" => $last_image,
                 "updated_at" => Carbon::now(),
            ]);
            return redirect()->route('sliders.index')->with('success', 'Data Updated successfully');
        }else {
            sliders::findOrFail($id)->update([
                "subTitle_en" => $request->subTitle_en,
                "subTitle_bn" => $request->subTitle_bn,
                "title_en" => $request->title_en,
                "title_bn" => $request->title_bn,
                "description_en" => $request->description_en,
                "description_bn" => $request->description_bn,
                "updated_at" => Carbon::now(),
            ]);
            return redirect()->route('sliders.index')->with('success', 'Data Updated successfully');
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
        $img = sliders::findOrFail($id);
        $existImg = $img->sliderImage;
        if(file_exists($existImg)){
           unlink($existImg);
        }
        sliders::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }

    // status
    public function inactive($id){
        sliders::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Product Inactive');
    }
    public function active($id){
        sliders::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Product active');
    }
}
