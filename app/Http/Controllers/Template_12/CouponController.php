<?php

namespace App\Http\Controllers\Template_12;

use App\Coupon;
use App\CouponProduct;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller {

	public function information($code, Request $request) {

		$today = Carbon::now()->format('Y-m-d');

		$product_ids = $request->ids;

		if (!$product_ids) {
			return response()->json(['message' => 'No hay productos'], 400);
		}

		$coupon = Coupon::whereStatus(1)
			->whereDate('start_date', '<=', $today)
			->whereDate('end_date', '>=', $today)
			->with('type')
			->whereCode($code)
			->first();

		if (!count($coupon)) {
			return response()->json(['message' => 'Cupón pasado'], 400);
		}

		if ($coupon->used >= $coupon->limit) {
			return response()->json(['message' => 'Cupón acabado'], 400);
		}

		if ($coupon->all_products) {
			#todos los productos
			$total = $this->get_total_amount($product_ids);
			if ($total < $coupon->minimum) {
				return response()->json(['message' => 'Cupón Válido. Pero monto insuficiente'], 400);
			}

			if ($total > $coupon->maximum) {
				return response()->json(['message' => 'Cupón Válido. Pero monto sobrexcedido'], 400);
			}

			return response()->json(['message' => 'Cupón Válido', 'is_by_percentage' => $coupon->type->is_by_percentage, 'amount' => $coupon->amount, 'coupon_code' => $coupon->code], 200);
		}

		//$product_ids_arr = explode(',', $product_ids);
		//$product_ids_arr = array_unique($product_ids_arr);
		$product_ids_arr = array_keys((array) json_decode($product_ids));
		$quantity_products = count($product_ids_arr);

		$coupon_product = CouponProduct::whereCouponId($coupon->id)
			->whereIn('product_id', $product_ids_arr)
			->get();

		if ($quantity_products != count($coupon_product)) {
			return response()->json(['message' => 'Cupón Válido. Pero existen productos que el cupón no considera.'], 400);
		}

		$total = $this->get_total_amount($product_ids);
		if ($total < $coupon->minimum) {
			return response()->json(['message' => 'Cupón Válido. Pero monto insuficiente'], 400);
		}

		if ($total > $coupon->maximum) {
			return response()->json(['message' => 'Cupón Válido. Pero monto sobrexcedido'], 400);
		}

		return response()->json(['message' => 'Cupón Válido', 'is_by_percentage' => $coupon->type->is_by_percentage, 'amount' => $coupon->amount, 'coupon_code' => $coupon->code], 200);
	}

	public function get_total_amount($product_ids) {

		//$ids_array = explode(',', $product_ids);
		//$valores = array_count_values($ids_array);
		$valores = (array) json_decode($product_ids);
		$total = 0;

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;

			$product = Product::find($key);

			$price = $product->price;

			if ($product->promotion_available == 1) {
				$price = $product->price_promotion;
			}

			$total += $price * $value;

		}

		return $total;

	}
}
