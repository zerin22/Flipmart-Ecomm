<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\District;
use http\Env\Url;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('id', 'DESC')->get();
        return view('admin.division.division', compact('divisions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.division.createDivision');
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
            'division_name' => 'required|unique:divisions',
         ]);
         $data = new Division;
         $data->division_name = $request->division_name;
         $data->save();
         return redirect()->back()->with('success', 'Division Add Success');
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
        $divisions = Division::findOrFail($id);
        return view('admin.division.divisionEdit', compact('divisions'));
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
            'division_name' => 'required|unique:divisions,division_name,'.$id,
        ]);
        $data = Division::findOrFail($id);
        $data->division_name = $request->division_name;
        $data->save();
        return redirect()->route('division.index')->with('success', 'Division Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = District::where('division_id', $id)->count();
        if($count > 0){
            return redirect()->back()->with('fail', "District available ! you can't delete");
        }
        else {
            Division::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Data Delete Success');
        }

    }

    public function divisionActive($id){
        Division::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Status Inactive');
    }

    public function divisionInActive($id){
        Division::findOrFail($id)->update(['status' => 1,]);
        return redirect()->back()->with('success', 'Status Active');
    }

}
