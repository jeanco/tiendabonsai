<?php

namespace App\Http\Controllers\Landing;

use App\Account;
use App\Company;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Mail\CustomerSuccessOrder;
use App\Mail\SendMailOrder;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;

class OrderController extends Controller {
	public function store(Request $request) {
		$customer_raw = $request->person;
		$products_raw = $request->items;

		// if (isset($customer_raw['birthday'])) {
		// 	$customer_raw['birthday'] = Carbon::createFromFormat('d/m/Y', $customer_raw['birthday'])->format('Y-m-d');
		// }

		$customer_stored = Customer::where('identity_document', $customer_raw['identity_document'])
			->first();

		if (count($customer_stored)) {
			$customer_stored->fill($customer_raw);
			$customer_stored->cel_whatsapp = $customer_raw['whatsapp'];
			$customer_stored->save();
			$customer_id = $customer_stored->id;
			$customer_email = $customer_stored->email;
			$customer_name = "$customer_stored->first_name $customer_stored->last_name";
		} else {
			$customer = new Customer;
			$customer->fill($customer_raw);
			$customer->cel_whatsapp = $customer_raw['whatsapp'];
			$customer->customer_type = 1;
			$customer->save();
			$customer_id = $customer->id;
			$customer_email = $customer->email;
			$customer_name = "$customer->first_name $customer->last_name";
		}

		$order = new Order;
		$order->code = '';
		$order->description = '';
		$order->message = '';
		$order->total = 0;
		$order->customer_id = $customer_id;
		$order->status = 1; // Pendiente
		$order->user_id = 1; // Usuario admin
		//$order->user_id = Auth::user()->id;
		$order->account_id = $request->account_id;
		// $order->currency_id = $request->currency_id;
		$order->currency_id = 1;
		$order->is_separated = (boolean) $request->is_separated;
		$order->save();

		$order->code = 'OP-' . $order->id;
		$order->save();

		$total = 0;

		foreach ($products_raw as $i => $product_raw) {

			$product = Product::find($product_raw['item_id']);

			$price = $product->price;

			if ($product->promotion_available) {
				$price = $product->price_promotion;
			}

			$discount = (float) $product->price - (float) $price;

			$total += $price;

			$order->products()->attach($product->id,
				[
					'quantity' => $product_raw['quantity'],
					'price' => $price,
					'discount' => $discount,
				]);
		}

		$order->total = $total;
		$order->save();

		// Data of Company
		$company = Company::first();
		// Data for Email
		$emailData = array(
			'code' => $order->code,
			'logo' => $company->logotype,
			'companyName' => $company->name_company,
			'name' => $customer_name,
			'email' => $customer_email,
		);

		//email enviado a la empresa
		$emailCompany = $company->email;
		Mail::to($emailCompany)->send(new SendMailOrder($emailData, $customer_email));

		//Building the structure to send to the customer email;
		$id = $order->id;
		// $id = 4;

		$order = Order::with('products')->with(['account' => function ($query) {
			$query->with('payment_way');
			$query->with('payment_entity');
		}])
			->with('customer')->find($id);

		$date_in_spanish = Date::parse($order->created_at)->format('j \d\e F Y \- H:i \h\o\r\a\s');

		$quantity = 0;
		$total = 0;
		foreach ($order->products as $key => $product) {

			$quantity += $product->pivot->quantity;
			$total += (float) $product->pivot->quantity * (float) $product->pivot->price;
			$products[] = array(
				'quantity' => $product->pivot->quantity,
				'name' => $product->name,
				'price' => $product->pivot->price,
				'discount' => $product->pivot->discount,
				'total' => (float) $product->pivot->quantity * (float) $product->pivot->price,
			);

		}

		$company_info = Company::first();

		$company = array(
			'name' => $company_info->company_name,
			'ruc' => $company_info->ruc,
			'cel' => $company_info->cel,
			'phone' => $company_info->phone,
			'email' => $company_info->email,
			'address' => $company_info->address,
			'logotype_thumb' => $company_info->logotype_thumb,
		);

		$payment_way_selected = array(
			'type' => $order->account->payment_way->name,
			'logo' => $order->account->payment_entity->logo,
			'description' => $order->account->description,
			'instructions' => $order->account->instructions,
			'owner_name' => $order->account->owner_name,
			'owner_document' => $order->account->owner_document,
		);

		$accounts = Account::with('payment_way')
			->with('payment_entity')
			->where('id', '!=', $order->account_id)
			->get();

		foreach ($accounts as $key => $account) {
			$payment_ways[] = array(
				'type' => $account->payment_way->name,
				'logo' => $account->payment_entity->logo,
				'description' => $account->description,
				'instructions' => $account->instructions,
				'owner_name' => $account->owner_name,
				'owner_document' => $account->owner_document,
			);
		}

		$t = array(
			'code' => $order->code,
			'date' => $date_in_spanish,
			'products' => $products,
			'quantity' => $quantity,
			'total' => $total,
			'company' => $company,
			'payment_way_selected' => $payment_way_selected,
			'payment_ways' => $payment_ways,
			'is_separated' => $order->is_separated,
			'have_to_pay' => (float) $order->total * 0.1,
		);

		Mail::to($order->customer->email)->send(new CustomerSuccessOrder($t));

		return response()->json(['success' => true, 'message' => 'Ha realizado su compra en kamasa.pe, ¡PRONTO RECIBIRAS TU PEDIDO!'], 200);

		// return response()->json(['success' => false, 'message' => 'Este email ya está registrado, gracias.' ], 500);
	}
}
