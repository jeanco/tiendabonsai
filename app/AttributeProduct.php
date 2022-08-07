<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeProduct extends Model {
	use SoftDeletes;

	protected $table = 'attribute_product';

	protected $fillable = [];


	protected $dates = ['deleted_at'];


}
