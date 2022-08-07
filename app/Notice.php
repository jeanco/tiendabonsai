<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'link'];

	protected $table = 'notices';

}
