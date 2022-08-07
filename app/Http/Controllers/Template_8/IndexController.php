<?php

namespace App\Http\Controllers\Template_8;

use App\Campaign;
use App\Category;
use App\City;
use App\Company;
use App\Content;
use App\Country;
use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Service;
use App\Staff;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class IndexController extends Controller {

	public function main_view() {

		$banners = Campaign::wherePublished(1)
			->whereCategoryId(1)
			->get();

		$categories = Category::wherePublished(1)
			->whereHas('products', function ($q) {
				$q->wherePublished(1);
			})
			->get();

		//      /*$simple_banner = Campaign::wherePublished(1)
		//          ->whereCategoryId(2)
		//          ->first();*/

		$promoted_products = Product::with('photo')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->wherePromotionAvailable(1)
			->select(['id', 'name', 'slug', 'promotion_available', 'price', 'price_promotion', 'category_id', 'subcategory_id'])
			->with('category')
			->with('subcategory')
			->get();

		$categories_featured = Category::wherePublished(1)
			->whereHas('products', function ($q) {
				$q->wherePublished(1)->whereOutstanding(1);
			})
			->with(['products' => function ($query) {
				$query->wherePublished(1)
					->whereOutstanding(1)
					->with('photo')
					->with('subcategory');
			}])
			->get();

		$posts = Post::latest()
			->with('image')
			->with('tag')
			->take(3)
			->get();

		$last_products = Product::with('main_photo')
			->with(['own_attributes' => function ($query) {
				$query->with('category_attribute');
			}])
			->orderBy('id', 'DESC')
			->take(10)
			->get();

		return view('template_8.home.index', compact('categories', 'promoted_products', 'categories_featured', 'banners', 'posts', 'last_products'));
	}

	public function get_view_about_us() {

		$company = Company::whereMain(1)->with('photos')->first();
		/*$last_autos_array = $this->last_autos();*/

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();
		/* $video = Content::whereModel_type(1)->where('type', '=', 2)->where('deleted_at', '=', null)->get();
			                        if (count($video) == 0) {
			                        $video='';

			                    } else {
			                        $video=$video[0]->resource;
			                        $url_parsed_arr = parse_url($video);
			                        $video = substr($url_parsed_arr['query'], 2);
			                        //dd($video);
		*/

		$gallery_company = [];
		$gallery_company = Content::whereModel_type(1)->where('type', '=', 1)->where('deleted_at', '=', null)->get();

		$staff = Staff::whereType(1)
			->get();

		return view("template_8.we.index", compact('company', 'last_autos_array', 'services', 'gallery_company', 'staff'));
	}

	##DELETE----

	public function cotiza_view() {

		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$category = Category::whereSlug('autos')
			->with(['products' => function ($query) {
				$query->wherePublished(1);
				$query->select(['id', 'category_id', 'name', 'slug']);
			}])->first();

		$vehicles = $category->products;

		$cities = City::all();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.checkout.quotation', compact('company', 'last_autos_array', 'vehicles', 'cities', 'services'));
	}

	public function get_view_catalog() {

		// $company = Company::whereMain(1)
		//     ->first();

		// $category = Category::whereSlug('autos')
		// ->with(['subcategories' => function($query){
		//     $query->wherePublished(1);
		// }])->first();

		// $category_attributes = $this->attributes_with_their_categories();

		$products = Product::with('photo')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->paginate(3);

		// $services = Service::wherePublished(1)
		//     ->select(['id', 'name', 'slug'])
		//     ->get();

		$simple_banner = Campaign::wherePublished(1)
			->first();

		$categories = Category::wherePublished(1)
			->select(['id', 'name', 'icon', 'icon_white', 'slug'])
			->with(['subcategories' => function ($query) {
				$query->select(['id', 'category_id', 'name', 'slug']);
				$query->wherePublished(1);
			}])
			->get();

		$category_attributes = $this->attributes_with_their_categories();

		// $categories = DB::table('categories')
		//     ->join('products', 'categories.id', '=', 'products.category_id')
		//     ->select('categories.id', 'categories.name', DB::raw("count(products.category_id) as count"))
		//     ->where('categories.published', 1)
		//     ->where('products.published', 1)
		//     ->where('categories.deleted_at', NULL)
		//     ->where('products.deleted_at', NULL)
		//     ->groupBy('categories.id')
		//     ->get();

		return view('template_8.catalog.index', compact('products', 'categories', 'category_attributes'));

	}

	public function get_view_spare_parts() {

		$company = Company::whereMain(1)
			->first();

		$category_attributes = $this->attributes_with_their_categories();

		$products = Product::with('photo')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->paginate(3);

		$category = Category::whereSlug('repuestos')
			->with(['subcategories' => function ($query) {
				$query->wherePublished(1);
				$query->with(['products' => function ($query) {
					$query->wherePublished(1);
					$query->select(['id', 'subcategory_id', 'category_id']);
				}]);
			}])
			->with(['products' => function ($query) {
				$query->wherePublished(1);
				$query->select(['id', 'subcategory_id', 'category_id']);
			}])
			->first();

		$last_autos_array = $this->last_autos();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.catalog.index', compact('company', 'category', 'category_attributes', 'products', 'last_autos_array', 'services'));
	}

	public function get_view_blog() {
		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$blogs = Post::orderBy('id', 'DESC')
			->wherePublished(1)
			->with('tag')
			->paginate(4);

		$tags = TagPost::with(['posts' => function ($query) {
			$query->wherePublished(1);
			$query->select(['id', 'tag_id']);
		}])
			->get();

		// $blogs_other = Post::with('image')
		// 	->wherePublished(1)
		// 	->get();
		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.blog.index', compact('company', 'last_autos_array', 'blogs', 'tags', 'services'));
	}

	public function get_view_perfil_spare_parts() {
		$company = Company::whereMain(1)
			->first();

		return view('wings.catalog.perfil.index', compact('company'));
	}

	public function get_view_contact() {
		$company = Company::whereMain(1)
			->first();
		$last_autos_array = $this->last_autos();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.contact.index', compact('company', 'last_autos_array', 'services'));
	}

	public function get_view_services() {
		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.services.index', compact('company', 'last_autos_array', 'services'));
	}

	public function get_view_concesionario() {
		$company = Company::whereMain(1)
			->first();
		$last_autos_array = $this->last_autos();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		$companies = Company::whereStatus(1)
			->select(['id', 'name_company', 'address', 'cel', 'description_company'])
			->get();

		return view('wings.concessionaire.index', compact('company', 'services', 'last_autos_array', 'companies'));

	}

	public function last_autos() {

		$now = Carbon::now();
		$from_five_months_ago = $now->subMonths(5);

		// $from_five_months_ago

		$last_autos_created = Category::whereSlug('autos')
			->with(['products' => function ($query) use ($from_five_months_ago) {
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
				'date_formatted' => ucfirst(Date::parse($product->created_at)->format('F')) . " " . $product->created_at->format('d\,Y'),
			);
		}

		return $last_autos_array;
	}

	public function order_view() {

		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$category = Category::whereSlug('autos')
			->with(['products' => function ($query) {
				$query->wherePublished(1);
			}])->first();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.checkout.shopping_cart', compact('company', 'last_autos_array', 'services'));
	}

	public function info_view() {

		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		$category = Category::whereSlug('autos')
			->with(['products' => function ($query) {
				$query->wherePublished(1);
			}])->first();

		$countries = Country::all();

		return view('wings.checkout.check_out', compact('company', 'last_autos_array', 'countries', 'services'));
	}

	public function confirm_view() {

		$company = Company::whereMain(1)
			->first();

		$last_autos_array = $this->last_autos();

		$category = Category::whereSlug('autos')
			->with(['products' => function ($query) {
				$query->wherePublished(1);
			}])->first();

		$services = Service::wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return view('wings.checkout.order_complete', compact('company', 'last_autos_array', 'services'));
	}
}
