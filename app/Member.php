<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function hargas()
    {
        return $this->hasMany(\App\Harga::class);
    }
}
