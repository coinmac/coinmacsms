<?php

namespace App\Http\Controllers;

use App\Topup;
use App\User;
use Illuminate\Http\Request;

class TopupController extends Controller
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
        if (auth()->user()->username=="smsadmin") {
            $topups = Topup::all();
            return view('posts.topup',['topups'=>$topups]);
        }else {
            $topups = Topup::where('username',auth()->user()->username)->get();
            return view('posts.topup',['topups'=>$topups]);    
        }

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
            'amount' => 'required|min:2',
            'namepaid' => 'required|max:40',
            'paycode' => 'required|min:4'            
        ]);
       $units = $request->amount/2.5;
        Topup::create([
            'units'=>$units,
            'amount'=>$request->amount,
            'username'=>auth()->user()->username,
            'particulars'=>$request->namepaid."/".$request->bank."/".$request->paycode."/".$request->datepaid,
            'confirmation'=>'Not Confirmed'
        ]);
        session()->flash('message','Your payment has been recorded and will be confirmed shortly. You can also give us a call to hasten the process. Thank you!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topup  $topup
     * @return \Illuminate\Http\Response
     */
    public function show(Topup $topup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topup  $topup
     * @return \Illuminate\Http\Response
     */
    public function edit(Topup $topup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topup  $topup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topup $topup)
    {
        $userunit = User::where('username',$request->username)->first();
       
        $topup->confirmation='Confirmed';
        // Research on Increment
        $userunit->units=$userunit->units+$request->units;
        
        session()->flash('message','You have confirmed the credit topup purchased by : '.$request->username);
        $topup->save();
        $userunit->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topup  $topup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topup $topup)
    {
        //
    }
}
