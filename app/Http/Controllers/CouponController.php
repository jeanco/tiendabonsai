<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Datatables;
use Illuminate\Http\Request;

class CouponController extends Controller {

	public function datatable() {

		$result = (new Coupon)->newQuery();

		$result->join('coupon_types', 'coupons.coupon_type_id', '=', 'coupon_types.id')
			->select(['coupons.created_at as created_at',
				'coupons.id as id',
				'coupons.code as code',
				'coupons.start_date as start_date',
				'coupons.end_date as end_date',
				'coupons.minimum as minimum',
				'coupons.maximum as maximum',
				'coupons.limit as limit',
				'coupons.amount as amount',
				'coupons.status as status',
				'coupon_types.name as name']);

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {

				return "";

			})->make(true);

	}

	public function show($id) {
		$coupon = Coupon::with('coupon_products')->find($id);
		return $coupon;
	}

	public function store(Request $request) {
		
		$data = $request->except('start_date', 'end_date', 'products', 'checkbox_all', 'input_radio_selected');

		$data['start_date'] = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
		$data['end_date'] = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
		$data['status'] = 1;
		$new_coupon = new Coupon();
		$new_coupon->fill($data);
		$new_coupon->all_products = $request->checkbox_all == "false" ? 0 : 1;
		$new_coupon->save();

		if ($request->checkbox_all == "false") {
			#Just the following productos;
			if ($request->products != '') {

				$product_ids = explode(',', $request->products);
				#Coupon-products
				if ($request->input_radio_selected == "radio_all-products") {
					$new_coupon->products()->attach($product_ids);
				}

				if ($request->input_radio_selected == "radio_without-products") {
					$new_coupon->products()->attach($product_ids, ['include' => false]);
				}
			}
		}

		return response()->json(['title' => '', 'message' => 'Se ha creado el cupon'], 201);
	}

	public function update($id, Request $request) {

		$data = $request->except('start_date', 'end_date', 'products', 'checkbox_all', 'input_radio_selected');

		$data['start_date'] = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
		$data['end_date'] = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
		$data['status'] = 1;

		$coupon = Coupon::find($id);
		$coupon->fill($data);
		$coupon->all_products = $request->checkbox_all == "false" ? 0 : 1;
		$coupon->save();

		$coupon->products()->detach();

		if ($request->checkbox_all == "false") {
			#Just the following productos;
			if ($request->products != '') {
				$product_ids = explode(',', $request->products);
				#Coupon-products
				if ($request->input_radio_selected == "radio_all-products") {
					$coupon->products()->attach($product_ids);
				}

				if ($request->input_radio_selected == "radio_without-products") {
					$coupon->products()->attach($product_ids, ['include' => false]);
				}
			}
		}

		return response()->json(['title' => '', 'message' => 'Se ha actualizado el cupon'], 200);
	}

	public function delete($id) {

		$coupon = Coupon::find($id);

		if ($coupon->status) {
			return response()->json(['title' => '', 'message' => 'El cupón está activo. No se ha podido eliminar.'], 400);
		}

		$coupon->delete();
		return response()->json(['title' => '', 'message' => 'Se ha eliminado el coupon'], 200);

	}

}
