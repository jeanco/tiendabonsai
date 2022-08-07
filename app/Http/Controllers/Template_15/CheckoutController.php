<?php

namespace App\Http\Controllers\Template_15;

use App\Account;
use App\Country;
use App\Customer;
use App\Logistic;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderProduct;

class CheckoutController extends Controller {

	public function get_view() {
		return view('template_15.checkout.1_shopping_cart');
	}

	public function order_info() {

		$accounts = Account::wherePublished(1)
		// ->with('payment_entity')
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
			$birthday = Carbon::parse($customer->birthday)->format('d/m/Y');
			$address = $customer->address;

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
		
		$logistics = Logistic::first();
		$shipping_policies= $logistics ? $logistics->shipping_policies : "";

		$countries = Country::all();

		$formToken = "";

		return view('template_15.checkout.2_check_out', compact('address', 'accounts', 'first_name', 'last_name', 'cel_whatsapp', 'countries', 'first_name_two', 'last_name_two', 'identity_document_two', 'cel_whatsapp_two', 'address_two', 'identity_document', 'country_id', 'province_id', 'city_id', 'district_id', 'birthday','shipping_policies', 'formToken'));
	}

	public function complete(Request $request) {

		$order_history_id = $request->session()->get('order_history_id');
		//$order_history_id = 36;
		$order_history = OrderHistory::find($order_history_id);
		//$order_history = OrderHistory::find(13);

		if (!count($order_history)) {
			return view('template_15.checkout.4_order_not_found');
		}

		//$izipay_message = $request->session()->get('izipay_message');

		// if ($izipay_message) {

		// 	$request->session()->forget('order_history_id');
		// 	$izipay_message = $request->session()->get('izipay_message');
		// 	return $izipay_message;

		// }




		//$order = Order::with('customer')->where('order_history_id','=',$order_history_id)->first();
		$order = Order::with(['customer' => function ($query) {
			$query->with(['alternative_direction' => function ($query) {
				$query->orderBy('id', 'DESC');
				$query->with('city')
					->with('province')
					->with('district');
			}]);
			// $query->with(['city' => function ($query) {
			// 	$query->withTrashed();
			// }]);
			// $query->with(['country' => function ($query) {
			// 	$query->withTrashed();
			// }])
		}])->with(['account' => function ($query) {
				$query->with('payment_way');
				$query->with('payment_entity');
			}])->where('order_history_id','=',$order_history_id)->first();

		$order_detail = OrderProduct::with('product')->where('order_id','=',$order->id)->get();


	

		//dd($order_detail);

		//$detail = $order_history->ordered_products;
		//$detail = (array) json_decode($detail);

		//list($id_products, $cants) = array_divide($detail);
		
	
			
		/*$name_products = [];
		$cant_products = [];

		

		foreach ($id_products as $key => $value) {
			$product = Product::where('id','=',$value)->first();
			$name_products[$key]= $product->name ;
			$cant_products[$key] = $cants[$key]; 
			
		}	*/
		
		//dd($order);


		$total = $order_history->total;
		$charge = $request->session()->get('charge');
		
		if (is_string($charge)) {
			$charge = json_decode($charge);
		}

		$charge = (object) $charge;
		//$request->session()->flush();
		$request->session()->forget('charge');
		$request->session()->forget('order_history_id');

		return view('template_15.checkout.3_order_complete', compact('charge', 'total','order_detail','order'));
	}

}
