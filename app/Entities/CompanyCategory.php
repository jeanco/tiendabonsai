<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCategory extends Model {
	use SoftDeletes;

	protected $table = 'company_categories';

	protected $fillable = [
		'name', 'slug', 'description', 'published',
	];

	protected $dates = ['deleted_at'];

	public function companies() {
		return $this->hasMany('\App\Company', 'category_id');
	}
}
