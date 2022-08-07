<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model {
	use SoftDeletes;

	protected $fillable = [
		'identity_document',
		'legal_name',
		'first_name',
		'last_name',
		'email',
		'birthday',
		'cel_whatsapp',
		'address',
		'facebook',
		'contact',
		'city_id',
		'country_id',
		'customer_type',
		'user_id',
		'document_type',
	];

	protected $dates = ['deleted_at'];

	public function orders() {
		return $this->hasMany('App\Order');
	}

	public function city() {
		return $this->belongsTo('App\City');
	}

	public function country() {
		return $this->belongsTo('App\Country');
	}

	public function user() {
		return $this->hasOne('App\User', 'customer_id');
	}

	public function companies() {
		return $this->belongsToMany('App\Company', 'company_customer');
	}

	public function getFullnameAttribute() {
		return "{$this->first_name} {$this->last_name}";
	}

	public function alternative_direction() {
		return $this->hasOne('App\AlternativeDirection', 'customer_id');
	}

}
