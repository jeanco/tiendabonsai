<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model {
	use SoftDeletes;

	protected $table = 'categories_attributes';

	protected $fillable = [
		'name',
		'slug',
		'published',
	];

	protected $dates = ['deleted_at'];

	public function attributes_relationship() {
		return $this->hasMany('App\Attribute', 'category_attribute_id');
	}

}
