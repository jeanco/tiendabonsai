<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use Carbon\Carbon;
use Auth;

class PostController extends Controller
{
  public function all()
  {
    $posts = Post::with('random_image')->orderBy('id', 'DESC')->get();
    return $posts;
  }

  public function show($id)
  {
    $post = Post::find($id);
    if ($post->date) {
      $post->date = Carbon::parse($post->date)->format('d/m/Y');
    }
    return $post;
  }
    
  public function store(PostCreateRequest $request)
  { 
    $data = $request->all();
    $data['slug'] = str_slug($data['title']);

    $post = new Post();
    $post->fill($data);
    $post->user_id = Auth::user()->id;
    if ($request->date) {
      $post->date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
    }
    $post->published = 1;
    $post->save();
    return;
  }

  public function update($id, PostUpdateRequest $request)
  {
    $data = $request->all();
    $data['slug'] = str_slug($data['title']);
    $post = Post::find($id);
    $post->fill($data);


    if ($request->date) {
      $post->date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
    }

    $post->save();
    return;
  }

  public function updatePublished($id)
  {
    $post = Post::find($id);
    $post->published = ($post->published == 1) ? 0 : 1;
    $post->save();
    return;
  }

  public function delete($id)
  {
    $post = Post::with('images')->find($id);

    $functionUpload = new ImageUploader();
    
    foreach ($post->images as $i => $image) {
      $functionUpload->delete($image->resource_path, $image->resource);
      $functionUpload->delete($image->resource_thumb_path, $image->resource_thumb);
      $image->delete();
    }

    $post->delete();
  }

  public function getImages($id, Request $request)
  { 
    $request->session()->put('model_type', 3);

    $post = Post::with('images')->find($id);
    return $post->images;
  }
}
