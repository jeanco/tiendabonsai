<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model {
	use SoftDeletes;

	protected $table = 'prices';

	protected $fillable = [
		'name', 'price', 'min_quantity', 'status', 'product_id', 'place_id', 'type', 'promotion_end_at',
	];

	protected $dates = ['deleted_at'];

	public function product() {
		return $this->belongsTo('App\Product', 'product_id');
	}

}
