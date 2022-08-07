<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponType extends Model {
	use SoftDeletes;

	protected $table = 'coupon_types';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'name',
	];

	public function coupons() {
		return $this->hasMany('App\Coupon', 'coupon_type_id');
	}

}
