<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Content;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Uploaders\ImageUploader;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class PostsController extends Controller
{
	protected $defaultImage;

	public function __construct()
	{
		$this->defaultImage = asset('static/images/image_no_available.png');
	}

	public function getAllPosts()
	{
		$posts = Post::orderBy('id','DESC')->get();
		foreach ($posts as $k => $post) {
			$post->image = (count($img  = $this->getOneRandomImage($post->id,3,null)) ? $img->resource_thumb : $this->defaultImage);
		}

		return response()->json(['posts'=>$posts],200);
	}

	public function getPostById($postId)
	{
		$post = Post::find($postId);
		return response()->json(['post'=>$post],200);
	}

	public function postPost(PostRequest $request)
	{
		try {
			$data = $request->all();
			$post = new Post();
			$post->fill($data);
			$post->slug = str_slug($request->title);
			$post->published = 1;
			$post->save();

			return response()->json(['success'=>true,'post'=>$post],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function putPost(PostUpdateRequest $request)
	{
		try {
			$data = $request->all();
			$post = Post::find($request->post_id);
			$post->fill($data);
			$post->slug = str_slug($request->title);
			$post->save();

			return response()->json(['success'=>true,'post'=>$post],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function putPostPublished(Request $request)
	{
		try {
			$lastStatus  = $request->lastStatus;
			$post = Post::find($request->postId);
			$post->published = ($lastStatus ? 0 : 1);
			$post->save();
			return response()->json(['success'=>true],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function deletePost(Request $request)
	{
		try {
			$post = Post::find($request->postId);
			$contents = Content::where('model_id',$post->id)->where('model_type',3)->where('type',1)->get();

			$functionUpload = new ImageUploader();

			foreach ($contents as $k => $content) {
				$functionUpload->delete($content->resource_path,$content->resource);
				$functionUpload->delete($content->resource_thumb_path,$content->resource_thumb);
				$content->delete();
			}
			$post->delete();
			return response()->json(['success'=>true],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}

	}

	public function postImages(Request $request)
	{
		$img  = $request->file[0];

		$functionUpload = new ImageUploader();
		$functionUpload->upload('/posts/images',$img,'png',900);

		$content  = new Content();
		$content->content = "Img dropzone posts";
		$content->resource = $functionUpload->getDropboxUrl();
		$content->resource_path = $functionUpload->getDropboxPath();

		$functionUpload->upload('/posts/images/thumbs',$img,'png',450);
		$content->resource_thumb = $functionUpload->getDropboxUrl();
		$content->resource_thumb_path = $functionUpload->getDropboxPath();
		$content->model_id = 0;
		$content->model_type = $request->session()->get('model_type');
		$content->type = 1;
		$content->save();

		return $content;
	}

	private function howLongAgo($createdIn)
	{
		$createdIn = Carbon::parse($createdIn); //Fecha de creación
		$now = Carbon::now(); // Fecha de ahora

		if($createdIn->diffInDays($now) >=1){
			$howLongAgo = $createdIn->format('d').' '.$createdIn->format('M').' - '.$createdIn->format('H:m');
		}else{
			Date::setLocale('es');
			$howLongAgo = Date::parse($createdIn)->diffForHumans();
		}
		return $howLongAgo;
	}

	//Metodos para el frontEnd
	public function getPosts()
	{
		$posts = Post::orderBy('id','DESC')->get();
		$lastPostId = 0;

		$arrayPosts = [];
		$arrayLastPost = [];

		if (!count($posts)) {
			return response()->json(['posts'=>$arrayPosts,'lastPost'=>$arrayLastPost],200);
		}

		foreach ($posts as $k => $post) {

			if ($k == 0) {
				$lastPostId = $post->id;
			}

			$arrayPosts[$k]['slug'] = $post->slug;
			$arrayPosts[$k]['title'] = $post->title;
			$arrayPosts[$k]['content'] = $post->content;
			$arrayPosts[$k]['imageUrl'] = (count($img = $this->getOneRandomImage($post->id,3,null)) ? $img->resource_thumb : $this->defaultImage);
			$arrayPosts[$k]['date']  = explode(" ",$post->created_at)[0];
			$arrayPosts[$k]['happened'] = $this->howLongAgo($post->created_at);
		}

		$lastPost = Post::find($lastPostId);

		$arrayLastPost['slug'] = $lastPost->slug;
		$arrayLastPost['title'] = $lastPost->title;
		$arrayLastPost['content'] = $lastPost->content;
		$arrayLastPost['date'] = explode(" ",$lastPost->created_at)[0];
		$arrayLastPost['happened'] = $this->howLongAgo($lastPost->created_at);
		$arrayLastPost['images'] = (count($images = $this->getArrayImages($lastPost->id,3)) ? $images : [$this->defaultImage]);

		return response()->json(['posts'=>$arrayPosts,'lastPost'=>$arrayLastPost],200);
	}

	public function getPostBySlug($postSlug)
	{
		$arrayPost = [];
		$post = Post::where('slug',$postSlug)->first();
		if (!count($post)) {
			return $arrayPost;
		}

		$arrayPost['slug'] = $post->slug;
		$arrayPost['title'] = $post->title;
		$arrayPost['content'] = $post->content;
		$arrayPost['date'] = explode(" ",$post->created_at)[0];
		$arrayPost['happened'] = $this->howLongAgo($post->created_at);
		$arrayPost['images'] = (count($images = $this->getArrayImages($post->id,3)) ? $images : [$this->defaultImage]);

		return response()->json(['post'=>$arrayPost],200);
	}

	public function getLastPosts()
	{
		$posts  = Post::orderBy('id','DESC')->take(3)->get();
		$arrayLastPosts = [];
		if (!count($posts)) {
			return $arrayLastPosts;
		}

		foreach ($posts as $i => $post) {
			$arrayLastPosts[$i]['slug'] = $post->slug;
			$arrayLastPosts[$i]['title'] = $post->title;
			$arrayLastPosts[$i]['content'] = $post->content;
			$arrayLastPosts[$i]['imageUrl'] = (count($img = $this->getOneRandomImage($post->id,3,null)) ? $img->resource_thumb : $this->defaultImage);
			$arrayLastPosts[$i]['date']  = explode(" ",$post->created_at)[0];
			$arrayLastPosts[$i]['happened'] = $this->howLongAgo($post->created_at);
		}

		return response()->json(['lastPosts'=>$arrayLastPosts],200);
	}


}
