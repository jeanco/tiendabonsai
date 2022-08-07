<?php

namespace App\Http\Controllers\Landing;

use App\Entities\TagPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostTagController extends Controller
{
    public function all()
    {
        $tags = TagPost::all();
        return $tags;
    }

    public function getTagsforApi()
    {
        $array = [];

        $tags = TagPost::with('posts')->get();
        if (count($tags) == 0) {
        return [];
        }

        foreach ($tags as $i => $tag) {
            if (count($tag->posts)) {
                $array[] = array(
                    'id' => $tag->id,
                    'name' => $tag->name,
                    );
            }
        }
        return response()->json(['data'=>$array],200);
    }
}
