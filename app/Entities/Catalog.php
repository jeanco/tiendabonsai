<?php

namespace App\Entities;

use App\Utils\IzipayUtil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model {
	use SoftDeletes;

	protected $table = 'catalogs';

	protected $fillable = [
		'title', 'link',
	];

	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongsTo('\App\User', 'user_id');
	}
}
