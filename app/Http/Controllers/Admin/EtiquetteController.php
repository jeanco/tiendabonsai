<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Etiquette;
use App\GalleryType;
use App\Http\Controllers\Controller;
use App\PermissionUser;
use App\Place;
use Auth;
use Illuminate\Http\Request;
use App\Product;
use DB;

class EtiquetteController extends Controller {

	public function get_config_etiquettes_view(Request $request) {

		$etiquette = Etiquette::find($request->etiquette_id);

		$categories = Category::orderBy('id', 'DESC')
			->whereHas('subcategories_published')
			->wherePublished(1)
			->get();

		$user = Auth::user();

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

		$places = Place::all();
		$gallery_types = GalleryType::all();

		$products = DB::table('products')
			->select(['products.id', 'products.sku', 'products.name', 'categories.name as category_name',
			'subcategories.name as subcategory_name'])
			->join('categories', 'products.category_id', '=', 'categories.id')
			->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
			->join('etiquette_product', 'products.id', '=', 'etiquette_product.product_id')
			->where('etiquette_product.etiquette_id', $etiquette->id)
			->get();

		return view('admin.routers.config_etiquettes', compact('etiquette', 'permissions_array', 'places', 'gallery_types', 'categories', 'products'));
	}

	public function store_configuration(Request $request){
		$etiquette_id = $request->etiquette_id;
		$product_ids = $request->product_id;
		$subcategory_id = $request->subcategory_id;

		$etiquette = Etiquette::find($etiquette_id);
		// $etiquette->products()->wherePivot('subcategory_id', '=', $subcategory_id)->detach();
		if ($product_ids) {
			$etiquette->products()->attach($product_ids, ['subcategory_id' => $subcategory_id]);
		}

		return;

	}

	public function get_products_by_etiquette_and_subcategory($etiquette_id, $subcategory_id){

		$products_selected = DB::table('etiquette_product')
			->join('products', 'etiquette_product.product_id', '=', 'products.id')
			->where('etiquette_product.etiquette_id', $etiquette_id)
			->where('products.subcategory_id', $subcategory_id)
			->where('products.deleted_at', null)
			->pluck('products.id', 'products.name');

		$products = Product::whereSubcategoryId($subcategory_id)
			->select(['id', 'name', 'subcategory_id'])
			->whereColumn('id', '!=', 'main_product_id')
			->get();

		return ['products' => $products, 'products_selected' => $products_selected];
	}

	public function delete_configuration(Request $request){
		$etiquette_id = $request->etiquette_id;
		$product_ids = $request->product_id;
		$subcategory_id = $request->subcategory_id;
		
		$etiquette = Etiquette::find($etiquette_id);
		$etiquette->products()->detach($product_ids);
	}


	public function show($id){
		$etiquette = Etiquette::find($id);
		return $etiquette;
	}

	public function all(){
		$etiquettes = Etiquette::all();
		return $etiquettes;
	}

	public function store(Request $request){
		$etiquette = new Etiquette();
		$etiquette->fill($request->all());
		$etiquette->slug = str_slug($request->name);
		$etiquette->save();
		return $etiquette->id;
	}

	public function update($id, Request $request){
		$etiquette = Etiquette::find($id);
		$etiquette->fill($request->all());
		$etiquette->slug = str_slug($request->name);
		
		$etiquette->save();
		return;

	}

	public function delete($id){
		$etiquette = Etiquette::find($id);
		$etiquette->products()->detach();
		$etiquette->delete();
		return response()->json(['message' => 'Se ha eliminado']);
	}

}
