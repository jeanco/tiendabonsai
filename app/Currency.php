<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    public function exchange_rate() {
        return $this->hasOne('App\ExchangeRate', 'currency_id')->whereActive(1);
    }
}
