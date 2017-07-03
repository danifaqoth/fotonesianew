<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class harga extends Model
{
    protected $fillable = array('user_id','nama_paket', 'harga_paket', 'deskripsi_paket');

    public function vendor()
	{
		return $this->belongsTo(\App\User::class, 'user_id');
	}
}
