<?php

namespace App\Http\Controllers\Admin;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;

class CategoryAttributeController extends Controller
{
  public function all()
  {
    $categories = CategoryAttribute::whereHas('attributes_relationship')
      ->with('attributes_relationship')->get();
    return $categories;
  }
}
