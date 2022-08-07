<?php

namespace App\Http\Controllers\Landing;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class PostController extends Controller
{
  public function allForApi(Request $request)
  	{
  		$posts = Post::orderBy('id', 'DESC')->where('published', 1);

  		if (isset($request->tagId) && $request->tagId != 0) {
  			$posts = $posts->where('tag_id', $request->tagId);
  		}

  		$posts = $posts->with('random_image')->with('tag')->paginate(5);
  		$posts = $posts->toArray();

  		$dataRaw = $posts['data'];

  		$t = [];

  		foreach ($dataRaw as $key => $post) {

  			$img = '';

  			if ($post['random_image'] != null) {
  				$img = $post['random_image']['resource_thumb'];
  			}

  			$t[] = array(
  				'id' => $post['id'],
  				'slug' => $post['slug'],
  				'title' => $post['title'],
  				'content' => substr(strip_tags($post['content']), 0, 300).'...' ,
  				'imageUrl' => $img,
  				'date' => Carbon::parse($post['created_at'])->format('Y-m-d'),
  				'tagName' => $post['tag']['name'],
  				);
  		}

  		$posts['data'] = $t;

  		return response()->json($posts, 200);
  	}

  	public function getBySlugForApi($slug)
  	{
  		$post = Post::where('slug', $slug)->with('images')->with('tag')->first();

  		if (!count($post)) {
  			return response()->json(['data' => []], 200);
  		}

  		$video_url = $post->video;
  		$video_id = '';

  		if ($video_url != '') {
  			$video_url_array = explode('=', $video_url);
  			$video_id = $video_url_array[1];
  		}

  		$images = [];

  		if (count($post->images)) {
  			foreach ($post->images as $key => $image) {
  				$images[] = array(
  					'url' => $image->resource,
  					'urlThumb' => $image->resource_thumb,
  					);
  			}
  		}

  		$t = array(
  			'slug' => $post->slug,
  			'title' => $post->title,
  			'content' => $post->content,
  			//'date' => Carbon::parse($post['created_at'])->format('Y-m-d'),
  			'videoId' => $video_id,
  			'tagName' => $post->tag->name,
  			'images' => $images,
  			);

  		return response()->json(['data' => $t], 200);
  	}

  	public function relatedBySlugForApi($slug)
  	{
  		$post = Post::where('slug', $slug)->first();

  		$posts_related = Post::orderBy('id', 'DESC')->where('slug', '!=', $slug)->where('published', 1)->where('tag_id', $post->tag_id)->with('random_image')->with('tag')->take(3)->get();

  		if (!count($posts_related)) {
  			return response()->json(['data' => []]);
  		}

  		$t = [];

  		foreach ($posts_related as $key => $post) {

  			$t[] = array(
  				'slug' => $post->slug,
  				'title' => $post->title,
  				'tagName' => $post->tag->name,
  				//'date' => Carbon::parse($post['created_at'])->format('Y-m-d'),
  				'content' => substr(strip_tags($post->content), 0 , 200).'...',
  				'imageUrl' => ($post->random_image != null) ? $post->random_image->resource_thumb : '',
  				);
  		}

  		return response()->json(['data' => $t]);
  	}

  	public function lastForApi()
  	{
  		$posts = Post::orderBy('id', 'DESC')->where('published', 1)->with('random_image')->with('tag')->take(4)->get();

  		if (!count($posts)) {
  			return response()->json(['data' => []]);
  		}

  		foreach ($posts as $key => $post) {
  			$t[] = array(
  				'slug' => $post->slug,
  				'id' => $post->id,
  				'title' => $post->title,
  				'tagName' => $post->tag->name,
  				//'date' => Carbon::parse($post['created_at'])->format('Y-m-d'),
  				'content' => substr(strip_tags($post->content), 0 , 200).'...',
  				'imageUrl' => ($post->random_image != null) ? $post->random_image->resource_thumb : '',
  				);
  		}

  		return response()->json(['data' => $t]);

  	}
}
