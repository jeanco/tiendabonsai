<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model {
	use SoftDeletes;

	protected $table = 'districts';

	protected $dates = ['deleted_at'];

	public function province() {
		return $this->belongsTo('App\Province', 'province_id');
	}

	public function costs() {
		return $this->belongsToMany('App\Cost', 'cost_district', 'district_id', 'cost_id');
	}
}
