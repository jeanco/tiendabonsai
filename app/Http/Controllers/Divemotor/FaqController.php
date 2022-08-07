<?php

namespace App\Http\Controllers\Divemotor;

use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class FaqController extends Controller {
	public function show_view(Request $request) {
		$blogs = Post::with('image')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->paginate(1);

		$tags = TagPost::whereHas('posts')
			->with(['posts' => function($query){
				$query->with('image');
				$query->wherePublished(1);
			}])
			->get();

		$blogs_other = Post::with('image')
			->wherePublished(1)
			->get();

		$quantity_of_blogs = count($blogs_other);

		$path = $this->get_current_company_path();

		return view("{$path}.faq.index", compact('blogs', 'tags', 'quantity_of_blogs'));
	}

	public function show_profile($slug) {

		$blog = Post::whereSlug($slug)->with('image')
			->with('user')
			->first();

		$tags = TagPost::all();

		$blogs_other = Post::with('image')
			->wherePublished(1)
			->get();
		$quantity_of_blogs = count($blogs_other);

		$recent_blogs = Post::where('id', '!=', $blog->id)
			->orderBy('id', 'DESC')
			->with('image')
			->take(3)
			->get();

		$path = $this->get_current_company_path();

		return view("{$path}.blog.perfil.index", compact('blog', 'tags', 'recent_blogs', 'quantity_of_blogs'));
	}

	public function fetch_data_blog(Request $request) {
		if ($request->ajax()) {
			$blogs = Post::with('image')
				->orderBy('id', 'DESC')
				->wherePublished(1);

			if ($request->tag_id != '') {
				$blogs = $blogs->whereTagId($request->tag_id);
			}

			$blogs = $blogs->paginate($request->per_page);
			// $path = $this->get_current_company_path();
			return view("miranda.blog.list_blog", compact('blogs'))->render();
		}
	}
}
