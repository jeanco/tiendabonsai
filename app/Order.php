<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
	use SoftDeletes;

	public function customer() {
		return $this->belongsTo('App\Customer');
	}

	public function products() {
		return $this->belongsToMany('App\Product', 'order_products')->withPivot('order_id', 'product_id', 'price', 'discount', 'quantity');
	}

	public function account() {
		return $this->belongsTo('App\Account');
	}

	public function company() {
		return $this->belongsTo('App\Company');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function currency() {
		return $this->belongsTo('App\Currency');
	}

	public function place() {
		return $this->belongsTo('App\Place', 'place_id');
	}

	public function tienda() {
		return $this->belongsTo('App\Place', 'place_id_selected');
	}

	public function alternative_direction() {
		return $this->belongsTo('App\AlternativeDirection', 'alternative_direction_id');
	}

	protected $dates = ['deleted_at'];
}
