<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	protected $table = 'permissions';

	protected $fillable = [

	];

	public function category() {
		return $this->belongsTo('App\PermissionCategory', 'permission_category_id', 'id');
	}

	public function permission_role_activated() {
		return $this->hasOne('App\PermissionRole')->where('activated', 1);
	}

	public function permission_roles_activated() {
		return $this->hasMany('App\PermissionRole')->where('activated', 1);
	}

	public function permission_roles() {
		return $this->hasMany('App\PermissionRole');
	}

	public function permission_users() {
		return $this->hasMany('App\PermissionUser');
	}

	public function permission_user() {
		return $this->hasOne('App\PermissionUser');
	}

	public function users() {
		return $this->belongsToMany('App\User')->withTimestamps();
	}

}
