<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = "staff";

	protected $fillable = [
		'first_name', 'last_name', 'cellphone', 'whatsapp',
		'email', 'type', 'published', 'role', 'description',
		'facebook', 'twitter', 'linkedin', 'place_id'
	];
}
