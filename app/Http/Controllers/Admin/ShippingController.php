<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class ShippingController extends Controller {
	public function store(Request $request) {

		$data = $request->all();
		$data['date'] = Carbon::now()->format('Y-m-d');
		$new_shipping = new Shipping();

		#Veryfing status is unique
		$existing_status = Shipping::whereOrderId($data['order_id'])
			->whereShippingStatusId($data['shipping_status_id'])
			->get();

		if (count($existing_status)) {
			return response()->json(['title' => 'Advertencia', 'message' => 'Ya existe un estado similar.'], 400);
		}

		$new_shipping->fill($data);
		$new_shipping->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado el estado']);

	}

	public function delete($id) {
		$shipping = Shipping::find($id);
		$shipping->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado el estado']);
	}

	public function tracking_by_order($order_id) {
		$trackings = Shipping::whereOrderId($order_id)
			->with('shipping_status')
			->orderBy('id', 'DESC')
			->get();

		foreach ($trackings as $key => $tracking) {
			$tracking->date_formatted = strtoupper(Date::parse($tracking->date)->format('j F Y'));
		}

		return $trackings;
	}

}
