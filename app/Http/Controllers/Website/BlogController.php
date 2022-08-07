<?php

namespace App\Http\Controllers\Website;

use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller {
	public function show_view() {

		$path = $this->get_current_company_path();

		$last_blog = Post::latest()
			->with('image')
			->with('user')
			->first();

		$other_blogs = [];

		if (count($last_blog)) {
			$other_blogs = Post::where('id', '!=', $last_blog->id)
				->with('image')
				->orderBy('id', 'DESC')
				->paginate(6);
		}

		return view("{$path}.blog.index", compact('last_blog', 'other_blogs'));
	}

	public function show_profile($slug) {

		$blog = Post::whereSlug($slug)->with('image')
			->with('user')
			->with('tag')
			->first();
		$tags = TagPost::with('posts_published')
			->get();

		$recent_blogs = Post::where('id', '!=', $blog->id)
			->orderBy('id', 'DESC')
			->with('image')
			->take(3)
			->get();

		// $prev_post & $next_post
		$prev_post = Post::where('id', '<', $blog->id)
			->orderBy('id', 'DESC')
			->first();

		$next_post = Post::where('id', '>', $blog->id)
			->orderBy('id', 'ASC')
			->first();

		$path = $this->get_current_company_path();

		return view("{$path}.blog.perfil.index", compact('blog', 'tags', 'recent_blogs', 'prev_post', 'next_post'));
	}

	public function fetch_data_blog(Request $request) {

		if ($request->ajax()) {

			$blog = Post::latest()
				->wherePublished(1)
				->first();

			$other_blogs = Post::wherePublished(1)
				->where('id', '!=', $blog->id)
				->orderBy('id', 'DESC')
				->paginate($request->per_page);

			$path = $this->get_current_company_path();

			return view("{$path}.blog.2_more_post", compact('other_blogs'))->render();
		}

	}

}
