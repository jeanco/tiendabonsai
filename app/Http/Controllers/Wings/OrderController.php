<?php

namespace App\Http\Controllers\Wings;

use Mail;
use App\Order;
use App\Company;
use App\Product;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Entities\OrderHistory;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Mail\CustomerSuccessfulOrder;
use App\Mail\CustomerSuccessfulOrderWings;
use App\Http\Requests\OrderSaveRequestWings;

class OrderController extends Controller {

	public function store(OrderSaveRequestWings $request){
		$data = $request->all();

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
            $order->code = "PEDIDO-{$order->id}";
			$order->save();
		}

		$company = Company::whereMain(1)->first();

		#Email para el cliente y para el main
		$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);
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
			'payment_way' => ($order_history->account != null) ? $order_history->account->name : '',
			'document_link' => url('/') . '/documento/' . $order_history_id,
			'company_main_name' => $company_main->name_company,
		);

		Mail::to($customer_email)->send(new CustomerSuccessfulOrderWings($data));

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => ($order_history->account != null) ? $order_history->account->name : '',
			'document_link' => url('/') . '/documento/' . $order_history_id,
			'company_main_name' => $customer_name,
		);

		Mail::to($company_main->email)->send(new CustomerSuccessfulOrderWings($data));
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

		return view('oyeepe.pedidos.document', compact('order', 'company'));
	}


}
