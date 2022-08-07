<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'galleries';

	protected $fillable = [
		'title', 'slug', 'description', 'website', 'category_id', 'link', 'published',
	];

	public function photos()
    {
    	//return $this->hasMany('App\Content', 'model_id')->whereModelType(2);
    	//return $this->hasMany('App\Content', 'model_id')->whereModelType(2)->wheremodelId(1);
    	return $this->hasMany('App\Content', 'model_id')->whereModelType(7);
    }
}
