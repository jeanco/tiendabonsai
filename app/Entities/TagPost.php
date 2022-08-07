<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagPost extends Model {
	use SoftDeletes;

	protected $table = 'tags_posts';

	protected $fillable = [
		'name',
	];

	protected $dates = ['deleted_at'];

	public function posts() {
		return $this->hasMany('App\Post', 'tag_id');
	}

	public function posts_published() {
		return $this->hasMany('App\Post', 'tag_id')->wherePublished(1);
	}
}
