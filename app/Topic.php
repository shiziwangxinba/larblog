<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    public function comments()
    {
    	return $this->hasMany('App\Reply');
    }
}
