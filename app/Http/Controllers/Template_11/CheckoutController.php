<?php

namespace App\Http\Controllers\Template_11;

use App\City;
use App\Country;
use App\Currency;
use App\Customer;
use App\District;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\PaymentWay;
use App\Place;
use App\Province;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller {

	public function get_view() {
		return view('template_11.checkout.1_shopping_cart');
	}

	public function checkout_fast() {
		return view('template_11.checkout.1_shopping_cart');
	}

	public function order_info(Request $request) {

	   Session::put('redirect', $request->path());

	   $currency_id = session()->get('currency_id', 1);
       $currency = Currency::find($currency_id);

		$payment_ways = PaymentWay::with(['accounts' => function ($query) use ($currency) {
			$query->with('payment_entity');
			$query->wherePublished(1)
				->whereCurrencyId($currency->id);
		}])->orderBy("id",'ASC')->get();

		$places = Place::whereCountryId($currency->country_id)
			->get();

		$first_name = "";
		$last_name = "";
		$cel_whatsapp = "";
		$identity_document = "";
		$birthday = "";
		$address = "";
		$first_name_two = "";
		$last_name_two = "";
		$identity_document_two = "";
		$cel_whatsapp_two = "";
		$address_two = "";
		$reference = "";

		$country_id = Country::first()->id;
		$city_id = City::whereCountryId($country_id)->first()->id;
		$province_id = Province::whereCityId($city_id)->first()->id;
		$district_id = District::whereProvinceId($province_id)->first()->id;
		
		if (Auth::check()) {
			$customer = Customer::with(['alternative_direction' => function ($query) {
				$query->orderBy('id', 'DESC');
			}])->find(Auth::user()->customer_id);

			$first_name = $customer->first_name;
			$last_name = $customer->last_name;
			$cel_whatsapp = $customer->cel_whatsapp;
			$identity_document = $customer->identity_document;
			//$birthday = Carbon::parse($customer->birthday)->format('d/m/Y');
			$birthday = "";
			$address = $customer->address;

			$first_name_two = $first_name;
			$last_name_two = $last_name;
			$identity_document_two = $identity_document;
			$cel_whatsapp_two = $cel_whatsapp;
			$address_two = "";
			$reference = "";

			if (count($customer->alternative_direction)) {
				$first_name_two = $customer->alternative_direction->first_name;
				$last_name_two = $customer->alternative_direction->last_name;
				$identity_document_two = $customer->alternative_direction->identity_document;
				$cel_whatsapp_two = $customer->alternative_direction->cel;
				$address_two = $customer->alternative_direction->address;
				$reference = $customer->alternative_direction->reference;
				$country_id = $customer->alternative_direction->country_id;
				$city_id = $customer->alternative_direction->city_id;
				$province_id = $customer->alternative_direction->province_id;
				$district_id = $customer->alternative_direction->district_id;
			}

		}

		$countries = Country::all();

		$documents = DB::table('user_type_documents')
			->where('deleted_at', NULL)
			->get(['id', 'name'])->toArray();

		return view('template_11.checkout.2_check_out', compact('address', 'first_name', 'last_name', 'cel_whatsapp', 'countries', 'first_name_two', 'last_name_two', 'identity_document_two', 'cel_whatsapp_two', 'address_two', 'identity_document', 'country_id', 'province_id', 'city_id', 'district_id', 'birthday', 'payment_ways', 'reference', 'documents', 'places'));
	}

	public function complete(Request $request) {

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
		$request->session()->forget('order_history_id');
		$request->session()->forget('charge');
		return view('template_11.checkout.3_order_complete', compact('charge', 'total'));
	}

}
