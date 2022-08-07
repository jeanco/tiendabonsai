<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'subtitle', 'content', 'link_text', 'link', 'category_id'];

	protected $table = 'campaigns';
}
