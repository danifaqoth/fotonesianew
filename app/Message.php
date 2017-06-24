<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array('subject', 'content');

		// public function photos()
		// {
		// 	return $this->hasMany('App\Photo');
		// }
}
