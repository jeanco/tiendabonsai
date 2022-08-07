<?php

namespace App\Http\Controllers\Wings;

use Mail;
use App\City;
use App\Order;
use App\Company;
use App\Product;
use App\Customer;
use Carbon\Carbon;
use App\Mail\QuotationWings;
use Illuminate\Http\Request;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationStore;

class QuotationController extends Controller {

	public function store(QuotationStore $request){
		// return $request->all();
		$data = $request->all();

        $product = Product::whereSlug($data['product_slug'])
            ->first();

        if (!count($product)) {
            return response()->json(['title' => 'Error', 'message' => 'El vehiculo elegido no existe en la base de datos'], 400);
        }

		#Customer
		$customer_stored = Customer::where('identity_document', $data['identity_document'])
			->first();

		if (count($customer_stored)) {
			#Exist the customer so update this;
			$customer_stored->fill($data);
			$customer_stored->save();
			$customer = $customer_stored;
		} else {
			#Create new customer
			$customer = new Customer();
			$customer->fill($data);
			$customer->country_id = 1;
			$customer->user_id = 1;
			$customer->save();
		}

		#Order
		$new_order = new Order();
		$new_order->code = "";
		$new_order->description = "";
		$new_order->message = $data['observation'];
		$new_order->customer_id = $customer->id;
		$new_order->status = 1;
		$new_order->total = 0;
		$new_order->account_id = 1;
		$new_order->order_history_id = 0;
		$new_order->currency_id = 1;
		$new_order->user_id = 1;
		$new_order->save();

		$new_order->code = "COTIZACION-{$new_order->id}";
		$new_order->save();

		$new_order->products()->attach($product->id, ['quantity' => 1, 'price' => $product->price, 'discount' => 0]);

		#Send to the email to the company;
		$company = Company::whereMain(1)
			->first();

		$company_email = $company->email;

		$city = City::find($customer->city_id);

		$emailData = array(
			'name' => $customer->first_name.' '.$customer->last_name,
			'email' => $company_email,
			'cellphone' =>$customer->cel_whatsapp,
			'msg' => $new_order->message,
			'city_name' => $city->name,
			'vehicle_name' => $product->name,
			'subject' => 'Contacto desde la página Wings',
		);

		Mail::to($company_email)->send(new QuotationWings($emailData, $emailData['email']));

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha enviado el mensaje']);

	}


}
