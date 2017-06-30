<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array('member_id', 'vendor_id', 'subject', 'content');

    public function member()
    {
    	return $this->belongsTo(User::class, 'member_id');
    }
}
