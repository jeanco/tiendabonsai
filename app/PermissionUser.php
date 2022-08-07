<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model {

	protected $table = 'permission_user';
	protected $fillable = [

	];

	public function permission() {
		return $this->belongsTo('App\Permission');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

}
