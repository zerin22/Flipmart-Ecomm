<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.coupon.creatCoupon');
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
                "coupon_name" => 'required',
                "coupon_discount" => 'required',
                "coupon_validity" => 'required',
         ]);
         $data = new Coupon;
         $data->coupon_name = strtoupper($request->coupon_name);
         $data->coupon_discount = $request->coupon_discount;
         $data->coupon_validity = $request->coupon_validity;
        $data->save();
        return redirect()->back()->with('success', 'Coupon Create Success');
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
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon.couponEdit', compact('coupons'));

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
            "coupon_name" => 'required',
            "coupon_discount" => 'required',
            "coupon_validity" => 'required',
        ]);
        $data = Coupon::findOrFail($id);
        $data->coupon_name = strtoupper($request->coupon_name);
        $data->coupon_discount = $request->coupon_discount;
        $data->coupon_validity = $request->coupon_validity;
        $data->save();
        return redirect()->route('coupon.index')->with('success', 'Coupon Create Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Coupon Delete Success');
    }

    public function couponActive($id){
        Coupon::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Coupon Invalid');
    }

    public function couponInActive($id){
        Coupon::findOrFail($id)->update(['status' => 1,]);
        return redirect()->back()->with('success', 'Coupon valid');
    }



}
