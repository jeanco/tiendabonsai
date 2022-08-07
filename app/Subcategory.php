<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'content', 'category_id', 'published'];
	
	protected $dates = ['deleted_at'];

    public function category()
	{
		return $this->belongsTo('App\Category');
	}
	
	public function products()
	{
		return $this->hasMany('App\Product');
	}
	
	public function products_published()
	{
		return $this->hasMany('App\Product')->wherePublished(1);
	}

	public function attributes()
	{
		return $this->belongsToMany('App\Attribute',
			'attribute_category_subcategory',
			'subcategory_id',
			'attribute_id');
	}

}
