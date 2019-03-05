<?php

namespace App\Http\Controllers;

use App\Phonebook;
use App\Phonegroup;
use App\User;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public function __construct (){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (auth()->user()->username="smsadmin") {
            $contacts = Phonebook::all();
            $groups = Phonegroup::all();
            return view('posts.phonebook',['contacts'=>$contacts,'groups'=>$groups]);
        }else{
            $contacts = Phonebook::where('username',auth()->user()->username)->get();
            $groups = Phonegroup::where('username',auth()->user()->username)->get();
            return view('posts.phonebook',['contacts'=>$contacts,'groups'=>$groups]);
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Phonebook::where('username',auth()->user()->username)->paginate(5);
        return view('posts.phonebook',['contacts'=>$contacts]);
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
            'phone_number' => 'required|min:10'            
        ]);
       
        Phonebook::create([
            'contact_name'=>$request->contact_name,
            'phone_number'=>$request->phone_number,
            'username'=>auth()->user()->username,
            'phonegroup'=>$request->phonegroup
        ]);
        session()->flash('message','The Contact:'.$request->contact_name.' has been saved successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        $contacts = Phonebook::where('username',auth()->user()->username)->paginate(5);
        return view('posts.phonebook',['contacts'=>$contacts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        $contacts = Phonebook::where('username',auth()->user()->username)->paginate(5);
        $groups = Phonegroup::where('username',auth()->user()->username)->get();
        return view('posts.phonebook_edit', compact('phonebook'), ['contacts'=>$contacts, 'groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phonebook $phonebook)
    {
        $this->validate($request,[
            'phone_number' => 'required|min:10'
        ]);
        $phonebook->contact_name=$request->contact_name;
        $phonebook->phone_number=$request->phone_number;
        $phonebook->username=auth()->user()->username;
        $phonebook->phonegroup=$request->phonegroup;

        session()->flash('message','The Contact: '.$request->contact_name.' has been updated successfully!');
        $phonebook->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        $phonebook->delete();
        session()->flash('message','The Contact has been deleted successfully!');
        return redirect()->back();
    }
}
