<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermeta extends Model
{
    protected $fillable = [
        'key','value','user_id',
    ]; 
}
