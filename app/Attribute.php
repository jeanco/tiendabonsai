<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model {
	use SoftDeletes;

	protected $table = 'attributes';

	protected $fillable = [
		'name',
		'slug',
		'description',
		'category_attribute_id',
	];

	protected $dates = ['deleted_at'];

	public function category_attribute() {
		return $this->belongsTo('App\CategoryAttribute', 'category_attribute_id');
	}

	public function products() {
		return $this->belongsToMany('App\Product',
			'attribute_product',
			'attribute_id',
			'product_id');
	}

	public function subcategories() {
		return $this->belongsToMany('App\Subcategory',
			'attribute_category_subcategory',
			'attribute_id',
			'subcategory_id');
	}

	public function categories() {
		return $this->belongsToMany('App\Category',
			'attribute_category_subcategory',
			'attribute_id',
			'category_id');
	}

	public function color_presentations() {
		return $this->hasMany('App\ProductPresentation', 'color_id');
	}

	public function color_presentation() {
		return $this->hasOne('App\ProductPresentation', 'color_id');
	}

	public function size_presentations() {
		return $this->hasMany('App\ProductPresentation', 'size_id');
	}
}
