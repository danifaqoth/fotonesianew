<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = array('user_id','content');

    public function vendor()
	{
		return $this->belongsTo(\App\User::class, 'user_id');
	}
}
