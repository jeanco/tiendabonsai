<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceRange extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'start',
    'end',
    'published',
  ];
  
  protected $table = 'prices_range'; 

  protected $dates = ['deleted_at'];
}
