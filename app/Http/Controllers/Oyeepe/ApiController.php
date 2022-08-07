<?php

namespace App\Http\Controllers\Oyeepe;

use App\Order;
use App\Company;
use App\Product;
use App\Category;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;

class ApiController extends Controller {

    public function coupon_categories(){
        $category = Category::with(['subcategories'])
			->whereSlug('cupones')
			->first();

        $subcategories_array = [];

		if (!count($category)) {
			return $subcategories_array;
		}

        foreach ($category->subcategories as $key => $subcategory) {
            $subcategories_array[] = array(
				'id' => $subcategory->id,
				'slug' => $subcategory->slug,
                'name' => $subcategory->name,
            );
        }
        return $subcategories_array;
    }

    public function coupons(Request $request){
		if ($request->ajax()) {
			$products = (new Product)->newQuery();

			if ($request->category_id != '') {
				// $subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
				$products = $products->whereSubcategoryId($request->category_id);
            }
            // else {
			// 	if ($request->category_slug != '') {
			// 		$category_id = Category::whereSlug($request->category_slug)->first()->id;
			// 		$products = $products->whereCategoryId($category_id);
			// 	}
			// }

			// if ($request->brand_selected != '') {
			// 	#Marcas seleccionadas;
			// 	$attribute_ids = [];

			// 	$attribute_selected_ids_array = explode(',', $request->brand_selected);

			// 	foreach ($attribute_selected_ids_array as $key => $attribute_slug) {
			// 		$attribute_id = Attribute::whereSlug($attribute_slug)->first()->id;
			// 		$attribute_ids[] = $attribute_id;
			// 	}

			// 	$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
			// 		$query->whereIn('attributes.id', $attribute_ids);
			// 	});
			// }


			#Busqueda
			// if ($request->q != '') {
			// 	// return "Ok";
			// 	$text_to_search = $request->q;
			// 	$text_to_search_array = explode(' ', $request->q);

			// 	$attributes_id_searched = [];

			// 	foreach ($text_to_search_array as $key => $name) {
			// 		$attribute = Attribute::whereName($name)
			// 			->wherePublished(1)
			// 			->first();

			// 		if (count($attribute)) {
			// 			$attributes_id_searched[] = $attribute->id;
			// 		}
			// 	}

			// 	$products = $products->where('name', 'like', "%$text_to_search%")
			// 		->orWhere('description', 'like', "%$text_to_search%")
			// 		->wherePublished(1);

			// 	if ($request->subcategory_slug != '') {
			// 		$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
			// 		$products = $products->whereSubcategoryId($subcategory_id);
			// 	} else {
			// 		if ($request->category_slug != '') {
			// 			$category_id = Category::whereSlug($request->category_slug)->first()->id;
			// 			$products = $products->whereCategoryId($category_id);
			// 		}
			// 	}
			// 	// ->with(['own_attributes' => function ($query) {
			// 	// 	$query->whereCategoryAttributeId(1);
			// 	// }]);

			// 	if (count($attributes_id_searched)) {
			// 		$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
			// 			$query->whereIn('attributes.id', $attributes_id_searched);
			// 		})
			// 			->wherePublished(1);

			// 		if ($request->subcategory_slug != '') {
			// 			$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
			// 			$products = $products->whereSubcategoryId($subcategory_id);
			// 		} else {
			// 			if ($request->category_slug != '') {
			// 				$category_id = Category::whereSlug($request->category_slug)->first()->id;
			// 				$products = $products->whereCategoryId($category_id);
			// 			}
			// 		}
			// 		// ->with(['own_attributes' => function ($query) {
			// 		// 	$query->whereCategoryAttributeId(1);
			// 		// }])
			// 		// ;
			// 	}
			// }

            $products = $products->select(['id', 'name', 'slug', 'subcategory_id', 'description', 'created_at'])
                ->with(['photo' => function($query){
                    $query->select(['id', 'model_id', 'model_type', 'type', 'resource', 'resource_thumb', 'created_at']);
                }])
                ->with(['subcategory' => function($query){
                }])
				->orderBy('id', 'DESC')
                ->wherePublished(1);

			$products = $products->paginate(4);

            return $products;
			// $path = $this->get_current_company_path();
			// if ($path == 'website') {
			// 	return view('website.catalog.3_right_catalog', compact('products'))->render();
			// } else if ($path == 'oyeepe') {
			// 	return view('oyeepe.home.2_shop', compact('products'))->render();
			// } else if($path == 'yekatex'){
			// 	return view('yekatex.catalog.3_right_catalog', compact('products'))->render();
			// } else if ($path == 'divemotor'){
			// 	return view('divemotor.catalog..3_right_catalog', compact('products'))->render();
			// }
        }

	}

	public function show_coupon($id){

		$product = Product::with(['photo' => function($query){
			$query->select(['id', 'resource', 'resource_thumb', 'model_id', 'model_type', 'type']);
		}])
			->select(['id', 'name', 'slug', 'description', 'price', 'stock',
			'specifications', 'features'])
			->wherePublished(1)
			->find($id);

		return $product;

	}

	public function show_user_coupons(Request $request){
		$user_id = $request->user()->id;

		$customer = Customer::where('user_id', $user_id)
			->first();

		$orders_by_cupon = Order::whereCustomerId($customer->id)
			->with(['products' => function ($query) {
				$query->with('image');
			}])
			->whereOrderType(2)
			->get();

			$user_cupons = [];

			$now = Carbon::now();

			foreach ($orders_by_cupon as $key => $order) {

				$days_remaining = 0;
				$text_of_time_remaining = 'Cupón anulado';
				if ($order->status == 1) {
					$days_remaining = 7 - $now->diffInDays($order->created_at);

					$text_of_time_remaining = "Quedan {$days_remaining} días";

					if ($days_remaining == 0) {
						$hours_remaining = $now->diffInHours($order->created_at->addDays(7));
						$text_of_time_remaining = "Quedan {$hours_remaining} horas para usarse";
					}
				}

				$user_cupons[] = array(
					'id' => $order->id,
					'code' => $order->code,
					'image' => ($order->products[0]->photo != null) ? $order->products[0]->photo->resource : '',
					'name' => $order->products[0]->name,
					'price' => $order->products[0]->price,
					'promotion_available' => $order->products[0]->promotion_available,
					'price_promotional' => $order->products[0]->price_promotional,
					'coupon_status' => $order->status,
					'days_remaining' => $text_of_time_remaining,
				);
			}

			return $user_cupons;
	}

	public function register_coupon(Request $request){
		$product_id = $request->coupon_id;

		$user_id = $request->user()->id;

		$customer = Customer::whereUserId($user_id)
			->first();

		$customer_id = $customer->id;

		if (!count($customer)) {
			return response()->json(['title' => 'Error', 'message' => 'El cliente no existe!'], 400);
		}

		$data = $request->all();
		$data['account_id'] = 0;
		$data['description'] = "";

		$identity_document = $customer->identity_document;

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $product_id;
		$order_history->total = 0;
		$order_history->description = 'coupon';
		$order_history->customer_id = $customer_id;
		$order_history->account_id = 0;
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $product_id;
		$ids_array = explode(',', $product_ids);
		$valores = array_count_values($ids_array);

		$cart_array = [];
		$total = 0;

		$companies_id_array = [];

		$order_type = 2;

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;
			$product = Product::find($key);

			// if ($product->category_id == 3) {
			// 	$order_type = 2;
			// }

			$price = $product->price;

			if ($product->promotion_available == 1) {
				$price = $product->price_promotion;
			}

			$cart_array[] = array(
				'id' => $key,
				#Se vende a este precio
				'price' => $price,
				'quantity' => $value,
				'company_id' => $product->company_id,
				#precio original
				'discount' => $product->price,
			);

			$companies_id_array[] = $product->company_id;
		}

		$companies = Company::whereIn('id', $companies_id_array)
			->get();

		// $total_general = 0;

		foreach ($companies as $key => $company) {
			$company_id = $company->id;

			$customer->companies()->attach($company_id);

			// $total = 0;

			$order = new Order;
			$order->code = '';
			$order->description = $data['description'];
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->order_type = $order_type;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->save();

			$order->code = $order->id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					// $total += (float) $product['price'];

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			$order->save();
		}

		$product = Product::find($product_id);
		$product->stock = $product->stock - 1;
		$product->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha registrado el cupón'], 200);
	}
}
