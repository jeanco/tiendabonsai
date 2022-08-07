<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Product;
use App\OrderProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubcategoryRequest;
use App\Http\Requests\SubcategoryUpdateRequest;

class SubcategoriesController extends Controller
{
    public function getSubcategoryById($subcategoryId)
	{
		$subcategory = Subcategory::find($subcategoryId);
		return response()->json(['subcategory'=>$subcategory],200);
	}

	public function postSubcategory(SubcategoryRequest $request)
	{
		// return $request->all();
		try {
			$data = $request->all();
			$subcategory = new Subcategory();
			$subcategory->fill($data);
			$subcategory->slug = str_slug($request->name,"-");
			$subcategory->published = 1;
			$subcategory->save();
			return response()->json(['success'=>true,'subcategory'=>$subcategory],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function putSubcategory(SubcategoryUpdateRequest $request)
	{
		try {
			$subcategory = Subcategory::find($request->subcategory_id);
			$subcategory->name  = $request->name;
			$subcategory->content = $request->content;
			$subcategory->slug = str_slug($request->name,"-");
			$subcategory->published = 0;
			if ($request->published != null) {
				$subcategory->published = $request->published;
			}
			$subcategory->save();
			return response()->json(['success'=>true,'subcategory'=>$subcategory],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public  function getProductsBySubcategory($subcategoryId)
	{
		$products = Product::where('subcategory_id',$subcategoryId)->get();
		return response()->json(['products'=>$products],200);
	}

	public function getOrdersBySubcategory($subcategoryId)
	{
		// $products = $this->getProductsBySubcategory($subcategoryId);
		// $orderProducts = OrderProduct::where('')
		$orders = DB::table('orders')
			->select('orders.id as orderId')
			->join('order_products','orders.id','=','order_products.order_id')
			->join('products','products.id','=','order_products.product_id')
			->join('subcategories','subcategories.id','=','products.subcategory_id')
			->where('subcategories.id','=',$subcategoryId)
			->groupBy('orders.id')
			->get();
		return response()->json(['orders'=>$orders],200);
	}

}
