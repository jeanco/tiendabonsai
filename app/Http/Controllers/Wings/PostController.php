<?php

namespace App\Http\Controllers\Wings;

use App\Post;
use App\Company;
use App\Service;
use App\Category;
use Carbon\Carbon;
use App\Entities\TagPost;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller {

	public function show_profile($slug) {

		$blog = Post::whereSlug($slug)->with('image')
            ->with('user')
            ->with('tag')
			->first();

        $tags = TagPost::with(['posts' => function($query){
            $query->wherePublished(1);
            $query->select(['id', 'tag_id']);
        }])
        ->get();

		$recent_blogs = Post::where('id', '!=', $blog->id)
			->orderBy('id', 'DESC')
            ->with('image')
            ->with('tag')
			->take(3)
            ->get();

        $company = Company::whereMain(1)
            ->first();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        $last_autos_array = $this->last_autos();

        return view('wings.blog.perfil.index', compact('company', 'blog', 'tags', 'last_autos_array', 'recent_blogs', 'services'));
		// return view("{$path}.blog.perfil.index", compact('blog', 'tags', 'recent_blogs', 'quantity_of_blogs'));
	}

	public function fetch_data_posts(Request $request) {
		if ($request->ajax()) {
			$blogs = Post::with('image')
				->orderBy('id', 'DESC')
				->wherePublished(1);

			if ($request->tag_id != '') {

                $tag_post = TagPost::whereSlug($request->tag_id)
                    ->first();

				$blogs = $blogs->whereTagId($tag_post->id);
			}

			$blogs = $blogs->paginate($request->per_page);
			// $path = $this->get_current_company_path();
			return view("wings.blog.1_list", compact('blogs'))->render();
		}
    }

    public function last_autos(){

        $now = Carbon::now();
        $from_five_months_ago = $now->subMonths(5);

        // $from_five_months_ago

        $last_autos_created = Category::whereSlug('autos')
            ->with(['products' => function($query) use ($from_five_months_ago){
                $query->where('created_at', '>=', $from_five_months_ago)
                    ->orderBy('created_at', 'DESC')
                    ->wherePublished(1)
                    ->with('photo');
            }])
            ->first();

        #Last autos created array;
        $last_autos_array = [];

        foreach ($last_autos_created->products as $key => $product) {

            $last_autos_array[] = array(
                'name' => $product->name,
                'price' => $product->price,
                'slug' => $product->slug,
                'photo' => ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
                'date_formatted' => ucfirst(Date::parse($product->created_at)->format('F'))." ".$product->created_at->format('d\,Y'),
            );
        }

        return $last_autos_array;
    }
}
