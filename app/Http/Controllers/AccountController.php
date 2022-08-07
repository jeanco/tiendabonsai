<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Company;
use App\Etiquette;
use App\GalleryType;
use App\Order;
use App\PermissionUser;
use App\Place;
use App\Role;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Http\Request;

class AccountController extends Controller {
	public function dashboard() {
		// $categories = Category::orderBy('id', 'DESC')->get();
		// $arrayData = [];

		// foreach ($categories as $i => $category) {
		// 	$arrayData[$i]['categoryId'] = $category->id;
		// 	$arrayData[$i]['categoryName'] = $category->name;

		// 	foreach ($category->subcategories as $h => $subcategory) {
		// 		$arrayData[$i]['subcategories'][$h]['subcategoryId'] = $subcategory->id;
		// 		$arrayData[$i]['subcategories'][$h]['subcategoryName'] = $subcategory->name;
		// 		$arrayData[$i]['subcategories'][$h]['quantityOfProducts'] = count($subcategory->products);
		// 	}
		// }

		$user = Auth::user();
		$company_id = $user->company_id;

		$categories = Category::orderBy('id', 'ASC')
			->with(['products' => function ($query) use ($company_id) {
				$query->whereCompanyId($company_id);
				$query->select(['id', 'name', 'category_id', 'company_id']);
			}])
			->with(['subcategories' => function ($query) use ($company_id) {
				$query->with(['products' => function ($query) use ($company_id) {
					$query->whereCompanyId($company_id);
					$query->select(['id', 'name', 'subcategory_id', 'company_id']);
				}]);
			}])
			->get();

		$companies = Company::select(['id', 'name_company'])
			->get();

		$cities = City::all();

		$roles = Role::whereActivated(1)->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();

		$places = Place::all();
		$etiquettes = Etiquette::all();

		// $orders = DB::table('orders')
		// 	->join('customers', 'orders.customer_id', '=', 'customers.id')
		// 	->orderBy('id', 'DESC')
		// 	->take(10)
		// 	->get();

		$orders = Order::with('customer')
			->with('products')
			->orderBy('id', 'DESC')
			->take(10)
			->get();


		$quantity_products = DB::table('products')
			->where('deleted_at', null)
			->count();

		return view('admin.routers.dashboards', ['categories' => $categories, 'companies' => $companies, 'cities' => $cities, 'roles' => $roles, 'permissions_array' => $permissions_array, 'gallery_types' => $gallery_types, 'places' => $places, 'etiquettes' => $etiquettes, 'orders' => $orders, 'quantity_products' => $quantity_products]);

	}

	public  function dashboard_data(Request $request)
	{
		// $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
		// $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
		$start_date = $request->start_date;
		$end_date = $request->end_date;

		$quantity_products = DB::table('products')
			->where('deleted_at', null)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();

		$quantity_orders = DB::table('orders')
			->where('deleted_at', null)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();

		$quantity_subscriptions = DB::table('subscriptions')
			->where('deleted_at', null)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();

		$pending_orders = DB::table('orders')
			->where('deleted_at', null)
			->where('status', 1)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();

		$confirmed_orders = DB::table('orders')
			->where('deleted_at', null)
			->where('status', 2)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();

		$canceled_orders = DB::table('orders')
			->where('deleted_at', null)
			->where('status', 3)
			->whereDate('created_at', '>=', $start_date)
			->whereDate('created_at', '<=', $end_date)
			->count();


		#chart graph
		$period = CarbonPeriod::create($start_date, $end_date);
		$days_arr = [];
		$values_arr = [];
		// Iterate over the period
		foreach ($period as $date) {
			$orders = DB::table('orders')
				->where('deleted_at', null)
				->where('status', 2)
				->whereDate('created_at', $date->format('Y-m-d'))
				->count();

			$days_arr[] = $date->format('d/m/Y');
			$values_arr[] = $orders;
		}

		return ['quantity_products' => $quantity_products, 'quantity_orders' => $quantity_orders, 'quantity_subscriptions' => $quantity_subscriptions, 'pending_orders' => $pending_orders, 'confirmed_orders' => $confirmed_orders, 'canceled_orders' => $canceled_orders, 'days' => $days_arr, 'values' => $values_arr];



	}

}
