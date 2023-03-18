<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\State;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::orderBy('id', 'DESC')->get();
        $divisions = Division::orderBy('id', 'DESC')->get();
        $districts = District::orderBy('id', 'DESC')->get();
        return view('admin.state.state', compact('states', 'divisions', 'districts'));
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
            "division_id" => 'required',
            "district_id" => 'required',
            "state_name" => 'required',
        ]);

        $checkStateName = State::where('district_id', $request->district_id)->where('state_name', $request->state_name)->exists();
        if($checkStateName)
        {
            return redirect()->back()->with('fail', 'State already exists under this district');
        }else{
            $data = new State;
            $data->division_id = $request->division_id;
            $data->district_id = $request->district_id;
            $data->state_name = $request->state_name;
            $data->save();
            return redirect()->back()->with('success', 'Data added success');
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
            $state = State::findOrFail($id);
            $divisions = Division::orderBy('id', 'DESC')->get();
            $districts = District::where('division_id', $state->division_id )->get();
            // $districts = District::orderBy('id', 'DESC')->get();
            return view('admin.state.stateEdit', compact('state', 'divisions', 'districts'));
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
            "division_id" => 'required',
            "district_id" => 'required',
            "state_name" => 'required',
        ]);

        $checkStateName = State::where('district_id', $request->district_id)->where('state_name', $request->state_name)->exists();

        if($checkStateName)
        {
            return redirect()->back()->with('fail', 'State already exists under this district');
        }else{
            $data = State::findOrFail($id);
            $data->division_id = $request->division_id;
            $data->district_id = $request->district_id;
            $data->state_name = $request->state_name;
            $data->save();
            return redirect()->route('state.index')->with('success', 'State Update success');
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
        State::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'State Delete Success');
    }

    public function distinctAjaxLoad($division_id){
        $result = District::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return $result;
    }

    public function stateActive($id){
        State::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Status Inactive');
    }

    public function stateInActive($id){
        State::findOrFail($id)->update(['status' => 1,]);
        return redirect()->back()->with('success', 'Status Active');
    }


}
