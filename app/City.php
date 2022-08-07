<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
  use SoftDeletes;

  protected $table = 'cities';

  protected $dates = ['deleted_at'];
  
  public function country()
  {
    return $this->hasMany('App\Country');
  }
}
