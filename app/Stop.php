<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
	 protected $fillable = [
        'user_id', 'name', 'countrycode','arrival'
    ];
    // Carbon instance fields
	protected $dates = ['arrival', 'updated_at', 'deleted_at'];
    public function user()
    {
        return $this->BelongsTo('App\User');
    }
}
