<?php

namespace App\Http\Controllers\Wings;

use App\City;
use App\Post;
use App\Value;
use App\Company;
use App\Content;
use App\Country;
use App\Product;
use App\Service;
use App\Campaign;
use App\Category;
use App\Testimony;
use Carbon\Carbon;
use App\Entities\TagPost;
use Jenssegers\Date\Date;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    public function main_view(){

        $company = Company::whereMain(1)
            ->with('city')
            ->with('country')
            ->first();

        $covers = Campaign::wherePublished(1)->where('category_id','=',1)->get();

            $covers_costumers = Campaign::wherePublished(1)->where('category_id','=',2)
            ->wherePublished(1)
            ->where('deleted_at','=',null)
            ->get();

        #Outstanding products!

        $category = Category::whereSlug('autos')
            ->with(['subcategories' => function($query){
                $query->wherePublished(1);
                $query->with(['products' => function($query){
                    $query->where('outstanding', true);
                    $query->orderBy('updated_at', 'DESC')
                    ->select(['id', 'name', 'price', 'slug', 'promotion_available', 'price_promotion', 'subcategory_id'])
                    ->with('photo');
                }]);
            }])->first();

        // $now = Carbon::now();
        // $from_five_months_ago = $now->subMonths(5);

        // $from_five_months_ago
        $last_autos_array = $this->last_autos();

        #Repuestos
        $spare_parts = Category::whereSlug('repuestos')
            ->with(['subcategories' => function($query){
                $query->wherePublished(1);
                $query->with(['products' => function($query){
                // $query->select(['id', 'name', 'subcategory_id', 'category_id']);
                $query->wherePublished(1);
                $query->with('photo');
                }]);
            }])->first();

        #Testimonies
        $testimonies = Testimony::wherePublished(1)
            ->get();

        $values = Value::wherePublished(1)
            ->get();

        $posts = Post::with('image')
            ->wherePublished(1)
            ->get();

        $videos = Content::whereModelType(1)
            ->whereType(2)
            ->get();

        $video_codes_array = [];

        foreach ($videos as $key => $video) {
            if (isset(explode('=', $video->resource)[1])) {
                $video_codes_array[] = explode('=', $video->resource)[1];
            }
        }

        // $services = Service::wherePublished(1)
        //     ->select(['id', 'name', 'slug'])
        //     ->get();

        return view('wings.home.index', compact('company', 'covers', 'category', 'last_autos_array', 'spare_parts', 'testimonies', 'values', 'posts', 'videos', 'video_codes_array', 'services','covers_costumers'));
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

    public function get_view_catalog(){

        $company = Company::whereMain(1)
            ->first();

        $last_autos_array = $this->last_autos();

        $category = Category::whereSlug('autos')
        ->with(['subcategories' => function($query){
            $query->wherePublished(1);
        }])->first();

		$category_attributes = $this->attributes_with_their_categories();

        $products = Product::with('photo')
        ->orderBy('id', 'DESC')
        ->wherePublished(1)
        ->paginate(3);

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        return view('wings.cars.index', compact('company', 'category', 'category_attributes', 'products', 'last_autos_array', 'services'));

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

        $company = Company::whereMain(1)->with('photos')->first();
        $last_autos_array = $this->last_autos();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

		return view("wings.about_as.index", compact('company', 'last_autos_array', 'services'));
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
}
