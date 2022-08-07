<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model {
	use SoftDeletes;

	protected $table = 'coupons';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'code',
		'description',
		'coupon_type_id',
		'start_date',
		'end_date',
		'maximum',
		'minimum',
		'amount',
		'limit',
		'status',
		'conditions_policy',
		'company_id',
		'place_id',
	];

	public function type() {
		return $this->belongsTo('App\CouponType', 'coupon_type_id');
	}

	public function products() {
		return $this->belongsToMany('App\Product', 'coupon_product', 'coupon_id', 'product_id');
	}

	public function coupon_products() {
		return $this->hasMany('App\CouponProduct', 'coupon_id');
	}

}
