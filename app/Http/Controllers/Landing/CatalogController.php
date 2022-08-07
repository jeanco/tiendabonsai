<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Entities\Catalog;

class CatalogController extends Controller
{
    public function getCatalogs()
    {
        $data = [
          [
            'imageUrl' => 'https://dl.dropboxusercontent.com/s/6wyqfqebodxvzti/catalogo-28.png?dl=0',
            'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/6wyqfqebodxvzti/catalogo-28.png?dl=0',
            'link' => 'https://issuu.com/tiendaskamasatacna/docs/catalogo_tv_dia_del_padre'
          ],
          [
            'imageUrl' => 'https://dl.dropboxusercontent.com/s/ou0yq0y0oyz34mq/novios.png?dl=0',
            'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/ou0yq0y0oyz34mq/novios.png?dl=0',
            'link' => 'http://kamasa.pe/club-de-novios'
          ],
        ];

        return response()->json(['data' => $data], 200);
    }

    public function all()
    {
      $catalogs = Catalog::where('published', 1)->get();

      $t = [];

      foreach ($catalogs as $i => $catalog) {
        $t[] = array(
          'title' => $catalog->title,
          'imageUrl' => $catalog->image_desktop,
          'imageThumbUrl' => $catalog->image_movil,
          'link' => $catalog->link,
        );
      }

      return response()->json(['data' => $t], 200);
    }

}
