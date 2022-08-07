<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributesController extends Controller
{
  public function getAttributes()
    {
        $data = [
          [
            'name' => 'Marca',
            'values' => [
              [
                'id' => 1,
                'name' => 'LG'
              ],
              [
                'id' => 2,
                'name' => 'Samsung'
              ],
              [
                'id' => 3,
                'name' => 'Daewo'
              ],
              [
                'id' => 4,
                'name' => 'Renaware'
              ],
              [
                'id' => 5,
                'name' => 'HP'
              ],
            ]
          ],
          [
            'name' => 'Tamaño',
            'values' => [
              [
                'id' => 6,
                'name' => 'Pequeño'
              ],
              [
                'id' => 7,
                'name' => 'Mediano'
              ],
              [
                'id' => 8,
                'name' => 'Grande'
              ]
            ]
          ]
        ];
        return response()->json(['data' => $data], 200);
    }

}
