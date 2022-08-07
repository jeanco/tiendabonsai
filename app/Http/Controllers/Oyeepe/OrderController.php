<?php

namespace App\Http\Controllers\Oyeepe;

use Mail;
use App\User;
use App\Order;
use App\Company;
use App\Product;
use App\Customer;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\Mail\CustomerSuccessfulOrder;
use App\Http\Requests\StoreOrderRequest;
use Culqi\Culqi;
use Auth;

class OrderController extends Controller {

	public function store(StoreOrderRequest $request) {
		// $customer_raw = $request->person;
		// $products_raw = $request->items;
		$data = $request->all();
		// return $data;
		// if (isset($customer_raw['birthday'])) {
		// 	$customer_raw['birthday'] = Carbon::createFromFormat('d/m/Y', $customer_raw['birthday'])->format('Y-m-d');
		// }

		$customer_stored = Customer::where('identity_document', $data['identity_document'])
			->first();

		if (count($customer_stored)) {
			$customer_stored->fill($data);
			$customer_stored->save();

			$customer_id = $customer_stored->id;
			$customer_email = $customer_stored->email;
			$customer_name = "{$customer_stored->first_name} {$customer_stored->last_name}";
			$customer = $customer_stored;
		} else {
			$customer = new Customer;
			$customer->fill($data);
			$customer->customer_type = 1;
			$customer->save();
			$customer_id = $customer->id;
			$customer_email = $customer->email;
			$customer_name = "$customer->first_name $customer->last_name";
		}

		#Creating a user
		if ($request->create_user) {

			$user_exist = User::whereUsername($request->cel_whatsapp)->get();
			if (count($user_exist)) {
				return response()->json(['title' => 'Error', 'message' => 'El usuario ya existe', 'simple_error' => true], 400);
			}

			$user = new User();
			$user->username = $request->cel_whatsapp;
			$user->password = bcrypt($request->password);
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->email = $request->email;
			$user->activated = 1;
			$user->cel = $request->cel_whatsapp;
			$user->address = $request->address;
			$user->user_type = 1;
			$user->company_id = 0;
			$user->gender = $request->gender;
			$user->cel_holder = $request->cel_holder;
			$user->country_id = $request->country_id;
			$user->city_id = $request->city_id;
			$user->birthday = ($request->birthday != '') ? $request->birthday : null;
			$user->save();

			$customer->user_id = $user->id;
			$customer->save();
		}

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $data['product_ids'];
		$order_history->total = 0;
		$order_history->description = $data['description'];
		$order_history->customer_id = $customer_id;
		$order_history->account_id = $data['account_id'];
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $request->product_ids;
		$ids_array = explode(',', $product_ids);
		$valores = array_count_values($ids_array);

		$cart_array = [];
		$total = 0;

		$companies_id_array = [];

		$order_type = 1;

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;
			$product = Product::find($key);

			if ($product->category_id == 3) {
				$order_type = 2;
			}

			$price = $product->price;

			if ($product->promotion_available == 1) {
				$price = $product->price_promotion;
			}

			$cart_array[] = array(
				'id' => $key,
				#Se vende a este precio
				'price' => $price,
				'quantity' => $value,
				'company_id' => $product->company_id,
				#precio original
				'discount' => $product->price,
			);

			$companies_id_array[] = $product->company_id;

			// $total += $price;

			// $order->products()->attach($product->id,
			// 	[
			// 		'quantity' => $value,
			// 		'price' => $price,
			// 		'discount' => $product->price - $product->price_promotion,
			// 	]);
		}

		$companies = Company::whereIn('id', $companies_id_array)
			->get();

		foreach ($companies as $key => $company) {
			$company_id = $company->id;

			$customer->companies()->attach($company_id);

			$total = 0;

			$order = new Order;
			$order->code = '';
			$order->description = $data['description'];
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->order_type = $order_type;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->save();

			$order->code = $order->id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					$total += (float) $product['price'];

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);

					#Reducir stock
					$product_from_db = Product::find($product['id']);
					$product_from_db->stock = $product_from_db->stock - $product['quantity'];
					$product_from_db->save();

				}
			}

			$order->total = $total;
			$order->save();
		}

		$company = Company::whereMain(1)->first();

		#Email para el cliente y para el main

		//DESCOMENTAR $this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);

		$companies_not_main = Company::whereMain(0)->get();

		if (count($companies_not_main)) {
			#Email para las compañias not main;
			//DESCOMENTAR $this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		}

		if ($order_history->account_id == 4) {
			return response()->json(['title' => 'Operación Exitosa', 'message' => '', 'redirect_' => true]);
		}

		return response()->json(['title' => 'Operación Exitosa', 'message' => '', 'redirect' => false]);
	}

	public function send_email_to_customer_from_order_history($order_history_id, $company_email, $customer_email, $customer_name) {

		$company_main = Company::whereMain(1)->first();

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('customer');
			$query->with('products');
			$query->with('company');
		}])->with('account')->find($order_history_id);

		$array_to_return = [];

		foreach ($order_history->orders as $key => $order) {

			$array_products_bought = [];

			foreach ($order->products as $k => $product) {

				$array_products_bought[] = array(
					'name' => $product->name,
					'price' => $product->pivot->price,
					'discount' => $product->pivot->discount,
					'quantity' => $product->pivot->quantity,
				);
			}

			$array_to_return[] = array(
				'company_name' => $order->company->name_company,
				'company_logo' => $order->company->logotype_thumb,
				'total' => $order->total,
				'products' => $array_products_bought,
			);
		}

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $company_main->email,
			'payment_way' => $order_history->account->name,
			'document_link' => url('/') . '/documento/' . $order_history_id,
			'company_main_name' => $company_main->name_company,
		);

		Mail::to($customer_email)->send(new CustomerSuccessfulOrder($data));

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => $order_history->account->name,
			'document_link' => url('/') . '/documento/' . $order_history_id,
			'company_main_name' => $customer_name,
		);

		Mail::to($company_main->email)->send(new CustomerSuccessfulOrder($data));
	}

	public function send_email_to_companies_from_order_history($order_history_id, $customer_email, $customer_name) {

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('products');
			$query->with('company');
			$query->whereHas('company', function ($query) {
				$query->whereMain(0);
			});
		}])->with('account')->find($order_history_id);

		foreach ($order_history->orders as $key => $order) {

			$array_to_send = [];

			$array_products_bought = [];
			foreach ($order->products as $key => $product) {
				$array_products_bought[] = array(
					'name' => $product->name,
					'price' => $product->pivot->price,
					'discount' => $product->pivot->discount,
					'quantity' => $product->pivot->quantity,
				);
			}
			#Send email to the current company
			$array_to_send[] = [
				'company_name' => $order->company->name_company,
				'company_logo' => $order->company->logotype_thumb,
				'total' => $order->total,
				'products' => $array_products_bought,
			];

			$data = array(
				'orders' => $array_to_send,
				'company_main_email' => $customer_email,
				'company_main_name' => $customer_name,
				'document_link' => url('/') . '/documento/' . $order_history_id,
				'payment_way' => $order_history->account->name,
			);

			$company_email = $order->company->email;
			Mail::to($company_email)->send(new CustomerSuccessfulOrder($data));
		}
	}

	public function register_order(Request $request){

		$data = $request->all();
		$data['account_id'] = 5;//registro de forma depago 
		$data['description'] = "";

		$identity_document = $request->identity_document;

		$customer = Customer::whereIdentityDocument($identity_document)
			->first();
		$customer_id = $customer->id;

		if (!count($customer)) {
			return response()->json(['title' => 'Error', 'message' => 'El cliente no existe'], 400);
		}

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $data['product_ids'];
		$order_history->total = 0;
		$order_history->description = $data['description'];
		$order_history->customer_id = $customer_id;
		$order_history->account_id = $data['account_id'];
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $request->product_ids;
		$ids_array = explode(',', $product_ids);
		$valores = array_count_values($ids_array);

		$cart_array = [];
		$total = 0;

		$companies_id_array = [];

		$order_type = 1;

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;
			$product = Product::find($key);

			if ($product->category_id == 3) {
				$order_type = 2;
			}

			$price = $product->price;

			if ($product->promotion_available == 1) {
				$price = $product->price_promotion;
			}

			$cart_array[] = array(
				'id' => $key,
				#Se vende a este precio
				'price' => $price,
				'quantity' => $value,
				'company_id' => $product->company_id,
				#precio original
				'discount' => $product->price,
			);

			$companies_id_array[] = $product->company_id;

		}

		$companies = Company::whereIn('id', $companies_id_array)
			->get();

		$total_general = 0;

		foreach ($companies as $key => $company) {
			$company_id = $company->id;

			$customer->companies()->attach($company_id);

			$total = 0;

			$order = new Order;
			$order->code = '';
			$order->description = $data['description'];
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->order_type = $order_type;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->save();

			$order->code = $order->id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					$total += (float) $product['price'];

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			$total_general += $total;
			$order->total = $total;
			$order->save();
		}

		$order_history->total = $total_general;
		$order_history->save();

		$company = Company::whereMain(1)->first();

		#Email para el cliente y para el main

		//DESCOMENTAR $this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);

		$companies_not_main = Company::whereMain(0)->get();

		if (count($companies_not_main)) {
			#Email para las compañias not main;
			//DESCOMENTAR $this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		}

		#Payment
		//$SECRET_KEY = "sk_test_ZivyviFXqtCzayFX";
		$SECRET_KEY = "sk_test_b7e3fd8142a1981e";
		
		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		$total_to_pay = $order_history->total*100;
		$total_to_pay = number_format($total_to_pay, 0, '.', '');

		$charge = $culqi->Charges->create(
			array(
				#Total a cobrar
				"amount" => $total_to_pay,
				"currency_code" => "PEN",
				"email" => "test@culqi.com",
				"source_id" => $request->token_example,
			)
		);
		#------
		$orders = Order::whereOrderHistoryId($order_history->id)
			->with('products')
			->get();

		foreach ($orders as $key => $order) {
			$order->status = 2;
			$order->save();

			foreach ($order->products as $key => $product) {
				$product->stock = $product->stock - $product->pivot->quantity;
				$product->save();
			}
		}

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado la orden y se ha aceptado el pago']);
	}

	public function register_coupon(Request $request){
		$product_id = $request->product_id;
		// $customer_id = $request->customer_id;
		$user_id = $request->user_id;

		$customer = Customer::whereUserId($user_id)
			->first();

		$customer_id = $customer->id;

		if (!count($customer)) {
			return response()->json(['title' => 'Error', 'message' => 'El cliente no existe!'], 400);
		}

		$data = $request->all();
		$data['account_id'] = 0;
		$data['description'] = "";

		$identity_document = $customer->identity_document;

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $product_id;
		$order_history->total = 0;
		$order_history->description = 'coupon';
		$order_history->customer_id = $customer_id;
		$order_history->account_id = 0;
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $product_id;
		$ids_array = explode(',', $product_ids);
		$valores = array_count_values($ids_array);

		$cart_array = [];
		$total = 0;

		$companies_id_array = [];

		$order_type = 2;

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;
			$product = Product::find($key);

			// if ($product->category_id == 3) {
			// 	$order_type = 2;
			// }

			$price = $product->price;

			if ($product->promotion_available == 1) {
				$price = $product->price_promotion;
			}

			$cart_array[] = array(
				'id' => $key,
				#Se vende a este precio
				'price' => $price,
				'quantity' => $value,
				'company_id' => $product->company_id,
				#precio original
				'discount' => $product->price,
			);

			$companies_id_array[] = $product->company_id;
		}

		$companies = Company::whereIn('id', $companies_id_array)
			->get();

		// $total_general = 0;

		foreach ($companies as $key => $company) {
			$company_id = $company->id;

			$customer->companies()->attach($company_id);

			// $total = 0;

			$order = new Order;
			$order->code = '';
			$order->description = $data['description'];
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->order_type = $order_type;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->save();

			$order->code = $order->id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					// $total += (float) $product['price'];

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			// $total_general += $total;
			// $order->total = $total;
			$order->save();
		}

		$product = Product::find($product_id);
		$product->stock = $product->stock - 1;
		$product->save();

		// $order_history->total = $total_general;
		// $order_history->save();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado el cupon', 'index' => $user_id]);
	}

	public function get_view_pdf($id){
		$order = Order::with('products')
			->with('company')
			->with('currency')
			->with('customer')
			->find($id);

		$company = Company::whereMain(1)
			->select(['name_company', 'email', 'cel', 'ruc', 'logotype_thumb'])
			->first();

		return view('wings.orders.document', compact('order', 'company'));
	}

}
