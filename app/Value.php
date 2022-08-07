<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Value extends Model
{
	use SoftDeletes;
  
	protected $table = 'values';

	protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'description'];

}
