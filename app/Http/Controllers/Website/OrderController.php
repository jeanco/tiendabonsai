<?php

namespace App\Http\Controllers\Website;

use App\Company;
use App\Customer;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\CustomerSuccessfulOrder;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\User;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Mail;

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

		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;

			$product = Product::find($key);

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
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
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

			$order->total = $total;
			$order->save();
		}

		$company = Company::whereMain(1)->first();

		#Email para el cliente y para el main
		$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);

		$companies_not_main = Company::whereMain(0)->get();

		if (count($companies_not_main)) {
			#Email para las compañias not main;
			$this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		}

		return "ok";
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

	public function show_genesis_document($id) {
		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('products');
			$query->with('company');
		}])
			->with('currency')
			->with('customer')
			->find($id);

		$company = Company::whereMain(1)
			->select(['name_company', 'email', 'cel', 'ruc', 'logotype_thumb'])
			->first();

		return view('admin.routers.document', compact('order_history', 'company'));
	}

	public function show_banner($order_history_id) {

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

		$orders = $array_to_return;

		$data = array(
			'orders' => $array_to_return,
			// 'company_email_main_principal' => $company_email,
			// 'payment_way' => $$order_history->account->name,
		);

		return view('website.emails.order', compact('orders'));
		//return view('website.emails.order', compact('data'));
	}

	public function show($id) {

		//Array order
		$t = [];

		//Array products
		$p = [];

		//Array Customer
		$c = [];

		$total_quantity = 0;

		$order = Order::with(['customer' => function ($query) {
			$query->with(['city' => function ($query) {
				$query->withTrashed();
			}]);
			$query->with(['country' => function ($query) {
				$query->withTrashed();
			}]);
		}])
			->with(['account' => function ($query) {
				$query->with('payment_way');
				$query->with('payment_entity');
			}])
			->whereUuid($id)
			->first();

		$order_products = OrderProduct::where('order_id', $id)->get();

		foreach ($order_products as $l => $order_product) {

			$product = Product::withTrashed()->find($order_product->product_id);

			$name_product = $product->name;
			if ($product->deleted_at != null) {
				$name_product += ' ' . '(Producto Eliminado)';
			}

			$p[] = array(
				'quantity' => $order_product->quantity,
				'name' => $name_product,
				'price' => (float) $order_product->discount,
				'discount' => (float) $order_product->discount - (float) $order_product->price,
				'sub_total' => (float) $order_product->quantity * (float) $order_product->price,
			);

			$total_quantity += $order_product->quantity;
		}

		$c = array(
			'birthday' => $order->customer->birthday,
			'document' => $order->customer->identity_document,
			'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
			'email' => $order->customer->email,
			'cel' => $order->customer->cel_whatsapp,
			'address' => $order->customer->address,
			'origin' => ($order->customer->city != null) ? $order->customer->city->name . ' - ' . $order->customer->country->name : '',
		);

		$status_text = '';

		switch ($order->status) {
		case 1:
			$status_text = 'Pendiente';
			break;
		case 2:
			$status_text = 'Confirmado';
			break;
		case 3:
			$status_text = 'Cancelado';
			break;
		}

		$t = array(
			'id' => $order->id,
			'code' => $order->code,
			'date' => Date::parse($order->created_at)->format('j/F/Y - H:i'),
			'date_other_format' => $order->created_at->format('d-m-Y'),
			'status' => $order->status,
			'is_separated' => $order->is_separated,
			'quantity' => $total_quantity,
			'total' => $order->total,
			'account_name' => $order->account->name,
			'account_instructions' => $order->account->instructions,
			'payment_way_name' => $order->account->payment_way->name,
			'account_logo' => $order->account->payment_entity->logo,
			'products' => $p,
			'customer' => $c,
			'status_text' => $status_text,
		);

		return view('oyeepe.users.perfil.pdf.index', compact('t'));
	}

	public function my_coupon($id) {

		$order = Order::with('customer')
			->with('products')
			->find($id);

		$products = [];

		foreach ($order->products as $key => $product) {
			$products[] = $product->name;
		}

		// $order_array = array(
		// 	'code' => $order->code,
		// 	'customer' => "{$order->customer->first_name} {$order->customer->last_name}",
		// 	'products' => $products,

		// );

		$date_formatted = Date::parse($order->created_at)->format('d \d\e\ F \d\e\l\ Y');

		$code = $order->code;
		$order_id = $order->id;
		$customer = "{$order->customer->first_name} {$order->customer->last_name}";
		$date_formatted = $date_formatted;

		return view('oyeepe.users.cupon.index', compact('code', 'customer', 'products', 'order_id', 'date_formatted', 'date_formatted'));
	}

	public function generate_pdf($order_id) {

		$order = Order::with('customer')
			->with('products')
			->find($order_id);

		$products = [];

		$date_formatted = Date::parse($order->created_at)->format('d \d\e\ F \d\e\l\ Y');

		foreach ($order->products as $key => $product) {
			$products[] = $product->name;
		}

		$order_array = array(
			'code' => $order->code,
			'customer' => "{$order->customer->first_name} {$order->customer->last_name}",
			'products' => $products,
			'order_id' => $order_id,
			'date_formatted' => $date_formatted,
		);

		$pdf = \PDF::loadView('oyeepe.users.cupon.index', $order_array);
		return $pdf->download('document.pdf');

		// $pdf = PDF::loadView('oyeepe.users.cupon.index', $order_array);
		// return $pdf->stream('document.pdf');
	}
}
