<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entities\TagPost;

class TagPostController extends Controller
{
    public function all()
    {
        $tags = TagPost::all();
        return $tags;
    }
}
