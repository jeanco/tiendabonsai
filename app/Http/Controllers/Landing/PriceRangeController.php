<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\PriceRange;

class PriceRangeController extends Controller
{
  public function getPricesRange()
  {
    $prices = PriceRange::all();

    $t = [];

    foreach ($prices as $key => $price) {
      $t[] = array(
        'id' => $price->id,
        'startingPrice' => $price->start,
        'endingPrice' => $price->end,
        'name' => "S/$price->start - S/$price->end",
      );
    }

    return ['data' => $t];
  }
}
