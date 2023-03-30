<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSocialLink;
use App\Models\DiscountBanner;
use App\Models\DiscountBannerTwo;
use App\Models\PageBanner;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialLinks = AdminSocialLink::all();
        $pagebanner = PageBanner::first();
        $banner = DiscountBanner::first();
        $bannerTwo = DiscountBannerTwo::first();
        return view('admin.social_links.social-links-index', compact('socialLinks', 'pagebanner', 'banner', 'bannerTwo'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_links.social-links-create');
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
            'name' => 'required',
            'social_link' => 'required|url',
            'class_name' => 'required',
        ]);

        $socialLinks = new AdminSocialLink;
        $socialLinks->name = $request->name;
        $socialLinks->social_link = $request->social_link;
        $socialLinks->class_name = $request->class_name;
        $socialLinks->save();

        return redirect()->route('social-links.index')->with('success', 'Social Links add success');
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
        $socialLink = AdminSocialLink::findOrFail($id);
        return view('admin.social_links.social-links-edit', compact('socialLink'));
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
            'name' => 'required',
            'social_link' => 'required|url',
            'class_name' => 'required',
        ]);

        $socialLinks = AdminSocialLink::findOrFail($id);
        $socialLinks->name = $request->name;
        $socialLinks->social_link = $request->social_link;
        $socialLinks->class_name = $request->class_name;
        $socialLinks->save();

        return redirect()->back()->with('success', 'Social Links Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminSocialLink::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Social Links delete success');
    }
}
