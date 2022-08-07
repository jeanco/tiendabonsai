<?php

namespace App\Http\Controllers\Template_2;

use App\Account;
use App\Country;
use App\Customer;
use App\Order;
use App\Company;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Services\SendEmail;

class CheckoutController extends Controller {

	public function get_view() {
		return view('template_2.checkout.1_shopping_cart');
	}

	public function order_info() {

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

		return view('template_2.checkout.2_check_out', compact('accounts', 'first_name', 'last_name', 'cel_whatsapp', 'countries', 'first_name_two', 'last_name_two', 'identity_document_two', 'cel_whatsapp_two', 'address_two', 'identity_document', 'country_id', 'province_id', 'city_id', 'district_id'));
	}

	public function complete(Request $request) {

		$order_history_id = $request->session()->get('order_history_id');

		$order_history = OrderHistory::find($order_history_id);

		if (!count($order_history)) {
			return "Ninguna compra hecha";
		}

		$total = $order_history->total;
		$charge = $request->session()->get('charge');

		//$code = '-';
		if (is_string($charge)) {
			$charge = json_decode($charge);
		}

		$charge = (object) $charge;

			if(!(array)$charge)
			{

			}
			else{
				if($charge->object == "order")
				{


				$code = $charge->payment_code;
					
				$order_id = Order::where('order_history_id','=',$order_history_id)->first();
				$order_id->cash_payment_code = $code;
				$order_id->save();


				//Inicia para enviar al correo
			$customer_email = $order_history->customer->email;
			$customer_name = $order_history->customer->first_name . " " . $order_history->customer->last_name;

			$company = Company::whereMain(1)->first();


			$email = new SendEmail();
			$email_aux = $email->send_email_to_customer_from_order_history_to_pay($order_history->id, $company->email, $customer_email, $customer_name, 'Has realizado una compra - Verfica el Código de Pago de Culqi', 'Se ha hecho una Compra por Pagar');

				}			
			}	


		//$request->session()->flush();
		$request->session()->forget('charge');
		$request->session()->forget('order_history_id');

	
				

		return view('template_2.checkout.3_order_complete', compact('charge', 'total'));
	}

}
