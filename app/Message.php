<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = "messages";

	public function replies() {
		return $this->hasMany('App\Message', 'response');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
}
