<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $adminBio = AdminBio::all();
        // return view('admin.profile', compact('adminBio'));
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
        $adminBio = new AdminBio;
        $adminBio->auth_id = Auth::id();
        $adminBio->company_name = $request->company_name;
        $adminBio->bio = $request->bio;
        $adminBio->option = json_encode($request->option) ;
        $adminBio->save();

        return redirect()->route('admin.profile')->with('success', 'Bio addedd success');
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
        $adminBio = AdminBio::findOrFail($id);
        $adminBio->company_name = $request->company_name;
        $adminBio->bio = $request->bio;
        $adminBio->option = json_encode($request->option) ;
        $adminBio->save();
        return redirect()->route('admin.profile')->with('success', 'Bio Update Success');
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
