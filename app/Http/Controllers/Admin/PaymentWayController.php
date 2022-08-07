<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PaymentWay;

class PaymentWayController extends Controller
{
  public function all()
  {
    $payment_ways = PaymentWay::all();
    return $payment_ways;
  }
}
