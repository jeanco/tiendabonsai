<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\City;

class CityController extends Controller
{ 
  public function all()
  {
    $cities = City::all();

    $t = [];

    foreach ($cities as $i => $city) {
      $t[] = array(
        'id' => $city->id,
        'name' => $city->name,
      );
    }
    
    return ['data' => $t];
  }
}
