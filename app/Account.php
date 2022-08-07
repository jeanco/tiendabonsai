<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model {
	use SoftDeletes;

	protected $table = 'accounts';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'payment_way_id',
		'payment_entity_id',
		'description',
		'instructions',
		'owner_name',
		'name',
		'owner_document',
	];

	public function payment_entity() {
		return $this->belongsTo('App\PaymentEntity', 'payment_entity_id');
	}

	public function payment_way() {
		return $this->belongsTo('App\PaymentWay');
	}

	public function orders() {
		return $this->hasMany('App\Order');
	}

	public function user() {
		return $this->belongsTo('\App\User', 'user_id');
	}

}
