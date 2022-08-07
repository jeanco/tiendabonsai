<?php

namespace App\Http\Controllers\Template_1;

use App\Campaign;
use App\Category;
use App\City;
use App\Company;
use App\Content;
use App\Country;
use App\Entities\TagPost;
use App\Etiquette;
use App\Http\Controllers\Controller;
use App\Place;
use App\Post;
use App\Product;
use App\Service;
use App\Testimony;
use App\Value;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Session;

class IndexController extends Controller {

    public function main_view(Request $request){
        Session::flash('menu_pages', '');
        // $company = Company::whereMain(1)
        //     ->with('city')
        //     ->with('country')
        //     ->first();

        // $covers = Campaign::wherePublished(1)->where('category_id','=',1)->get();

        //     $covers_costumers = Campaign::wherePublished(1)->where('category_id','=',2)
        //     ->wherePublished(1)
        //     ->where('deleted_at','=',null)
        //     ->get();

        // #Outstanding products!

        // $category = Category::whereSlug('autos')
        //     ->with(['subcategories' => function($query){
        //         $query->wherePublished(1);
        //         $query->with(['products' => function($query){
        //             $query->where('outstanding', true);
        //             $query->orderBy('updated_at', 'DESC')
        //             ->select(['id', 'name', 'price', 'slug', 'promotion_available', 'price_promotion', 'subcategory_id'])
        //             ->with('photo');
        //         }]);
        //     }])->first();

        // // $now = Carbon::now();
        // // $from_five_months_ago = $now->subMonths(5);

        // // $from_five_months_ago
        // #Repuestos
        // $spare_parts = Category::whereSlug('repuestos')
        //     ->with(['subcategories' => function($query){
        //         $query->wherePublished(1);
        //         $query->with(['products' => function($query){
        //         // $query->select(['id', 'name', 'subcategory_id', 'category_id']);
        //         $query->wherePublished(1);
        //         $query->with('photo');
        //         }]);
        //     }])->first();

        // #Testimonies
        // $testimonies = Testimony::wherePublished(1)
        //     ->get();

        // $values = Value::wherePublished(1)
        //     ->get();

        // $posts = Post::with('image')
        //     ->wherePublished(1)
        //     ->get();

        // $videos = Content::whereModelType(1)
        //     ->whereType(2)
        //     ->get();

        // $video_codes_array = [];

        // foreach ($videos as $key => $video) {
        //     if (isset(explode('=', $video->resource)[1])) {
        //         $video_codes_array[] = explode('=', $video->resource)[1];
        //     }
        // }

        // $services = Service::wherePublished(1)
        //     ->select(['id', 'name', 'slug'])
        //     ->get();
        $place = Place::first();
        $place_id_selected = $request->session()->get('place_id');
        $place_id = $place_id_selected;
        if (!$place_id_selected) {
            $place_id = $place->id;
        }


        $banners = Campaign::wherePublished(1)
            ->whereCategoryId(1)
            ->get();

        $categories = Category::wherePublished(1)
            ->whereHas('products', function($q){
                $q->wherePublished(1);
            })
            ->get();

        /*$simple_banner = Campaign::wherePublished(1)
            ->whereCategoryId(2)
            ->first();*/
        $categories_featured = Category::wherePublished(1)
            ->whereHas('products', function ($query) {
                $query->wherePublished(1)
                    ->whereOutstanding(1);
            })
            ->with(['products' => function ($query) use ($place_id){
                $query->wherePublished(1)
                    ->whereOutstanding(1)
                    ->with('main_photo')
                    ->with('other_photo')
                    ->where('is_main_product', true)
                    ->with(['product_child' => function($query){
                        $query->orderBy('price', 'ASC');
                        $query->where('is_main_product', false);
                    }]);
            }])->get();

   //      $promoted_products = Product::with('photo')
			// ->orderBy('id', 'DESC')
   //          ->wherePublished(1)
   //          ->wherePromotionAvailable(1)
   //          ->select(['id', 'name', 'slug', 'promotion_available', 'price', 'price_promotion','stock'])
   //          ->get();
        #promoted and outstanded
        $promoted_products = DB::table('products')
            ->where('published', true)
            ->where('promotion_available', true)
            ->where('outstanding_promotion', true)
            ->where('is_main_product', true)
            ->where('promotion_image', '!=', '')
            ->where('deleted_at', null)
            ->select(['id', 'name', 'slug', 'promotion_image'])
            ->get();

   //      $featured_products = Product::with('photo')
			// ->orderBy('id', 'DESC')
   //          ->wherePublished(1)
   //          ->whereOutstanding(1)
   //          ->select(['id', 'name', 'slug', 'promotion_available', 'price', 'price_promotion'])
   //          ->with(['unit_price' => function($query) use ($place_id_selected){
   //              if ($place_id_selected) {
   //                  $query->wherePlaceId($place_id_selected);
   //              } else {
   //                  $query->wherePlaceId(1);
   //              }
   //          }])
   //          ->get();
        $catalogs = DB::table('catalogs')
            ->where('published', true)
            ->where('deleted_at', null)
            ->select(['id', 'title', 'link', 'image_desktop', 'image_movil'])
            ->get();

        $catalog_rows = ceil(count($catalogs)/2);

        return view('template_1.home.index', compact('banners', 'categories','categories_featured', 'place_id_selected', 'promoted_products', 'catalogs', 'catalog_rows'));
    }

    public function get_view_construction() {

        $company = Company::whereMain(1)
            ->first();

        return view('template_1.construction.index', compact('company'));
    }

    public function cotiza_view(){

        $company = Company::whereMain(1)
            ->first();

        $last_autos_array = $this->last_autos();

        $category = Category::whereSlug('autos')
        ->with(['products' => function($query){
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

    public function get_view_catalog(Request $request){
        Session::flash('menu_pages', 'TIENDA');
        // $company = Company::whereMain(1)
        //     ->first();

        // $category = Category::whereSlug('autos')
        // ->with(['subcategories' => function($query){
        //     $query->wherePublished(1);
        // }])->first();

		// $category_attributes = $this->attributes_with_their_categories();
        $place = Place::first();
        $place_id_selected = $request->session()->get('place_id');
        $place_id = $place_id_selected;
        if (!$place_id_selected) {
            $place_id = $place->id;
        }

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
			->select(['id', 'name', 'icon','icon_white', 'slug'])
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
        // $category_slug = $request->categoria;
        // $subcategory_slug = $request->subcategoria;
        $etiquette_id = '';

        return view('template_1.catalog.index', compact('products', 'simple_banner', 'categories', 'category_attributes', 'place_id_selected', 'etiquette_id'));

    }

    public function get_view_spare_parts(){

        $company = Company::whereMain(1)
            ->first();

        $category_attributes = $this->attributes_with_their_categories();

        $products = Product::with('photo')
        ->orderBy('id', 'DESC')
        ->wherePublished(1)
        ->paginate(3);

        $category = Category::whereSlug('repuestos')
        ->with(['subcategories' => function($query){
            $query->wherePublished(1);
            $query->with(['products' => function($query){
                $query->wherePublished(1);
                $query->select(['id', 'subcategory_id', 'category_id']);
            }]);
        }])
        ->with(['products' => function($query){
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

    public function get_view_blog(){
        $company = Company::whereMain(1)
        ->first();

        $last_autos_array = $this->last_autos();

		$blogs = Post::orderBy('id', 'DESC')
            ->wherePublished(1)
            ->with('tag')
			->paginate(4);

        $tags = TagPost::with(['posts' => function($query){
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

    public function get_view_perfil_spare_parts(){
        $company = Company::whereMain(1)
        ->first();

        return view('wings.catalog.perfil.index', compact('company'));
    }

    public function get_view_contact(){
        $company = Company::whereMain(1)
        ->first();
        $last_autos_array = $this->last_autos();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        return view('wings.contact.index', compact('company', 'last_autos_array', 'services'));
    }

    public function get_view_services(){
        $company = Company::whereMain(1)
        ->first();

        $last_autos_array = $this->last_autos();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        return view('wings.services.index', compact('company', 'last_autos_array', 'services'));
    }

    public function get_view_about_us(){

        Session::flash('menu_pages', 'NOSOTROS');
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
        }*/

        $gallery_company = [];
         $gallery_company = Content::whereModel_type(1)->where('type','=',1)->where('deleted_at','=',null)->get();

		return view("template_1.we.index", compact('company', 'last_autos_array', 'services','gallery_company'));
    }

    public function get_view_concesionario(){
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

    public function order_view(){

        $company = Company::whereMain(1)
            ->first();

        $last_autos_array = $this->last_autos();

        $category = Category::whereSlug('autos')
        ->with(['products' => function($query){
            $query->wherePublished(1);
        }])->first();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        return view('wings.checkout.shopping_cart', compact('company', 'last_autos_array', 'services'));
    }

    public function info_view(){

        $company = Company::whereMain(1)
            ->first();

        $last_autos_array = $this->last_autos();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        $category = Category::whereSlug('autos')
        ->with(['products' => function($query){
            $query->wherePublished(1);
        }])->first();

        $countries = Country::all();

        return view('wings.checkout.check_out', compact('company', 'last_autos_array', 'countries', 'services'));
    }

    public function confirm_view(){

        $company = Company::whereMain(1)
            ->first();

        $last_autos_array = $this->last_autos();

        $category = Category::whereSlug('autos')
        ->with(['products' => function($query){
            $query->wherePublished(1);
        }])->first();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        return view('wings.checkout.order_complete', compact('company', 'last_autos_array', 'services'));
    }

    public function get_view_catalog_etiquette($etiquette_slug){

        $products = Product::with('photo')
            ->orderBy('id', 'DESC')
            ->wherePublished(1)
            ->paginate(3);

        $simple_banner = Campaign::wherePublished(1)
            ->first();

        $etiquette = Etiquette::whereSlug($etiquette_slug)
            ->wherePublished(1)
            ->first();

        if (!count($etiquette)) {
            return view('template_1.catalog.etiquette_not_found');
        }

        $category_attributes = $this->attributes_with_their_categories();

        $etiquette_id = $etiquette->id;
        $etiquette_flag = true;
        return view('template_1.catalog.index', compact('products', 'simple_banner', 'categories', 'category_attributes', 'etiquette_id'));


    }
}
