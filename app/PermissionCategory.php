<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionCategory extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'permission_categories';

	protected $fillable = [

	];

	public function permissions() {
		return $this->hasMany('App\Permission', 'permission_category_id', 'id');
	}

}
