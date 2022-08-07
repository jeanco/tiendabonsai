<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model {
	use SoftDeletes;

	protected $table = 'provinces';

	protected $dates = ['deleted_at'];

	public function city() {
		return $this->belongsTo('App\City', 'city_id');
	}

}
