<?php

namespace App\Http\Controllers\Template_8;

use App\Agreetment;
use App\Campaign;
use App\Category;
use App\Company;
use App\Content;
use App\Entities\CompanyCategory;
use App\Http\Controllers\Controller;
use App\Place;
use App\Post;
use App\Product;
use App\Service;
use App\Subcategory;
use App\Value;
use Illuminate\Contracts\View\View;

class GlobalController extends Controller {
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) {
		$categories = Category::wherePublished(1)
			->select(['id', 'name', 'icon', 'icon_white', 'slug'])
			->with(['subcategories' => function ($query) {
				$query->select(['id', 'category_id', 'name', 'slug']);
				$query->wherePublished(1);
			}])
			->get();

		$company_categories = CompanyCategory::with(['companies' => function ($query) {
			$query->select(['id', 'name_company', 'category_id', 'logotype_thumb', 'slug_company']);
		}])->get();

		$our_values = Value::wherePublished(1)->get();

		$company_main = Company::whereMain(1)->first();
		$company = Company::whereMain(1)->first();

		// $posts = Post::orderBy('id', 'DESC')
		// 	->wherePublished(1)
		// 	->with('image')
		// 	->take(4)
		// 	->get();

		$posts_wings = Post::with('image')
			->wherePublished(1)
			->get();

		$covers = Campaign::where('published', 1)
			->select(['id', 'image', 'image_thumb', 'link', 'title', 'link_text', 'subtitle', 'content'])
			->whereCategoryId(1)
			->get();

		$promotions = Campaign::where('published', 1)
			->select(['id', 'image', 'link', 'title'])
			->whereCategoryId(2)
			->get();

		$services = Service::wherePublished(1)
			->get();

		$agreetments = Agreetment::wherePublished(1)
			->where('deleted_at', '=', null)
			->get();

		$category_autos = Category::whereSlug('hyundai')
			->with(['subcategories' => function ($query) {
				$query->wherePublished(1);
				$query->whereHas('products');
			}])
			->first();
			

		$categories_with_products = Category::wherePublished(1)
			->whereHas('products', function ($query) {
				$query->wherePublished(1)
					->whereOutstanding(1);
			})
			->with(['products' => function ($query) {
				$query->wherePublished(1)
					->whereOutstanding(1)
					->with('photo')
					->with('subcategory')
					->with(['own_attributes' => function ($query) {
						$query->whereCategoryAttributeId(1);
					}])
				//->orderBy('id', 'ASC');
					->orderBy('updated_at', 'DESC');
			}])->get();

		$subcategories = Subcategory::wherePublished(1)
			->whereCategoryId(2)
			->with('category')
			->select(['id', 'name', 'slug', 'category_id'])
			->get();

		$category_attributes = $this->attributes_with_their_categories();

		$gallery_company = [];
		$gallery_company = Content::whereModel_type(1)->where('type', '=', 1)->where('deleted_at', '=', null)->get();

		$secction_promotions = Campaign::wherePublished(1)->where('category_id', '=', 2)->where('deleted_at', '=', null)->get();

		//Template_2
		$header_categories = Category::wherePublished(1)
			->select(['id', 'name', 'icon', 'slug'])
			->with(['subcategories' => function ($query) {
				$query->select(['id', 'category_id', 'name', 'slug']);
				$query->wherePublished(1);
			}])
			->get();

		$video = Content::whereModel_type(1)->where('type', '=', 2)
			->get();

		if (count($video) == 0) {
			$video = '';

		} else {
			$video = $video[0]->resource;
			$url_parsed_arr = parse_url($video);
			$video = substr($url_parsed_arr['query'], 2);
			//dd($video);
		}

		$featured_products = Product::with('photo')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->whereOutstanding(1)
			->select(['id', 'name', 'slug', 'promotion_available', 'price', 'price_promotion'])
			->get();

		$places = Place::all();
		$place_selected = session('place_id', $places[0]->id);
		$place_name_selected = session('place_name', $places[0]->name);

		$videos = Content::whereModel_type(1)->where('type', '=', 2)
			->take(2)
			->orderBy('id', 'DESC')
			->get();

		$view->with('categories', $categories)->with('company_categories', $company_categories)->with('company_main', $company_main)->with('values', $our_values)
		// ->with('posts', $posts)
			->with('posts_wings', $posts_wings)
			->with('covers', $covers)->with('promotions', $promotions)
			->with('category_attributes', $category_attributes)
			->with('categories_with_products', $categories_with_products)
			->with('company', $company)
			->with('subcategories', $subcategories)
			->with('services', $services)
			->with('category_autos', $category_autos)
			->with('gallery_company', $gallery_company)
			->with('header_categories', $header_categories)
			->with('secction_promotions', $secction_promotions)
			->with('video', $video)
			->with('featured_products', $featured_products)
			->with('agreetments', $agreetments)
			->with('places', $places)
			->with('place_selected', $place_selected)
			->with('place_name_selected', $place_name_selected)
			->with('videos', $videos);
	}

}
