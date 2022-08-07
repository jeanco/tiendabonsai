<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponProduct extends Model {
	use SoftDeletes;

	protected $table = 'coupon_product';
	protected $dates = ['deleted_at'];
	protected $fillable = [
	];
}
