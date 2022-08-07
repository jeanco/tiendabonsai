<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignCategory extends Model {
	use SoftDeletes;

	protected $table = 'campaign_categories';

	protected $fillable = [
	];

	protected $dates = ['deleted_at'];

	public function campaigns() {
		return $this->hasMany('\App\Campaign');
	}
}
