<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
  use SoftDeletes;

  protected $table = 'projects';

  protected $dates = ['deleted_at'];
  
  /*public function country()
  {
    return $this->hasMany('App\Country');
  }*/
}