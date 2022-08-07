<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportCompany extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['name'];

	protected $table = 'transport_companies';

	public function costs() {
		return $this->hasMany('App\Cost', 'transport_company_id');
	}
}
