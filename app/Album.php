<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $fillable = array('user_id','name', 'description', 'cover_image', 'category_id');

	public function vendor()
	{
		return $this->belongsTo(\App\User::class, 'user_id');
	}

	public function photos()
	{
		return $this->hasMany('App\Photo');
	}

	public function category()
	{
		return $this->belongsTo(\App\Category::class);
	}
}
