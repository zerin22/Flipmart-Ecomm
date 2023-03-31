<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountBannerTwo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DiscountBannerTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = DiscountBannerTwo::all();
        return view('admin.discountBanner_two.indexDiscountBannerTwo', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discountBanner_two.createDiscountBannerTwo');
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
         ]);

        $image = $request->file('image');
        $final_image  = $this->image_settings($image);
        $disBannerImage = new DiscountBannerTwo;
        $disBannerImage->image = $final_image ;
        $disBannerImage->save();

        return redirect()->route('bannerTwo.index')->with('success', 'Image added successfully');
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
        $banners = DiscountBannerTwo::findOrFail($id);
        return view('admin.discountBanner_two.editDiscountBannerTwo', compact('banners'));
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
        if($request->file('image'))
        {
            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
             ]);

            $banners = DiscountBannerTwo::findOrFail($id);
            $image = $request->file('image');
            unlink( $banners->image);
            $final_image = $this->image_settings($image);
            $banners->image = $final_image;
            $banners->save();
            return redirect()->route('bannerTwo.index')->with('success', 'Image update successfully');

        }else{
            return redirect()->back()->with('fail', 'Nothing to update');
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
        $banners = DiscountBannerTwo::findOrFail($id);
        unlink($banners->image);
        $banners->delete();
        return redirect()->route('bannerTwo.index')->with('success', 'Data delete successfully');
    }

     //status Check
     public function pageBannerStatusOn(Request $request)
     {
         $banner = DiscountBannerTwo::first();
         $banner->update([
             'status' => $request->status
         ]);
         return response()->json();
     }
}
