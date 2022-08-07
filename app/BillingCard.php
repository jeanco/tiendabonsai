<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingCard extends Model
{
	use SoftDeletes;

    protected $fillable = ['account_currency', 'account_type', 'account_number', 'account_holder', 'account_cci'];
    
	protected $dates = ['deleted_at'];

}
