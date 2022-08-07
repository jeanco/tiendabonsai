<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
	use SoftDeletes;

	protected $fillable = ['title', 'content', 'slug', 'tag_id', 'user_id','date'];

	protected $dates = ['deleted_at'];

	protected $table = 'posts';

	public function random_image() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(3)
			->whereType(1)
			->inRandomOrder();
	}

	public function images() {
		return $this->hasMany('App\Content', 'model_id')->whereModelType(3)
			->whereType(1);
	}

	public function image() {
		return $this->hasOne('App\Content', 'model_id')->whereModelType(3)
			->whereType(1);
	}

	public function tag() {
		return $this->belongsTo('App\Entities\TagPost', 'tag_id');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
