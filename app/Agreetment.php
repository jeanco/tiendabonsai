<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreetment extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
    'title', 'description', 'website', 'image', 'image_path', 'image_thumb', 'image_thumb_path', 'published',
  ];
}
