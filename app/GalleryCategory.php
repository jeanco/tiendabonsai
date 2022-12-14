<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'gallery_categories';

	protected $fillable = [
		'name', 'published',
	];

	public function galleries() {
		return $this->hasMany('App\Gallery', 'category_id');
	}
}
