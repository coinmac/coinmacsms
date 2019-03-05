<?php

namespace App\Http\Controllers;

use App\Phonegroup;
use Illuminate\Http\Request;

class PhonegroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'groupname' => 'required|min:3'            
        ]);
       
        Phonegroup::create([
            'groupname'=>$request->groupname,
            'username'=>auth()->user()->username
        ]);
        session()->flash('message','The New Group: '.$request->groupname.' has been saved successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonegroup  $phonegroup
     * @return \Illuminate\Http\Response
     */
    public function show(Phonegroup $phonegroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonegroup  $phonegroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonegroup $phonegroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonegroup  $phonegroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phonegroup $phonegroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonegroup  $phonegroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonegroup $phonegroup)
    {
        //
    }
}
