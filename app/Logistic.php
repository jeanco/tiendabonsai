<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['company_id', 'place_id', 'name', 'shipping_policies', 'status'];

	protected $table = 'logistics';

	public function costs() {
		return $this->hasMany('App\Cost', 'logistic_id');
	}
}
