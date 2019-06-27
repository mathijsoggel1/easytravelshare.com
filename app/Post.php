<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
        'user_id', 'title', 'content','headerimg'
    ];
    public function user()
    {
        return $this->BelongsTo('App\User');
    }
}
