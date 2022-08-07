<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Currency;

class CurrencyController extends Controller
{
  public function all()
  { 
    $currencies = Currency::all();
    return $currencies;
  }
}
