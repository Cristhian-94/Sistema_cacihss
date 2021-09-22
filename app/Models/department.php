<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class department extends Model
{
    public function user(){
        return $this->hasMany('App\Models\User');

    }
}
