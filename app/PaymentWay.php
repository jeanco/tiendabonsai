<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentWay extends Model
{
  use SoftDeletes;

  protected $table = 'payment_ways';
  protected $dates = ['deleted_at'];

  public function accounts()
  {
    return $this->hasMany('App\Account', 'payment_way_id');
  }
}
