<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'cel', 'phone', 'address', 'email', 'schedule',
		'geolocalization', 'company_id', 'country_id', 'type'];

	protected $table = 'places';

	public function prices() {
		return $this->hasMany('App\Price', 'place_id');
	}
}
