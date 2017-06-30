<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','avatar', 'email', 'password', 'role', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function metas()
    {
        return $this->hasMany(Usermeta::class);
    }

    public function albums()
    {
        return $this->hasMany(\App\Album::class);
    }

    public function likes()
    {
        return $this->hasMany('App/Like');
    }
}
