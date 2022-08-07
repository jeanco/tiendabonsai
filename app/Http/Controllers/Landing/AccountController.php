<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\PaymentWay;

class AccountController extends Controller
{
  public function all()
  {
    $payment_ways = PaymentWay::with(['accounts' => function ($query) {
      $query->with('payment_entity');
      $query->where('published', 1);
    }])->get();
    $t = [];

    foreach ($payment_ways as $key => $payment_way) {
      $entities = [];

      if ($payment_way->id == 1) {
        foreach ($payment_way->accounts as $u => $account) {
          $entities[] = array(
            'id' => $account->id,
            'currencyId' => 1,
            'title' => $account->name,
            'logoUrl' => $account->payment_entity->logo,
            'accountInfo' => '',
            'instructions' => $account->instructions,
            'propietary' => '',
            'propietaryDocument' => '',
          );
        }
      } else {
        foreach ($payment_way->accounts as $u => $account) {
          $entities[] = array(
            'id' => $account->id,
            'currencyId' => $account->currency_id,
            'title' => $account->name,
            'logoUrl' => $account->payment_entity->logo,
            'accountInfo' => $account->description,
            'instructions' => $account->instructions,
            'propietary' => $account->owner_name,
            'propietaryDocument' => $account->owner_document,
          );
        }
      }

      $t[] = array(
        'id' => $payment_way->id,
        'name' => $payment_way->name,
        'entities' => $entities,
      );

    }

    return ['data' => $t];
  }
}
