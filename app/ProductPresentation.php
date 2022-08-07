<?php

namespace App;

use App\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPresentation extends Model {
	use SoftDeletes;

	protected $table = 'product_presentations';
	protected $dates = ['deleted_at'];

	public function product() {
		return $this->belongsTo('App\Product', 'product_id');
	}

	public function main_product() {
		return $this->belongsTo('App\Product', 'main_product_id');
	}

	public function color() {
		return $this->belongsTo('App\Attribute', 'color_id');
	}

	public function size() {
		return $this->belongsTo('App\Attribute', 'size_id');
	}

	public function main_photo() {
		return $this->hasMany('App\Content', 'model_id', 'main_product_id')->whereModelType(2)->whereType(1);
	}

	// public function main_photo_(){
	// 	return $this->hasMany('App\Content', 'model_id', 'main_product_id')->whereModelType(2)->whereType(1);
	// }

	// public function color_photo(){
	// 	return $this->hasMany('App\Content', 'color_id', 'color_id')->whereModelType(2)->whereType(1);
	// }

	// public function final_photo(){
	// 	return $this->main_photo_->merge($this->color_photo);
	// }

	// public function photos_related()
	// {
	//     return Content::where(function($q) {
	//         $q->where('model_id',$this->main_product_id)
	//             ->where('color_id',$this->color_id);
	//     })->get();
	// }

	// public function photos()
	// {
	//     return $this->photos_related()->get();
	// }

	public function other_photo() {
		return $this->hasMany('App\Content', 'model_id', 'main_product_id')->whereModelType(2)->where('type', '!=', 1);
	}


}
