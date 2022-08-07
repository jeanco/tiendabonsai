<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
	use SoftDeletes, Notifiable, HasApiTokens;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'first_name', 'last_name', 'cel', 'email', 'address', 'user_type',
		'company_id',
		'cel_holder',
		'gender',
		'birthday',
		'activated',
		'country_id',
		'city_id',
		'customer_id',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	protected $dates = ['deleted_at'];

	public function company() {
		return $this->belongsTo('App\Company', 'company_id');
	}

	public function roles() {
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	public function roles_v2() {
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	public function permissions() {
		return $this->belongsToMany('App\Permission')->withTimestamps();
	}

	public function city() {
		return $this->belongsTo('App\City', 'city_id');
	}

	public function scopeAdmins($query) {
		$query->whereHas('roles', function ($query) {
			//Super admin and admin
			$query->whereIn('roles.name', ['super-administrador', 'administrador', 'administrador-empresario']);
		});
	}

	public function customer() {
		return $this->belongsTo('App\Customer', 'customer_id');
	}

}
