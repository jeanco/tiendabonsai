<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExchangeRate extends Model {
	use SoftDeletes;

	protected $table = 'exchange_rates';
	protected $dates = ['deleted_at'];
	protected $fillable = [

	];

}
