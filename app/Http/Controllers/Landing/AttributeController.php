<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\CategoryAttribute;

class AttributeController extends Controller
{
  public function attributesByCategoryOrSubcategory(Request $request)
  {
    $category_slug = $request->category;
    $subcategory_slug = $request->subcategory;

    if ($subcategory_slug) {
      $categories_attributes = CategoryAttribute::whereHas('attributes', function($query) use ($subcategory_slug) {
        $query->whereHas('subcategories', function($query) use ($subcategory_slug) {
          $query->where('slug', $subcategory_slug);
        });
      })
      ->with(['attributes' => function($query) use ($subcategory_slug) {
        $query->whereHas('subcategories', function($query) use ($subcategory_slug) {
          $query->where('slug', $subcategory_slug);
        });
      }])
      ->get();

    } else if($category_slug) {

      $categories_attributes = CategoryAttribute::whereHas('attributes', function($query) use ($category_slug) {
        $query->whereHas('categories', function($query) use ($category_slug) {
          $query->where('slug', $category_slug);
        });
      })
      ->with(['attributes' => function($query) use ($category_slug) {
        $query->whereHas('categories', function($query) use ($category_slug) {
          $query->where('slug', $category_slug);
        });
      }])
      ->get();
    } else {
      $categories_attributes = CategoryAttribute::whereHas('attributes')
            ->with('attributes')
            ->get();
    }

    $t = [];

    foreach ($categories_attributes as $i => $category_attribute) {
      $a = [];

      foreach ($category_attribute->attributes as $key => $attribute) {
        $a[] = array(
          'id' => $attribute->id,
          'name' => $attribute->name,
        );
      }

      $t[] = array(
        'id' => $category_attribute->id,
        'name' => $category_attribute->name,
        'values' => $a,
      );

    }


    return ['data' => $t];
  }

  public function getAttributes()
    {
        $data = [
          [
            'name' => 'Marca',
            'values' => [
              [
                'id' => 1,
                'name' => 'LG',
              ],
              [
                'id' => 2,
                'name' => 'Samsung',
              ],
              [
                'id' => 3,
                'name' => 'Daewo',
              ],
              [
                'id' => 4,
                'name' => 'Renaware',
              ],
              [
                'id' => 5,
                'name' => 'HP',
              ],
            ]
          ],
          [
            'name' => 'Tamaño',
            'values' => [
              [
                'id' => 6,
                'name' => 'Pequeño',
              ],
              [
                'id' => 7,
                'name' => 'Mediano',
              ],
              [
                'id' => 8,
                'name' => 'Grande',
              ]
            ]
          ]
        ];
        return response()->json(['data' => $data], 200);
    }

}
