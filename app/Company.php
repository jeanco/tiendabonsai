<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model {
	use SoftDeletes;

	protected $fillable = ['name_company',
		'ruc',
		'description_company',
		'business_name',
		'membership_date',
		'work_description_company',
		'proposal_value',
		'schedule',
		'email',
		'phone',
		'cel',
		'cel_optional',
		'facebook',
		'twitter',
		'terms_and_conditions',
		'youtube',
		'instagram',
		'google',
		'address',
		'city_id',
		'country_id',
		'title_slogan',
		'slug_company',
		'subtitle_slogan',
		'longitude',
		'mission',
		'representative',
		'vision',
		'status',
		'category_id',
		'latitude','linkedin','whatsapp','mail_message','facebook_id','facebook_pixel','google_analytics','color_primary','color_secondary','color_tertiary','color_font','color_font_hover','color_header_promotion','color_header_menu','type_header','title_promotion',
		'show_suscription_modal',
		'script_chat',
		];


	protected $dates = ['deleted_at'];

	public function products() {
		return $this->hasMany('App\Product', 'company_id');
	}

	public function customers() {
		return $this->belongsToMany('App\Customer', 'company_customer');
	}

	public function city() {
		return $this->belongsTo('App\City');
	}

	public function country() {
		return $this->belongsTo('App\Country');
	}

	public function photos(){
		return $this->hasMany('App\Content', 'model_id')->whereModelType(1)->whereType(1);
	}

}
