<?php

namespace App\Http\Controllers;

use App\User;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('welcome')->with('users', $users);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $user = User::where('name', $name)
            ->orWhere('id', $name)
            ->firstOrFail();
        //$user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

         $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'bio' => 'required',
            'avatar' => '',
            'trip_name' => 'required',
            'trip_start' => 'required|date',
            'trip_end' => 'required|date',

        ]);
        
        $avatar = $request->file('avatar');
         //dd($avatar); 
        if(!empty($avatar)){
            $avatar->move('images', $avatar->getClientOriginalName());
            $user->avatar = $request->avatar->getClientOriginalName();
        }
        else{
            $avatar = 'empty';
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->trip_name = $request->trip_name;
        $user->trip_start = $request->trip_start;
        $user->trip_end = $request->trip_end;
          
        $user->save();
        $request->session()->flash('message', 'Successfully modified the user!');
        return redirect('/'.$user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
