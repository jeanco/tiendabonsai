<?php

namespace App\Http\Controllers\Template_8;

use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

	public function show_view() {

		$posts = Post::with('image')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->with('tag')
			->with('image')
			->paginate(9);

		return view('template_8.blog.index', compact('posts'));
	}

	public function show_profile($slug) {

		$post = Post::whereSlug($slug)->with('image')
			->with('user')
			->with('tag')
			->first();

		$last_posts = Post::latest()
			->with('image')
			->with('tag')
			->where('id', '!=', $post->id)
			->take(3)
			->get();

		$tags = TagPost::all();

		return view('template_8.blog.perfil.index', compact('post', 'last_posts', 'tags'));
	}

	public function fetch_data_blogs(Request $request) {

		if ($request->ajax()) {

			$posts = Post::wherePublished(1)
				->orderBy('id', 'DESC')
				->with('image')
				->with('tag')
				->with('user');

			$posts = $posts->paginate($request->per_page);

			return view("template_8.blog.list_blogs", compact('posts'))->render();
		}

	}

}
