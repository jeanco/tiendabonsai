<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryType extends Model {
	use SoftDeletes;

	protected $fillable = [
		'name',

	];

	protected $dates = ['deleted_at'];

    public function contents(){
        return $this->hasMany('App\Content', 'type');
    }

}
