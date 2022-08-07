<?php

namespace App\Http\Controllers\Miranda;

use Mail;
use App\Order;
use App\Company;
use App\Product;
use App\Customer;
use App\Mail\ContactCompanyMiranda;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPerfilOrderRequest;

class OrderController extends Controller {

	public function store(ProductPerfilOrderRequest $request) {
		// return $request->all();
		$data = $request->all();

		#Customer
		$customer = Customer::whereCelWhatsapp($data['cel'])->first();

		if (count($customer)) {
			#Exist the customer so update that;
			// $customer->fill($data);
			$customer->first_name = $data['name'];
			$customer->save();
		} else {
			#Create new customer
			$customer = new Customer();
			// $customer->fill($data);
			$customer->identity_document = "";
			$customer->first_name = $data['name'];
			$customer->city_id = 1;
			$customer->country_id = 1;
			$customer->user_id = 1;
			$customer->cel_whatsapp = $data['cel'];
			$customer->save();
		}

		#Order
		$new_order = new Order();
		$new_order->code = "";
		$new_order->description = "";
		$new_order->message = $data['msg'];
		$new_order->customer_id = $customer->id;
		$new_order->status = 1;
		$new_order->total = 0;
		$new_order->account_id = 1;
		$new_order->order_history_id = 0;
		$new_order->currency_id = 1;
		$new_order->user_id = 1;
		$new_order->save();

		$new_order->code = "MENSAJE-{$new_order->id}";
		$new_order->save();

		$product = Product::find($request->product_id);

		$new_order->products()->attach($request->product_id, ['quantity' => 1, 'price' => $product->price, 'discount' => 0]);

		#Send to the email to the company;
		$company = Company::whereMain(1)
			->first();

		$company_email = $company->email;

		$emailData = array(
			'name' => $customer->first_name.' '.$customer->last_name,
			'email' => $company_email,
			'cellphone' =>$customer->cel_whatsapp,
			'msg' => $new_order->message,
			'subject' => 'Contacto desde la página',
		);

		Mail::to($company_email)->send(new ContactCompanyMiranda($emailData, $emailData['email']));

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha enviado el mensaje']);

	}
}
