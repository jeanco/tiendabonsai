<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etiquette extends Model {
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'etiquettes';
	
	protected $fillable = ['name', 'published'];

	public function products() {
		return $this->belongsToMany('App\Product', 'etiquette_product', 'etiquette_id', 'product_id');
	}
}
