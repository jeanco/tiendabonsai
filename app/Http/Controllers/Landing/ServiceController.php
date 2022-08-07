<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
  public function getServices()
  {
    $services = Service::where('published',1)->get();

    $array = [];

    $array['cover']['title'] = 'kamasa <br> está a tu servicio';
    $array['cover']['subtitle'] = 'Te damos todas las opciones de nuestros servicios disponibles para que tengas la mejor experiencia con nuestros productos.';
    $array['cover']['imageUrl'] = 'https://dl.dropboxusercontent.com/s/itqoq3ae83cafy8/img_servicio.jpg?dl=0';
    $servicesArray = [];
    if (count($services)) {
      foreach ($services as $key => $service) {
        $servicesArray[] = array(
          'name' => $service->name,
          'description' => $service->description,
          'imageUrl' => $service->image,
        );
      }
    }
    $array['services'] = $servicesArray;

    return response()->json(['data' => $array], 200);
  }
}
