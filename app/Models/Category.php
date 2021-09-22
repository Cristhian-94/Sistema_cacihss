<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Category extends Model
{
  public function tickets(){
      return $this->hasMany('App\Models\Ticket');

  }
}
