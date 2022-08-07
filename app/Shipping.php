<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'description', 'order_id', 'date', 'shipping_status_id',
	];

	protected $table = "shipping";

	public function shipping_status() {
		return $this->belongsTo('App\ShippingStatus', 'shipping_status_id');
	}
}
