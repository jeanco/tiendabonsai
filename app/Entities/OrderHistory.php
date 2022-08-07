<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHistory extends Model {
	use SoftDeletes;

	protected $table = 'order_history';

	protected $fillable = [
		'date', 'ordered_products', 'total',
	];

	protected $dates = ['deleted_at'];

	public function orders() {
		return $this->hasMany('\App\Order');
	}

	public function account() {
		return $this->belongsTo('App\Account');
	}

	public function customer() {
		return $this->belongsTo('App\Customer');
	}

	public function currency() {
		return $this->belongsTo('App\Currency');
	}

}
