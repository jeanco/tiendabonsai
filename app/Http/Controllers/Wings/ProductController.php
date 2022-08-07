<?php

namespace App\Http\Controllers\Wings;

use App\Company;
use App\Product;
use App\Service;
use App\Category;
use App\Attribute;
use Carbon\Carbon;
use App\GalleryType;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function get_view($slug){

        $company = Company::whereMain(1)
            ->first();

        $product = Product::with('images')
            ->whereSlug($slug)
            ->first();

        $video_code_array = explode('=', $product->link);
        $video_code = '';

        if (isset($video_code_array[1])) {
            $video_code = $video_code_array[1];
        }

		$services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

		$related_products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
            ->with('photo')
            // ->with('')
            ->take(3)
            ->get();


		$last_autos_array = $this->last_autos();
        return view('wings.cars.perfil.index', compact('company', 'product', 'video_code', 'related_products', 'last_autos_array', 'services'));
    }

	public function fetch_data_catalog(Request $request){

		if ($request->ajax()) {

            $cars_category = Category::whereSlug('repuestos')->first();

			$products = Product::with('photo')
                ->orderBy('id', 'DESC')
                ->whereCategoryId($cars_category->id)
				->wherePublished(1);

			if ($request->category_id != '') {
				$products = $products->whereSubcategoryId($request->category_id);
			}

			if ($request->attributes_id != '') {
				#Marcas seleccionadas;
				$attribute_ids = [];

				$attribute_selected_ids_array = explode(',', $request->attributes_id);

				foreach ($attribute_selected_ids_array as $key => $attribute_id) {
					// $attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
					$attribute_ids[] = $attribute_id;
				}

				$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
					$query->whereIn('attributes.id', $attribute_ids);
				});
			}

			if ($request->q != '') {
				// return "Ok";
				$text_to_search = $request->q;
				$text_to_search_array = explode(' ', $request->q);

				$attributes_id_searched = [];

				foreach ($text_to_search_array as $key => $name) {
					$attribute = Attribute::whereName($name)
						->wherePublished(1)
						->first();

					if (count($attribute)) {
						$attributes_id_searched[] = $attribute->id;
					}
				}

				$products = $products->where('name', 'like', "%$text_to_search%")
					->orWhere('description', 'like', "%$text_to_search%")
					->wherePublished(1);

				if ($request->category_id != '') {
					$products = $products->whereCategoryId($request->category_id);
				}

				if (count($attributes_id_searched)) {
					$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
						$query->whereIn('attributes.id', $attributes_id_searched);
					})
						->wherePublished(1);

					if ($request->category_id != '') {
						$products = $products->whereCategoryId($request->category_id);
					}
				}
			}

            $products = $products->paginate($request->per_page);

			return view("wings.catalog.2_list", compact('products'))->render();
		}
	}

	public function fetch_data_cars(Request $request) {

		if ($request->ajax()) {

            $cars_category = Category::whereSlug('autos')->first();

			$products = Product::with('photo')
                ->orderBy('id', 'DESC')
                ->whereCategoryId($cars_category->id)
				->wherePublished(1);

			if ($request->category_id != '') {
				$products = $products->whereSubcategoryId($request->category_id);
			}

			if ($request->attributes_id != '') {
				#Marcas seleccionadas;
				$attribute_ids = [];

				$attribute_selected_ids_array = explode(',', $request->attributes_id);

				foreach ($attribute_selected_ids_array as $key => $attribute_id) {
					// $attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
					$attribute_ids[] = $attribute_id;
				}

				$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
					$query->whereIn('attributes.id', $attribute_ids);
				});
			}

			if ($request->q != '') {
				// return "Ok";
				$text_to_search = $request->q;
				$text_to_search_array = explode(' ', $request->q);

				$attributes_id_searched = [];

				foreach ($text_to_search_array as $key => $name) {
					$attribute = Attribute::whereName($name)
						->wherePublished(1)
						->first();

					if (count($attribute)) {
						$attributes_id_searched[] = $attribute->id;
					}
				}

				$attribute = Attribute::whereName($text_to_search)
						->wherePublished(1)
						->first();

				if (count($attribute)) {
					$attributes_id_searched[] = $attribute->id;
				}

				$products = $products->where('name', 'like', "%$text_to_search%")
					->orWhere('description', 'like', "%$text_to_search%")
					->wherePublished(1)
					->whereCategoryId($cars_category->id);

				#In this case is subcategory
				if ($request->category_id != '') {
					$products = $products->whereSubcategoryId($request->category_id);
				} else {
					$products = $products->orWhereHas('subcategory', function ($query) use ($text_to_search) {
						$query->where('name', 'like', "%$text_to_search%");
					})
						->wherePublished(1)
						->whereCategoryId($cars_category->id);
				}

				if (count($attributes_id_searched)) {
					$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
						$query->whereIn('attributes.id', $attributes_id_searched);
					})
						->wherePublished(1)
						->whereCategoryId($cars_category->id);

					#In this case is subcategory
					if ($request->category_id != '') {
						$products = $products->whereSubcategoryId($request->category_id);
					}
				}
			}

            $products = $products->paginate($request->per_page);

			return view("wings.cars.2_list", compact('products'))->render();
		}
	}

	public function get_view_spare_part($slug){

		$company = Company::whereMain(1)
				->first();

		$product = Product::with('images')
			->whereSlug($slug)
			->first();

		$services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

		$video_code_array = explode('=', $product->link);
		$video_code = '';

		if (isset($video_code_array[1])) {
			$video_code = $video_code_array[1];
		}

		$related_products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('photo')
			// ->with('')
			->take(3)
			->get();

		#Categories
        $category = Category::whereSlug('repuestos')
        ->with(['subcategories' => function($query){
            $query->wherePublished(1);
            $query->with(['products' => function($query){
                $query->wherePublished(1);
                $query->select(['id', 'subcategory_id', 'category_id']);
            }]);
        }])->first();

        $last_autos_array = $this->last_autos();

		return view('wings.catalog.perfil.index', compact('company', 'product', 'video_code', 'related_products', 'category', 'last_autos_array', 'services'));
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

	public function specifications_view($slug){

        $product = Product::with('images')
			->whereSlug($slug)
			->with(['attributes' => function($query){
				$query->where('attributes.published', 1);
			}])
			->first();

		$related_products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('photo')
			// ->with('')
			->take(3)
			->get();

		return view('wings.cars.perfil.specifications', compact('product', 'related_products'));
	}

	public function gallery_view($slug){

		$product = Product::whereSlug($slug)
			->first();

		$product_id = $product->id;

		$gallery_types = GalleryType::with(['contents' => function($query) use ($product_id){
			$query->whereModelId($product_id);
			$query->whereModelType(2);
		}])
			->get();

		return view('wings.cars.perfil.gallery', compact('gallery_types', 'product'));
	}


}
