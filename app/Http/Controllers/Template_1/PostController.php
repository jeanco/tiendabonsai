<?php

namespace App\Http\Controllers\Template_1;

use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use DB;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller {

	public function show_view(Request $request) {
		//Session::flash('menu_pages', 'PUBLICACIONES');
		// $path = $this->get_current_company_path()

		$tag_slug = $_GET['tag'];


		if ($tag_slug == 'publicaciones') {
			Session::flash('menu_pages', 'PUBLICACIONES');
		}else{

			if ($tag_slug == 'bonsai-para-todos') {
				Session::flash('menu_pages', 'BONSAI');
			}else{
				Session::flash('menu_pages', 'CLASES Y WORKSHOP');
			}
		}

		$last_blogs = Post::latest()
			->with('image')
			->with('tag')
			->take(3)
			->get();

		// $other_blogs = [];
		// if (count($last_blog)) {
		// 	$other_blogs = Post::where('id', '!=', $last_blog->id)
		// 		->with('image')
		// 		->orderBy('id', 'DESC')
		// 		->paginate(6);
		// }

		$tags = DB::table('tags_posts')
			->leftJoin('posts', 'tags_posts.id', '=', 'posts.tag_id')
			->select('tags_posts.id as id', 'tags_posts.name as name', 'tags_posts.slug as slug', DB::raw("count(posts.tag_id) as count"))
			->groupBy('tags_posts.id')
			->where('posts.deleted_at', NULL)
			->get();

		$blogs = Post::with('image')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->paginate(1);

		return view('template_1.blog.index', compact('tags', 'blogs', 'last_blogs'));
	}

	public function show_profile($slug) {




		$blog = Post::whereSlug($slug)->with('image')
			->with('user')
			->with('tag')
			->first();


		$tag_slug = $blog->tag->slug;


		if ($tag_slug == 'publicaciones') {
			Session::flash('menu_pages', 'PUBLICACIONES');
		}else{

			if ($tag_slug == 'bonsai-para-todos') {
				Session::flash('menu_pages', 'BONSAI');
			}else{
				Session::flash('menu_pages', 'CLASES Y WORKSHOP');
			}
		}


		$last_blogs = Post::latest()
			->with('image')
			->with('tag')
			->where('id', '!=', $blog->id)
			->take(3)
			->get();

		$tags = DB::table('tags_posts')
			->leftJoin('posts', 'tags_posts.id', '=', 'posts.tag_id')
			->select('tags_posts.id as id', 'tags_posts.name as name', 'tags_posts.slug as slug', DB::raw("count(posts.tag_id) as count"))
			->groupBy('tags_posts.id')
			->where('posts.deleted_at', NULL)
			->get();

		return view('template_1.blog.perfil.index', compact('blog', 'last_blogs', 'tags'));
	}

	public function fetch_data_blogs(Request $request) {


		
		

		if ($request->ajax()) {

			$blogs = Post::wherePublished(1)
				->orderBy('id', 'DESC')
				->with('image')
				->with('tag')
				->with('user');

			if ($request->tag_slug) {
				$slug = $request->tag_slug;

				$tag = TagPost::whereSlug($slug)
					->first();

				$blogs = $blogs->whereTagId($tag->id);
			}

			if ($request->q) {
				$text_to_search = $request->q;

				$blogs = $blogs->where(function ($query) use ($text_to_search) {
					$query->where('title', 'like', "%$text_to_search%")
						->orWhere('content', 'like', "%$text_to_search%");
				});
			}

			$blogs = $blogs->paginate($request->per_page);

			return view("template_1.blog.list_blogs", compact('blogs'))->render();
		}

	}


	public function show_view_catalog() {
		Session::flash('menu_pages', 'LIBROS');
		// $path = $this->get_current_company_path();

		
		 $page = isset( $_GET["page"]) ? $_GET["page"]:  '1' ;
		$catalogs = DB::table('catalogs')
            ->where('published', true)
            ->where('deleted_at', null)
            ->select(['id', 'title', 'link', 'image_desktop', 'image_movil'])
            ->get();

    $count_catalogs = count($catalogs);

		return view('template_1.books.index', compact('catalogs','count_catalogs','page'));
	}

}
