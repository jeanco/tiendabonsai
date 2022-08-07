<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
	use SoftDeletes;

	protected $fillable = [
		'name',
		'content',
		'published',

	];

	protected $dates = ['deleted_at'];

	public function subcategories() {
		return $this->hasMany('App\Subcategory');
	}

	public function products() {
		return $this->hasMany('App\Product');
	}

	public function attributes() {
		return $this->belongsToMany('App\Attributes',
			'attribute_category_subcategory',
			'category_id',
			'attribute_id');
	}

	public function subcategories_published() {
		return $this->hasMany('App\Subcategory')->wherePublished(1);
	}

	public function products_published() {
		return $this->hasMany('App\Product')->wherePublished(1);
	}

	public function brands_perfil_product() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(2);
	}

	// public function product_count_relation()
	// {
	//     return $this->hasOne('App\Product')->select(DB::raw('id, count(*) as count'))->groupBy('id');
	// }
}
