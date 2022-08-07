<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cost extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'country_id', 'cost', 'transport_company_id', 'logistic_id'];

	protected $table = 'costs';

	public function logistic() {
		return $this->belongsTo('App\Logistic', 'logistic_id');
	}

	public function districts() {
		return $this->belongsToMany('App\District', 'cost_district', 'cost_id', 'district_id');
	}

	public function subcategories() {
		return $this->belongsToMany('App\Subcategory', 'cost_subcategory', 'cost_id', 'subcategory_id');
	}

}
