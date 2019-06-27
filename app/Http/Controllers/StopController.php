<?php

namespace App\Http\Controllers;

use App\Stop;
use App\User;
use Illuminate\Http\Request;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stops.create');
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
            'name' => 'required|min:2',
            'countrycode' => 'required|min:2',
            'arrival' => 'required|date',
            'user_id' => 'required',
        ]);
        $user = User::find($request->user_id);


         $stop = Stop::create(['user_id' => $request->user_id, 'name' => $request->name, 'countrycode'=> $request->countrycode, 'arrival'=> $request->arrival]);
        return redirect('/'.$user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function show(Stop $stop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function edit(Stop $stop)
    {
        return view('stops.edit')->with('stop', $stop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stop $stop)
    {
        $request->validate([
           'name' => 'required|min:2',
            'countrycode' => 'required|min:2',
            'arrival' => 'required|date',
            'user_id' => 'required',
        ]);
        $user = User::find($request->user_id);
        
        $stop->name = $request->name;
        $stop->countrycode = $request->countrycode;
        $stop->arrival = $request->arrival;
        $stop->save();
        $request->session()->flash('message', 'Successfully modified the stop!');
        return redirect('/'.$user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stop  $stop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stop = Stop::find($id);
        $stop->delete();
        $user = User::find($stop->user_id);
        // redirect
        return redirect('/'.$user->name);
    }
}
