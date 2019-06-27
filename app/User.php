<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'trip_name', 'trip_start', 'trip_end','image','is_private', 'avatar'
    ];
    protected $dates = ['trip_start', 'trip_end', 'deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function stop()
    {
        return $this->hasMany('App\Stop');
    }
    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
