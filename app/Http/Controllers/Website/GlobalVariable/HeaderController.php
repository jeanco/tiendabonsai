<?php

namespace App\Http\Controllers\Website\GlobalVariable;

use App\Campaign;
use App\Category;
use App\Company;
use App\Entities\CompanyCategory;
use App\Http\Controllers\Controller;
use App\Post;
use App\Content;
use App\Service;
use App\Subcategory;
use App\Value;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class HeaderController extends Controller {
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view) {
		$categories = Category::wherePublished(1)
			->select(['id', 'name', 'icon', 'slug'])
			->with(['subcategories' => function ($query) {
				$query->select(['id', 'category_id', 'name', 'slug']);
				$query->wherePublished(1);
			}])
			->get();

		$company_categories = CompanyCategory::with(['companies' => function ($query) {
			$query->select(['id', 'name_company', 'category_id', 'logotype_thumb', 'slug_company']);
		}])->get();

		$our_values = Value::wherePublished(1)->where('deleted_at','=',null)->get();

		$company_main = Company::whereMain(1)->first();
		$company = Company::whereMain(1)->first();

		$posts = Post::orderBy('id', 'DESC')
			->select(['id', 'title', 'content', 'slug'])
			->wherePublished(1)
			->with('image')
			->take(3)
			->get();

		$posts_wings = Post::with('image')
            ->wherePublished(1)
            ->get();

		$covers = Campaign::where('published', 1)
			->select(['id', 'image',  'image_thumb', 'link', 'title', 'link_text', 'subtitle', 'content'])
			->whereCategoryId(1)
			->get();

		$promotions = Campaign::where('published', 1)
			->select(['id', 'image', 'link', 'title'])
			->whereCategoryId(2)
			->get();

		$services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
			->get();

		$category_autos = Category::whereSlug('autos')
			->with(['subcategories' => function($query){
				$query->wherePublished(1);
				$query->whereHas('products');
			}])
			->first();



        $last_autos_array = $this->last_autos();

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
         $gallery_company = Content::whereModel_type(1)->where('type','=',1)->where('deleted_at','=',null)->get();


		$view->with('categories', $categories)->with('company_categories', $company_categories)->with('company_main', $company_main)->with('values', $our_values)
			->with('posts', $posts)
			->with('posts_wings', $posts_wings)
			->with('covers', $covers)->with('promotions', $promotions)
			->with('category_attributes', $category_attributes)
			->with('categories_with_products', $categories_with_products)
			->with('company', $company)
			->with('subcategories', $subcategories)
			->with('services', $services)
			->with('last_autos_array', $last_autos_array)
			->with('category_autos', $category_autos)
			->with('gallery_company', $gallery_company);
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

        if (count($last_autos_created)) {
        	 foreach ($last_autos_created->products as $key => $product) {

            $last_autos_array[] = array(
                'name' => $product->name,
                'price' => $product->price,
                'slug' => $product->slug,
                'photo' => ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
                'date_formatted' => ucfirst(Date::parse($product->created_at)->format('F'))." ".$product->created_at->format('d\,Y'),
            );
        }
        }


       
       

        return $last_autos_array;
    }


}
