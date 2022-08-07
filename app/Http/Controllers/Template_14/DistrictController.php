<?php

namespace App\Http\Controllers\Template_14;

use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Http\Request;

class DistrictController extends Controller {

	public function get_shipping_cost($district_id, Request $request) {

		#
		$product_ids = $request->cart;
		$valores = (array) json_decode($product_ids);

		$arr_amount = [];

		foreach ($valores as $key => $value) {
			$product = Product::find($key);

			$amount = DB::table('costs')
				->join('cost_district', 'costs.id', '=', 'cost_district.cost_id')
				->join('cost_subcategory', 'costs.id', '=', 'cost_subcategory.cost_id')
				->where('cost_district.district_id', $district_id)
				->where('cost_subcategory.subcategory_id', $product->subcategory_id)
				->pluck('costs.cost')
				->toArray();
			$arr_amount = array_merge($amount, $arr_amount);
		}

		$company_main = Company::whereMain(1)->first();

		$info = 'Por favor, comuniquese al ' . $company_main->cel . ', para brindarle información sobre el costo de envío.';

		if (!count($arr_amount)) {
			return response()->json(['title' => 'Error', 'message' => $info], 400);
		}
		return $arr_amount;
	}

}
