<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model {
	use SoftDeletes;

	protected $fillable = ['name', 'description'];

	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongsTo('\App\User', 'user_id');
	}

	public function images() {
		return $this->hasMany('App\Content', 'model_id')->whereModelType(5)
			->whereType(1);
	}

}
