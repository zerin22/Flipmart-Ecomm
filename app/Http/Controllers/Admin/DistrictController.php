<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use Illuminate\Contracts\Validation\Rule;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('id', 'DESC')->get();
        return view('admin.district.district', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::orderBy('id', 'DESC')->get();
       return view('admin.district.createDistrict', compact('divisions'));
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
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

       $checkDistrictName =  District::where('division_id', $request->division_id)->where('district_name', $request->district_name)->exists();

        if($checkDistrictName){
            return redirect()->back()->with('fail', 'District already exists under this division');
        }else{
            $data = new District;
            $data->division_id = $request->division_id;
            $data->district_name = $request->district_name;
            $data->save();
            return redirect()->back()->with('success', 'District Add Success');
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
         $district = District::findOrFail($id);
         $divisions = Division::orderBy('id', 'DESC')->get();
         return view('admin.district.districtEdit', compact('district', 'divisions'));

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
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        $data = District::findOrFail($id);

        $checkDistrictName =  District::where('division_id', $request->division_id)->where('district_name', $request->district_name)->exists();

        if($checkDistrictName){
            return redirect()->back()->with('fail', 'District already exists in this division');
        }else{

        $data->division_id = $request->division_id;
        $data->district_name = $request->district_name;
        $data->save();
        return redirect()->route('district.index')->with('success', 'District Update Success');
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
        $stateCounts = State::where('district_id', $id)->count();
        if($stateCounts > 0){
            return redirect()->back()->with('fail', "State available ! you can't delete");
        }else {
            District::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'District Delete Success');
        }

    }


    public function districtActive($id){
        District::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'State Inactive');
    }

    public function districtInActive($id){
        District::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'State Active');
    }







}
