<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{ 
  public function all()
  {
    $tags = Tag::all();
    return $tags;
  }
}
