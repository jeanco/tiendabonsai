<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoriesController extends Controller
{	
	public function postCategory(CategoryRequest $request)
	{	
		try {
			$data = $request->all();
			$category = new Category();
			$category->fill($data);
			$category->slug = str_slug($request->name,'-');
			$category->published = 1;
			$category->save();

			return response()->json(['success'=>true,'category'=>$category],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function putCategory(CategoryUpdateRequest $request)
	{
		try {
			$data = $request->all();
			$category = Category::find($request->category_id);
			$category->fill($data);
			$category->slug = str_slug($request->name,'-');
			$category->published = 0;

			if ($request->published != null){
				$category->published = $request->published;
			}
			$category->save();
			return response()->json(['success'=>true,'category'=>$category],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function getCategroyById($categoryId)
	{	
		$category  = Category::find($categoryId);
		return response()->json(['category'=>$category],200);
	}

	public function getFirstCategory()
	{
		$categories = Category::all();
		foreach ($categories as $k => $category) {
			if (count($category->subcategories)) {
				return response()->json(['category'=>$category],200);
			}
		}

		$category = Category::first();
		return response()->json(['category'=>$category],200);
	}

	public function getFirstSubcategoryOfACategory($categoryId)
	{
		$category = Category::find($categoryId);
		$subcategory = $category->subcategories->first();
		return response()->json(['subcategory'=>$subcategory],200);
	}

	// public  function deleteCategory(Request $request)
	// {
	// 	try {
	// 		$category = Category::find($request->categoryId);
	// 		$this->deleteProductsByCategory($category->id);
	// 		$this->deleteSubcategoriesByCategory($category->id);
	// 		$category->delete();
	// 		return response()->json(['success'=>true],200);
	// 	} catch (Exception $e) {
	// 		return response()->json(['success'=>false],200);
	// 	}
	// }

	//Mover esta function
	// public function deleteProductsByCategory($categoryId)
	// {
	// 	$products = Product::where('category_id',$categoryId)->get();
	// 	foreach ($products as $key => $product) {
	// 		$product->delete();
	// 	}
	// }

	// public  function deleteSubcategoriesByCategory($categoryId)
	// {
	// 	$subcategories = Subcategory::where('category_id',$categoryId)->get();
	// 	foreach ($subcategories as $k => $subcategory) {
	// 		$subcategory->delete();
	// 	}
	// }

	public function getProductsByCategory($categoryId)
	{
		$products  = Product::where('category_id',$categoryId)->get();
		return response()->json(['products'=>$products],200);
	}

	public function getProductsByCategoryWithOutDataJson($categoryId)
	{
		$products  = Product::where('category_id',$categoryId)->get();
		return $products;
	}

	public function getOrdersByCategory($categoryId)
	{
		$orders = DB::table('orders')
			->select('orders.id as orderId')
			->join('order_products','orders.id','=','order_products.order_id')
			->join('products','products.id','=','order_products.product_id')
			->join('categories','categories.id','=','products.category_id')
			->where('categories.id','=',$categoryId)
			->groupBy('orders.id')
			->get();
		return response()->json(['orders'=>$orders],200);
	}

	//Api frontEnd
	public function getCategories()
	{
		$arrayCategories  = [];

		$categories = Category::where('published',1)
						->whereHas('products')
						->with(['subcategories' => function($query){
							$query->where('published', 1);
							$query->whereHas('products');
						}])
						->get();

		if (count($categories) == 0) {
			return response()->json(['data'=>$arrayCategories],400);
		}

		foreach ($categories as $l => $category) {
				$arrayCategories[$l]['id'] = $category->id;
				$arrayCategories[$l]['description'] = $category->content;
				$arrayCategories[$l]['name'] = $category->name;
				$arrayCategories[$l]['slug'] = $category->slug;
				$arrayCategories[$l]['iconUrl'] = $category->icon;
				$arrayCategories[$l]['whiteIconUrl'] = $category->icon_white;

				foreach ($category->subcategories as $i => $subcategory) {
					$img = DB::table('contents')
						->select('contents.resource_thumb as imgThumb')
						->join('products','products.id','=','contents.model_id')
						->where('contents.model_type',2)
						->where('products.subcategory_id',$subcategory->id)
						->orderByRaw('RAND()')
						->first();
						$arrayCategories[$l]['subcategories'][$i]['id'] = $subcategory->id;
						$arrayCategories[$l]['subcategories'][$i]['description'] = $subcategory->content;
						$arrayCategories[$l]['subcategories'][$i]['name'] = $subcategory->name;
						$arrayCategories[$l]['subcategories'][$i]['slug'] = $subcategory->slug;
						$arrayCategories[$l]['subcategories'][$i]['imageUrl'] = (count($img) ? $img->imgThumb : "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png" );;
				}
		}
		return response()->json(['data'=>$arrayCategories],200);
	}

	public function getOutstandingCategories()
	{
		$arrayCategories  = [];

		$categories = Category::where('published',1)
						->whereHas('products')
						->with(['subcategories' => function($query){
							$query->where('published', 1);
							$query->whereHas('products');
						}])
						->take(8)
						->get();

		if (count($categories) == 0) {
			return response()->json(['data'=>$arrayCategories],400);
		}

		foreach ($categories as $l => $category) {
				$arrayCategories[$l]['id'] = $category->id;
				$arrayCategories[$l]['description'] = $category->content;
				$arrayCategories[$l]['name'] = $category->name;
				$arrayCategories[$l]['slug'] = $category->slug;
				$arrayCategories[$l]['iconUrl'] = $category->icon;
				$arrayCategories[$l]['whiteIconUrl'] = $category->icon_white;
		}
		return response()->json(['data'=>$arrayCategories],200);
	}

}
