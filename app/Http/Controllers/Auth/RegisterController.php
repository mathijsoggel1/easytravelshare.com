<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   public function authenticated($request,$user)
    {
       Auth::login($user);
       return redirect('/' . $user->name);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        Validator::extend('without_spaces', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
            });
        return Validator::make($data, [
            'name' => 'required|alpha_dash|string|max:255|unique:users',
            /*'trip_name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',*/
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            /*'avatar' => 'required',
            'image' => 'required',*/
            'trip_name' => 'required',
            'trip_start' => 'required|date',
            'trip_end' => 'required|date',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //other data
            'bio' => $data['bio'],
            //'avatar' =>$data['avatar'],
            'trip_name' => $data['trip_name'],
            'trip_start' => $data['trip_start'],
            'trip_end' => $data['trip_end'],
            //'is_private' => '1',
            
        ]);
        return $user;
        Auth::login($user);
        return redirect('/' . $data['name']);
    }
}
