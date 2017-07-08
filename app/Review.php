<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = array('vendor_id','member_id','content');

    public function member()
    {
    	return $this->belongsTo(User::class, 'member_id');
    }

 //    public function vendor()
	// {
	// 	return $this->belongsTo(\App\User::class, 'user_id');
	// }
}
