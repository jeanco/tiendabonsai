<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {

	use SoftDeletes;

	protected $fillable = [
		'name', 'display_name', 'description',
	];

	public function users() {
		return $this->belongsToMany('App\User')->withTimestamps();
	}

	public function permissions_role() {
		return $this->hasMany('App\PermissionRole');
	}

	public function permissions() {
		return $this->belongsToMany('App\Permission');
	}
}
