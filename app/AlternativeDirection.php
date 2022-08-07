<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlternativeDirection extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['identity_document', 'first_name', 'last_name', 'address','reference', 'city_id', 'postal_code', 'country_id', 'phone', 'province_id', 'district_id', 'additional_reference'];

	protected $table = 'alternative_directions';

	public function city() {
		return $this->belongsTo('App\City', 'city_id');
	}

	public function country() {
		return $this->belongsTo('App\Country', 'country_id');
	}

	public function province() {
		return $this->belongsTo('App\Province', 'province_id');
	}

	public function district() {
		return $this->belongsTo('App\District', 'district_id');
	}

}
