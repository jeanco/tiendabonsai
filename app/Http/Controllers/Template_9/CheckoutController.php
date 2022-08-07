<?php

namespace App\Http\Controllers\Template_9;

use App\Account;
use App\Country;
use App\Customer;
use App\Place;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller {

	public function get_view(Request $request) {

		$place = Place::first();
		$place_id_selected = $request->session()->get('place_id', $place->id);

		return view('template_9.checkout.1_shopping_cart', compact('place_id_selected'));
	}

	public function order_info(Request $request) {

		$accounts = Account::wherePublished(1)
		// ->with('payment_entity')
			->get();

		$first_name = "";
		$last_name = "";
		$cel_whatsapp = "";
		$identity_document = "";

		$first_name_two = "";
		$last_name_two = "";
		$identity_document_two = "";
		$cel_whatsapp_two = "";
		$address_two = "";

		$country_id = "";
		$city_id = "";
		$province_id = "";
		$district_id = "";

		if (Auth::check()) {
			$customer = Customer::with(['alternative_direction' => function ($query) {
				$query->orderBy('id', 'DESC');
			}])->find(Auth::user()->customer_id);

			$first_name = $customer->first_name;
			$last_name = $customer->last_name;
			$cel_whatsapp = $customer->cel_whatsapp;
			$identity_document = $customer->identity_document;

			$first_name_two = $first_name;
			$last_name_two = $last_name;
			$identity_document_two = $identity_document;
			$cel_whatsapp_two = $cel_whatsapp;
			$address_two = "";

			if (count($customer->alternative_direction)) {
				$first_name_two = $customer->alternative_direction->first_name;
				$last_name_two = $customer->alternative_direction->last_name;
				$identity_document_two = $customer->alternative_direction->identity_document;
				$cel_whatsapp_two = $customer->alternative_direction->cel;
				$address_two = $customer->alternative_direction->address;

				$country_id = $customer->alternative_direction->country_id;
				$city_id = $customer->alternative_direction->city_id;
				$province_id = $customer->alternative_direction->province_id;
				$district_id = $customer->alternative_direction->district_id;
			}
		}

		$countries = Country::all();

		$place = Place::first();
		$place_id_selected = $request->session()->get('place_id', $place->id);

		return view('template_9.checkout.2_check_out', compact('accounts', 'first_name', 'last_name', 'cel_whatsapp', 'countries', 'first_name_two', 'last_name_two', 'identity_document_two', 'cel_whatsapp_two', 'address_two', 'identity_document', 'country_id', 'province_id', 'city_id', 'district_id', 'place_id_selected'));
	}

	public function complete(Request $request) {

		$place = Place::first();
		$place_id_selected = $request->session()->get('place_id', $place->id);

		$order_history_id = $request->session()->get('order_history_id');

		$order_history = OrderHistory::find($order_history_id);

		if (!count($order_history)) {
			return "Ninguna compra hecha";
		}

		$total = $order_history->total;
		$charge = $request->session()->get('charge');

		if (is_string($charge)) {
			$charge = json_decode($charge);
		}

		$charge = (object) $charge;
		//$request->session()->flush();
		$request->session()->forget('charge');
		$request->session()->forget('order_history_id');

		return view('template_9.checkout.3_order_complete', compact('charge', 'total'));
	}

}
