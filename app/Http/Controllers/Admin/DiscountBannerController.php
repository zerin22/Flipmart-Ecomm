<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountBanner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DiscountBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = DiscountBanner::all();
        return view('admin.discountBanner.indexDiscountBanner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discountBanner.createDiscountBanner');
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
        $location = 'backend/images/discountbanner/';
        $final_image = $location.$name_gen;
        Image::make($image)->resize(848, 201)->save($final_image);
        return $final_image;
    }


    public function store(Request $request)
    {
        $request->validate([
            'image_left' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
         ]);

        $image_left = $request->file('image_left');
        $final_image_left  = $this->image_settings($image_left);
        $disBannerImage = new DiscountBanner;
        $disBannerImage->image_left = $final_image_left ;
        $disBannerImage->save();

        return redirect()->route('banner.index')->with('success', 'Data added successfully');


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
        $banners = DiscountBanner::findOrFail($id);
        return view('admin.discountBanner.editDiscountBanner', compact('banners'));
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
            'image_left' => 'image|mimes:jpg,png,jpeg,gif,svg',
         ]);
        $banners = DiscountBanner::findOrFail($id);

        $request->file('image_left');
        unlink( $banners->image_left);
        $image_left = $request->file('image_left');
        $final_image_left  = $this->image_settings($image_left);
        $banners->image_left = $final_image_left;
        $banners->save();
        return redirect()->route('banner.index')->with('success', 'Data update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $banners = DiscountBanner::findOrFail($id);
        // unlink($banners->image_left);
        // $banners->delete();
        // return redirect()->route('banner.index')->with('success', 'Data delete successfully');
    }
}
