<?php

namespace App\Http\Controllers\Template_11;

use App\Account;
use App\AlternativeDirection;
use App\Company;
use App\Cost;
use App\Coupon;
use App\Customer;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationRequest;
use App\Http\Requests\StoreOrderTemplate11Request;
use App\Mail\CustomerSuccessfulOrder;
use App\Mail\CustomerSuccessfulOrderTemplate5;
use App\Mail\CustomerSuccessfulQuotationTemplate2;
use App\Mail\UserRegisteredMailTemplate11;
use App\Order;
use App\OrderProduct;
use App\Place;
use App\Product;
use App\Shipping;
use App\ShippingStatus;
use App\User;
use Auth;
use Carbon\Carbon;
use Culqi\Culqi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use Mail;
use Webpatser\Uuid\Uuid;

class OrderController extends Controller {

public function show($id) {
		//Array order
		$t = [];

		//Array products
		$p = [];

		//Array Customer
		$c = [];

		$total_quantity = 0;

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
		}])
			->with('place')
			->with('tienda')
			->with(['alternative_direction' => function ($query) {
				$query->with('city')
					->with('district')
					->with('province');
			}])
			->with(['account' => function ($query) {
				$query->with('payment_way');
				$query->with('payment_entity');
			}])
			->whereUuid($id)
			->first();

		$currency = DB::table('currencies')
			->where('id', $order->currency_id)
			->first();

		$exchange_rate = DB::table('exchange_rates')
			->where('currency_id', $order->currency_id)
			->first();

		$rate = $exchange_rate->sales_exchange;
		$decimal = $currency->decimal ? 2 : 0;
		$symbol = $currency->symbol;

		$order_products = OrderProduct::where('order_id', $order->id)->get();

		$global_discount = 0;

		foreach ($order_products as $l => $order_product) {

			$product = Product::withTrashed()->find($order_product->product_id);

			$name_product = $product->name;
			if ($product->deleted_at != null) {
				$name_product += ' ' . '(Producto Eliminado)';
			}

			$discount = number_format(((float) $order_product->discount - $order_product->price)*$rate, $decimal, '.', '');

			$global_discount += $discount;

			$p[] = array(
				'quantity' => $order_product->quantity,
				'name' => $name_product,
				'price' => number_format($order_product->price*$rate, $decimal, '.', ''),
				'discount' => $discount,
				'sub_total' => number_format((float) $order_product->quantity * (float) $order_product->price*$rate, $decimal, '.', ''),
				'has_hidden_price' => $product->has_hidden_price,
				'message_about_price' => $product->message_about_price,
			);
			$total_quantity += $order_product->quantity;
		}

		$c = array(
			'birthday' => $order->customer->birthday,
			'document' => $order->customer->identity_document,
			'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
			'email' => $order->customer->email,
			'cel' => $order->customer->cel_whatsapp,
			'address' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->address : '',
			'reference' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->reference : '',
			'city' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->city->name : '-',
			'district' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->district->name : '',
			'province' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->province->name : '',

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
			'uuid' => $order->uuid,
			'id' => $order->id,
			'code' => $order->code,
			'date' => Date::parse($order->created_at)->format('j/F/Y - H:i'),
			'date_other_format' => $order->created_at->format('d-m-Y'),
			'status' => $order->status,
			'is_separated' => $order->is_separated,
			'quantity' => $total_quantity,
			'total' => number_format($order->total*$rate, $decimal, '.', ''),
			'subtotal' => number_format($order->subtotal*$rate, $decimal, '.', ''),
			'account_name' => $order->account->name,
			'account_description' => $order->account->description,
			'account_instructions' => $order->account->instructions,
			'payment_way_name' => $order->account->payment_way->name,
			'account_logo' => $order->account->payment_entity->logo,
			'account_logo_path' => $order->account->payment_entity->logo_path,
			'products' => $p,
			'customer' => $c,
			'status_text' => $status_text,
			'shipping_cost' => $order->shipping_cost,
			'global_discount' => number_format($global_discount*$rate, $decimal, '.', ''),
			'discount' => number_format($order->discount*$rate, $decimal, '.', ''),
			'place' => $order->place,
			'tienda' => $order->tienda,
			'alternative_direction' => $order->alternative_direction,
			'address' => $order->address,
			'symbol' => $symbol,
			'currency_name' => $currency->name
		);

		return view('template_11.users.perfil.pdf.index', compact('t'));
		//return view('template_3.users.perfil.pdf.index', compact('t'));

	}

	public function show_customer($id) {
			//Array order
			$t = [];

			//Array products
			$p = [];

			//Array Customer
			$c = [];

			$total_quantity = 0;

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
			}])
				->with('place')
				->with('tienda')
				->with(['alternative_direction' => function ($query) {
					$query->with('city')
						->with('district')
						->with('province');
				}])
				->with(['account' => function ($query) {
					$query->with('payment_way');
					$query->with('payment_entity');
				}])
				->whereUuid($id)
				->first();

			$currency = DB::table('currencies')
				->where('id', $order->currency_id)
				->first();

			$exchange_rate = DB::table('exchange_rates')
				->where('currency_id', $order->currency_id)
				->first();

			$rate = $exchange_rate->sales_exchange;
			$decimal = $currency->decimal ? 2 : 0;
			$symbol = $currency->symbol;

			$order_products = OrderProduct::where('order_id', $order->id)->get();

			$global_discount = 0;

			foreach ($order_products as $l => $order_product) {

				$product = Product::withTrashed()->find($order_product->product_id);

				$name_product = $product->name;
				if ($product->deleted_at != null) {
					$name_product += ' ' . '(Producto Eliminado)';
				}

				$discount = number_format(((float) $order_product->discount - $order_product->price)*$rate, $decimal, '.', ''); 

				$global_discount += $discount;

				$p[] = array(
					'quantity' => $order_product->quantity,
					'name' => $name_product,
					'price' => number_format($order_product->price*$rate, $decimal, '.', ''),
					'discount' => $discount,
					'sub_total' => number_format((float) $order_product->quantity * (float) $order_product->price*$rate, $decimal, '.', ''),
					'has_hidden_price' => $product->has_hidden_price,
					'message_about_price' => $product->message_about_price,
				);
				$total_quantity += $order_product->quantity;
			}

			$c = array(
				'birthday' => $order->customer->birthday,
				'document' => $order->customer->identity_document,
				'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
				'email' => $order->customer->email,
				'cel' => $order->customer->cel_whatsapp,
				'address' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->address : '',
				'reference' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->reference : '',
				'city' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->city->name : '-',
				'district' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->district->name : '',
				'province' => count($order->customer->alternative_direction) ? $order->customer->alternative_direction->province->name : '',

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
				'uuid' => $order->uuid,
				'id' => $order->id,
				'code' => $order->code,
				'date' => Date::parse($order->created_at)->format('j/F/Y - H:i'),
				'date_other_format' => $order->created_at->format('d-m-Y'),
				'status' => $order->status,
				'is_separated' => $order->is_separated,
				'quantity' => $total_quantity,
				'total' => number_format($order->total*$rate, $decimal, '.', ''),
				'subtotal' => number_format($order->subtotal*$rate, $decimal, '.', ''),
				'account_name' => $order->account->name,
				'account_description' => $order->account->description,
				'account_instructions' => $order->account->instructions,
				'payment_way_name' => $order->account->payment_way->name,
				'account_logo' => $order->account->payment_entity->logo,
				'account_logo_path' => $order->account->payment_entity->logo_path,
				'products' => $p,
				'customer' => $c,
				'status_text' => $status_text,
				'shipping_cost' => $order->shipping_cost,
				'global_discount' => $global_discount,
				'discount' => number_format($order->discount*$rate, $decimal, '.', ''),
				'place' => $order->place,
				'tienda' => $order->tienda,
				'alternative_direction' => $order->alternative_direction,
				'address' => $order->address,
				'symbol' => $symbol,
				'is_active' => $order->is_active,
				'currency_name' => $currency->name,
			);

			return view('template_11.users.perfil.pdf.order', compact('t'));
		}

	public function store(StoreOrderTemplate11Request $request) {

		$data = $request->except('email');

		$flag_customer = false;
		if (Auth::check()) {
			#No register
			$customer = Customer::find(Auth::user()->customer_id);
			//$data['birthday'] = Carbon::createFromFormat('d/m/Y', $data['birthday'])->format('Y-m-d');
			//$data['birthday'] = NULL;
			$data['cel_whatsapp'] = $data['phone'];
			$customer->fill($data);
			$customer->save();

			$customer_id = $customer->id;
			$customer_email = $customer->email;
			$customer_name = "$customer->first_name $customer->last_name";

		} else {

			#Veryfing
			$customer = Customer::whereEmail($request->email)
				->first();

			if (count($customer)) {
				$customer->fill($data);
				//$customer->identity_document = $data['identity_document'];
				$customer->cel_whatsapp = $data['phone'];
				$customer->save();
			} else {
				$flag_customer = true;
				#Register account
				$customer = new Customer;
				$customer->fill($data);
				//$customer->identity_document = $data['identity_document'];
				$customer->cel_whatsapp = $data['phone'];
				$customer->city_id = 0;
				$customer->country_id = 0;
				$customer->email = $request->email;
				$customer->customer_type = 1;
				$customer->save();
			}

			$customer_id = $customer->id;
			$customer_email = $customer->email;
			$customer_name = "$customer->first_name $customer->last_name";

			$customer_created = Customer::with('user')
				->find($customer->id);

			if (!count($customer_created->user)) {
				$user = new User();
				$user->username = $request->email;
				$user->password = bcrypt($request->identity_document);
				$user->first_name = $request->first_name;
				$user->last_name = $request->last_name;
				$user->email = $request->email;
				$user->activated = 1;
				$user->cel = $request->phone;
				//$user->address = $request->address;
				$user->user_type = 3;
				$user->company_id = 0;
				//$user->gender = $request->gender;
				//$user->cel_holder = $request->cel_holder;
				$user->country_id = 0;
				$user->city_id = 0;
				//$user->birthday = ($request->birthday != '') ? $request->birthday : null;
				$user->customer_id = $customer_id;
				$user->save();
			}
		}

		$shipping_cost = 0;
		$cost_id = 0;
		$alternative_direction_id = 0;

		if ($request->other_address == "true") {
			$other_address = new AlternativeDirection();

			$arr = json_decode($request->other_billing_address, true);

			$other_address->fill($arr);
			$other_address->customer_id = $customer_id;
			//$other_address->cel = $arr['phone'];
			$other_address->save();

			/*$cost_district = DB::table('cost_district')
				->where('district_id', $arr['district_id'])
				->first();

			$cost = Cost::find($cost_district->cost_id);

			$shipping_cost = $cost->cost;
			$cost_id = $cost->id;*/

			$alternative_direction_id = $other_address->id;

			$arr_cost = $this->get_shipping_cost($arr['district_id'], $request->product_ids);

			$cost_id = $arr_cost['id'];
			$shipping_cost = $arr_cost['amount'];

		}

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $data['product_ids'];
		$order_history->total = 0;
		$order_history->description = '';
		$order_history->customer_id = $customer_id;
		$order_history->account_id = $data['account_id'];
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $request->product_ids;
		//$ids_array = explode(',', $product_ids);
		//$valores = array_count_values($ids_array);
		$valores = (array) json_decode($product_ids);
		#place by default
		$place = Place::first();
		$place_id = $request->session()->get('place_id', $place->id);

		$cart_array = [];
		$total_general = 0;

		$companies_id_array = [];


		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;

			$product = Product::with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])->find($key);

			//$product->stock = $product->stock - $value;
			//$product->save();

			$price = $product->price;

			if ($product->unit_price) {
				$price = $product->unit_price->price;
			}

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
			$discount = 0;
			$coupon_id = 0;

			$order = new Order;
			$order->uuid = Uuid::generate(4)->string;
			$order->code = '';
			$order->description = '';
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = $data['currency_id'];
			$order->is_separated = 0;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->shipping_cost = $shipping_cost;
			$order->discount = $discount;
			$order->coupon_id = $coupon_id;
			$order->cost_id = $cost_id;
			$order->place_id = $place_id;
			$order->is_active = $company->checkout_active;
			$order->place_id_selected = $data['place_id_selected'];
			
			//$order->alternative_direction_id = $other_address->id;
			$order->alternative_direction_id = $alternative_direction_id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					$total += (float) $product['price'] * $product['quantity'];

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			if ($request->coupon_code != "null") {

				$coupon = Coupon::whereCode($request->coupon_code)
					->with('type')
					->first();

				if (!count($coupon)) {
					return response()->json(['title' => 'Error', 'message' => 'Error de cupón'], 400);

				}

				#revalidate-cupón;
				$coupon_id = $coupon->id;
				#Calculating discount;

				if (!$coupon->type->is_by_percentage) {
					$discount = $coupon->amount;
				}

				if ($coupon->type->is_by_percentage) {
					$discount = round($total - ($coupon->amount * $total) / 100, 2);
				}

				$coupon->used = (int) $coupon->used + 1;
				$coupon->save();
			}

			$total = $total - $discount + $shipping_cost;

			$total_general += $total;

			$order->total = $total;
			$order->code = "PEDIDO-" . $order->id;
			$order->discount = $discount;
			$order->coupon_id = $coupon_id;
			$order->save();
		}

		$company = Company::whereMain(1)->first();

		$order_history->total = $total_general;
		$order_history->save();

		#Email para el cliente y para el main
		#Solo descomentar esto !!!
		//$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);

		//Esto ya estaba comentado
		//$companies_not_main = Company::whereMain(0)->get();

		//if (count($companies_not_main)) {
		#Email para las compañias not main;
		//$this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		//}
		//

		//Trying with culqi

		$credit_card_payment = false;
		$payment_index = 0;
		$payment_description = "";
		$payment_amount = 0;
		$company_logo = "";

		$account_id = $data['account_id'];
		$account = Account::find($account_id);

		if ($account->payment_way_id == 3) {
			#yes, work with culqi
			$payment_description = "Productos";
			$payment_amount = $order_history->total * 100;

			$culqi = new Culqi(array('api_key' => env('SECRET_KEY')));
			$order_culqi = $culqi->Orders->create(
				array(
					"amount" => $payment_amount,
					"currency_code" => "PEN",
					"description" => $payment_description,
					"order_number" => "#order-" . $order_history->id,
					"client_details" => array(
						"first_name" => $customer->first_name,
						"last_name" => $customer->last_name,
						"email" => $customer->email,
						"phone_number" => $customer->cel_whatsapp,
					),
					"expiration_date" => time() + 24 * 60 * 60, // Orden con un dia de validez
					"confirm" => false,
				)
			);
			$credit_card_payment = true;
			$payment_index = $order_culqi->id;

			$company_logo = Company::first()->logotype_thumb;
		} else {
			$customer_email = $order_history->customer->email;
			$customer_name = $order_history->customer->first_name . " " . $order_history->customer->last_name;

			$company = Company::whereMain(1)->first();
			//$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name, 'Has realizado una Pedido', 'Se ha hecho un pedido');
		}
		//----------------
		$request->session()->forget('order_history_id');
		$request->session()->put('order_history_id', $order_history->id);

		if ($flag_customer) {
			$company = Company::first();
			$send = array(
				'logotype' => $company->logotype,
				'first_name' => $customer->first_name,
				'last_name' => $customer->last_name,
				'username' => $user->username,
				'password' => $customer->identity_document,
				'date_formatted' => Date::parse($user->created_at)->format('d \d\e\ F \d\e\l\ Y'),
				'link' => url('/') . '/acceder',
				'dominio' => $_SERVER['SERVER_NAME'],
			);

			try {
				//Mail::to($customer->email)->send(new UserRegisteredMailTemplate11($send, $company->email));
			} catch (\Exception $e) {

			}
		}



		return response()->json(['order_index' => $payment_index, 'payment_status' => $credit_card_payment, 'payment_description' => $payment_description, 'payment_amount' => $payment_amount, 'order_history_id' => $order_history->id, 'company_logo' => $company_logo], 200);
	}

	public function get_shipping_cost($district_id, $product_ids) {
		$valores = (array) json_decode($product_ids);

		$arr_subcategory = [];

		foreach ($valores as $key => $value) {
			$product = Product::find($key);
			$arr_subcategory[] = $product->subcategory_id;
		}

		$max_amount = DB::table('costs')
			->join('cost_district', 'costs.id', '=', 'cost_district.cost_id')
			->join('cost_subcategory', 'costs.id', '=', 'cost_subcategory.cost_id')
			->where('cost_district.district_id', $district_id)
			->whereIn('cost_subcategory.subcategory_id', $arr_subcategory)
			->orderBy('costs.cost', 'DESC')
			->select(['costs.id as id', 'costs.cost as amount'])
			->first();

		if (!count($max_amount)) {
			return ['id' => 0, 'amount' => 0];
		}

		return ['id' => $max_amount->id, 'amount' => $max_amount->amount];
	}


	public function send_email_to_customer_from_quotation_history($order_history_id, $company_email, $customer_email, $customer_name, $subject_customer = 'Has realizado un pedido', $subject_company = 'Se ha hecho un pedido') {

		$company_main = Company::whereMain(1)->first();

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('customer');
			$query->with('products');
			$query->with('company');
		}])->with('account')->find($order_history_id);

		$array_to_return = [];

		foreach ($order_history->orders as $key => $order) {

			$date_formatted = Date::parse($order->created_at)->format('d \d\e\ F \d\e\l\ Y');
			$code = $order->id;
			$code_uuid = $order->uuid;
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
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $company_main->name_company,
			'email' => $company_main->email,
			'subject' => $subject_customer,
		);

		//Mail::to($customer_email)->send(new CustomerSuccessfulOrder($data));
		Mail::to($customer_email)->send(new CustomerSuccessfulQuotationTemplate2($data));

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $customer_name,
			'email' => $company_main->email,
			'subject' => $subject_company,
		);

		//Mail::to($company_main->email)->send(new CustomerSuccessfulOrder($data));
		Mail::to($company_main->email)->send(new CustomerSuccessfulQuotationTemplate2($data));
	}

	public function send_email_to_customer_from_order_history($order_history_id, $company_email, $customer_email, $customer_name, $subject_customer = 'Has realizado un pedido', $subject_company = 'Se ha hecho un pedido') {

		$company_main = Company::whereMain(1)->first();

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('customer');
			$query->with('products');
			$query->with('company');
		}])->with('account')->find($order_history_id);

		$array_to_return = [];

		foreach ($order_history->orders as $key => $order) {

			$date_formatted = Date::parse($order->created_at)->format('d \d\e\ F \d\e\l\ Y');
			$code = $order->id;
			$code_uuid = $order->uuid;

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
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $company_main->name_company,
			'email' => $company_main->email,
			'subject' => $subject_customer,
		);

		//Mail::to($customer_email)->send(new CustomerSuccessfulOrder($data));

		try {
			Mail::to($customer_email)->send(new CustomerSuccessfulOrderTemplate5($data));
		} catch (\Exception $e) {
			//nothing
		}


		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $customer_name,
			'email' => $company_main->email,
			'subject' => $subject_company,
		);

		//Mail::to($company_main->email)->send(new CustomerSuccessfulOrder($data));

		try {

		} catch (\Exception $e) {
			Mail::to($company_main->email)->send(new CustomerSuccessfulOrderTemplate5($data));
		}

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

			try {
				Mail::to($company_email)->send(new CustomerSuccessfulOrder($data));
			} catch (\Exception $e) {

			}

		}
	}

public function confirm_payment(Request $request) {

		$order_history_id = $request->order_history_id;
		#PagoEfectivo
		if ($request->credit_card_payment == "false") {
			$request->session()->put('charge', $request->culqi_order);
			return;
		}
		#CreditCard
		$order_history = OrderHistory::with('orders.products')->with('customer')->find($order_history_id);

		try {

			$SECRET_KEY = env('SECRET_KEY');
			$culqi = new Culqi(array('api_key' => $SECRET_KEY));
			// Creando Cargo a una tarjeta
			$charge = $culqi->Charges->create(
				array(
					"amount" => $order_history->total * 100,
					"installments" => $request->cuotas,
					"currency_code" => "PEN",
					"email" => $order_history->customer->email,
					"source_id" => $request->token,
				)
			);

			$request->session()->put('charge', $charge);
			// Respuesta
			//$charge = json_encode($charge);
			if ($charge->object == "charge") {
				#successful payment
				foreach ($order_history->orders as $key => $order) {
					$order->status = 2;
					$order->save();

					foreach ($order->products as $u => $product) {
						$product->stock = $product->stock - $product->pivot->quantity;
						$product->save();
					}

				}
			}

			$customer_email = $order_history->customer->email;
			$customer_name = $order_history->customer->first_name . " " . $order_history->customer->last_name;

			$company = Company::whereMain(1)->first();
			$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name, 'Has realizado una compra', 'Se ha hecho una Compra');

			return response()->json($charge);

		} catch (Exception $e) {
			$request->session()->put('charge', $e->getMessage());

			foreach ($order_history->orders as $key => $order) {
				$order->status = 3;
				$order->save();
			}

			return $e->getMessage();

		}
	}


	public function tracking_by_order_code($code) {

		$order = Order::whereCode($code)->first();

		if (!count($order)) {
			return response()->json(['title' => 'Error', 'message' => 'El código no existe'], 400);
		}

		$trackings = Shipping::whereOrderId($order->id)
			->with('shipping_status')
			->orderBy('shipping_status_id', 'DESC')
			->first();

		$states = ShippingStatus::all();

		//foreach ($trackings as $key => $tracking) {
		 	//$tracking->date_formatted = strtoupper(Date::parse($tracking->date)->format('j F Y'));
		 	//$date_formatted = Date::parse($trackings->date)->format('d \d\e\ F \d\e\l\ Y');
		 	//$date_formatted = Date::parse($trackings->date)->format('j F Y');
		$date_formatted = "";
		$order_date = Date::parse($order->created_at)->format('j F H:i');

		if (count($trackings)) {
			$date_formatted = Date::parse($trackings->created_at)->format('j F H:i');
		}
		// }

		return response()->json(['trackings' => $trackings, 'states' => $states, 'date_formatted' => $date_formatted, 'order_date' => $order_date]);

	}

	public function quotation(QuotationRequest $request) {

		$data = $request->all();
		#Veryfing
		$customer = Customer::whereIdentityDocument($request->identity_document)
			->first();

		if (count($customer)) {
			$customer->fill($data);
			$customer->save();
		} else {
			#Register account
			$customer = new Customer;
			$customer->fill($data);
			//$customer->identity_document = $data['identity_document'];
			$customer->city_id = 0;
			$customer->country_id = 0;
			$customer->customer_type = 1;
			$customer->save();
		}

		$customer_id = $customer->id;
		$customer_email = $customer->email;
		$customer_name = "$customer->first_name $customer->last_name";

		$shipping_cost = 0;
		$cost_id = 0;

		$order_history = new OrderHistory();
		$order_history->date = Carbon::now()->format('Y-m-d');
		$order_history->ordered_products = $data['product_ids'];
		$order_history->total = 0;
		$order_history->description = '';
		$order_history->customer_id = $customer_id;
		$order_history->account_id = 1; //cotizacion por default id=1
		$order_history->currency_id = 1;
		$order_history->save();

		$product_ids = $request->product_ids;
		//$ids_array = explode(',', $product_ids);
		//$valores = array_count_values($ids_array);
		$valores = (array) json_decode($product_ids);

		$cart_array = [];
		$total_general = 0;

		$companies_id_array = [];
		$total = 0;
		foreach ($valores as $key => $value) {

			#Key is the id and value is the quantity;

			$product = Product::find($key);

			//$price = 0;

			#Key is the id and value is the quantity;
			$place_id = $request->place_id;

			$product_price = Product::with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])->find($key);

			$price = $product_price->price;

			if ($product_price->unit_price) {
				$price = $product_price->unit_price->price;
			}

			$price = $price; //

			$cart_array[] = array(
				'id' => $key,
				#Se vende a este precio
				'price' => $price,
				'quantity' => $value,
				'company_id' => $product->company_id,
				#precio original
				'discount' => 0,
			);

			$total = $total + $value * $price;

			$companies_id_array[] = $product->company_id;
		}

		$companies = Company::whereIn('id', $companies_id_array)
			->get();

		foreach ($companies as $key => $company) {
			$company_id = $company->id;

			$customer->companies()->attach($company_id);

			/*$total = 0;*/
			$discount = 0;
			$coupon_id = 0;

			$order = new Order;
			$order->code = '';
			$order->uuid = Uuid::generate(4)->string;
			$order->description = '';
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = 1; // Usuario admin
			$order->account_id = 1;
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->shipping_cost = $shipping_cost;
			$order->discount = $discount;
			$order->coupon_id = $coupon_id;
			$order->cost_id = $cost_id;
			$order->order_type = 2;

			$order->place_id = $request->place_id;
			$order->address = $request->address;
			$order->type_recommendation = $request->type_recommendation;

			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			$order->code = "COTIZACION-" . $order->id;
			$order->save();
		}

		$company = Company::whereMain(1)->first();

		#Email para el cliente y para el main
		#Solo descomentar esto !!!
		$this->send_email_to_customer_from_quotation_history($order_history->id, $company->email, $customer_email, $customer_name, 'Has realizado una cotización', 'Se ha hecho un pedido de cotización');

		//Esto ya estaba comentado
		//$companies_not_main = Company::whereMain(0)->get();

		//if (count($companies_not_main)) {
		#Email para las compañias not main;
		//$this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		//}
		//

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha enviado la cotización'], 201);

	}

}
