<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	use SoftDeletes;

	protected $fillable = [
		'name',
		'description',
		'features',
		'specifications',
		'category_id',
		'subcategory_id',
		'price',
		'stock',
		'video',
		'link',
		'latitude',
		'longitude',
		'city_id',
		'country_id',
		'address',
		'installation_time',
		'delivery_time',
		'warranty',
		'type_id',
		'minimum_quantity',
		'promotion_config',
		'code',
		'transfer_title',
		'transfer_price',
		'transfer_available',
		'message_about_price',
		'has_hidden_price'
	];

	protected $dates = ['deleted_at'];

	public function company() {
		return $this->belongsTo('App\Company');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function subcategory() {
		return $this->belongsTo('App\Subcategory', 'subcategory_id');
	}

	public function orders() {
		return $this->belongsToMany('App\Order', 'order_products');
	}

	public function images() {
		return $this->hasMany('App\Content', 'model_id')->whereModelType(2);
	}

	public function image() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(2);
	}

	public function photo() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(2);
	}

	public function main_photo() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(2)->whereType(1);
	}

	public function other_photo() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(2)->where('type', '!=', 1);
	}

	public function other_photos() {
		return $this->hasMany('App\Content', 'model_id')->whereModelType(2)->where('type', '!=', 1);
	}

	public function random_image() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(2)->inRandomOrder();
	}

	public function attributes() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id');
	}

	public function own_attributes() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id');
	}

	public function brands() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(1);
	}

	public function brands_perfil_product() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(1);
	}

	public function brands_perfil_product_template_14() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(2);
	}

	public function brands_perfil_product_template_11() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(1);
	}

	public function brands_perfil_product_template_13() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(1);
	}

	public function brands_perfil_product_template_1() {
		return $this->belongsToMany('App\Attribute',
			'attribute_product',
			'product_id',
			'attribute_id')->whereCategoryAttributeId(2);
	}

	public function country() {
		return $this->belongsTo('App\Country');
	}

	public function city() {
		return $this->belongsTo('App\City');
	}

	public function prices() {
		return $this->hasMany('App\Price', 'product_id');
	}

	public function price_promoted() {
		return $this->hasOne('App\Price', 'product_id')
			->whereType(2)->whereStatus(1);
	}

	public function unit_price() {
		return $this->hasOne('App\Price', 'product_id')->whereType(1)
			->whereStatus(1);

	}

	public function coupons() {
		return $this->belongsToMany('App\Product', 'coupon_product', 'product_id', 'coupon_id');
	}

	public function product_child() {
		return $this->hasOne('App\Product', 'main_product_id');
	}

	public function etiquettes() {
		return $this->belongsToMany('App\Etiquette', 'etiquette_product', 'product_id', 'etiquette_id');
	}

	public function etiquettes_detail() {
		return $this->hasMany('App\EtiquetteProduct', 'product_id');
	}

	public function presentation(){
		return $this->hasOne('App\ProductPresentation', 'product_id');
	}
}
