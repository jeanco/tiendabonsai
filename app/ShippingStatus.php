<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingStatus extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
	];

	protected $table = "shipping_status";
}
