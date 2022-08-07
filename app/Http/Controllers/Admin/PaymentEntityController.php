<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PaymentEntity;

class PaymentEntityController extends Controller
{
  public function all()
  { 
    $payment_entities = PaymentEntity::all();
    return $payment_entities;
  }
}
