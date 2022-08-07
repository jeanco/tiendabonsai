<?php

namespace App\Http\Controllers\Template_8;

use App\AlternativeDirection;
use App\Category;
use App\Company;
use App\Country;
use App\Customer;
use App\Entities\OrderHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationSaveTemplate8;
use App\Mail\CompanyQuotationTemplate8;
use App\Mail\CustomerQuotationTemplate8;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;
use Uuid;

class QuotationController extends Controller {

	public function show_view() {

		$categories = Category::wherePublished(1)
			->whereHas('products_published')
			->with(['subcategories_published' => function ($query) {
				$query->select(['id', 'name', 'category_id']);
			}])
			->with(['products_published' => function ($query) {
				$query->select(['id', 'name', 'category_id'])
					->with('main_photo');
			}])
			->select(['id', 'name'])
			->get();

		return view('template_8.quotation.index', compact('categories'));
	}

	public function show_product_view() {

		// $categories_ = Category::with(['products' => function ($query) {
		// 	$query->wherePublished(1);
		// 	$query->select(['id', 'name', 'category_id']);
		// 	$query->with('photo');
		// }])->wherePublished(1)
		// 	->select(['id', 'name'])
		// 	->whereHas('products', function ($query) {
		// 		$query->wherePublished(1);
		// 	})
		// 	->get();
		$country = Country::first();
		$country_id = $country->id;

		return view('template_8.quotation.form', compact('country_id'));
	}

	public function store(QuotationSaveTemplate8 $request) {

		$data = $request->all();
		#Veryfing
		//return $data;
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
		$order_history->ordered_products = "";
		$order_history->total = 0;
		$order_history->description = '';
		$order_history->customer_id = $customer_id;
		$order_history->account_id = 1; //cotizacion por default id=1
		$order_history->currency_id = 1;
		$order_history->save();

		$total = 0;

		$product = Product::find($data['product_id']);

		$order = new Order;
		$order->code = '';
		$order->uuid = Uuid::generate(4)->string;
		$order->description = '';
		$order->message = '';
		$order->total = $total;
		$order->customer_id = $customer_id;
		$order->status = 1; // Pendiente
		$order->user_id = 1; // Usuario admin
		$order->account_id = 0;
		$order->currency_id = 1;
		$order->is_separated = 0;
		$order->company_id = 1;
		$order->order_history_id = $order_history->id;
		$order->shipping_cost = $shipping_cost;
		$order->discount = 0;
		$order->coupon_id = 0;
		$order->cost_id = $cost_id;
		$order->order_type = 2;
		$order->place_id = 0;
		$order->address = "";
		$order->type_recommendation = "";
		$order->guarantee = $data['guarantee'];
		$order->when_purchased = $data['when_purchased'];
		$order->simulate_financing = $data['simulate_financing'];
		$order->save();

		$other_address = new AlternativeDirection();

		$other_address->fill($data);
		$other_address->customer_id = $customer_id;
		$other_address->save();
		$alternative_direction_id = $other_address->id;

		$order->products()->attach($product->id,
			[
				'quantity' => 1,
				'price' => 0,
				'discount' => 0,
			]);

		$order->code = "COTIZACION-" . $order->id;
		$order->alternative_direction_id = $alternative_direction_id;
		$order->save();

		$company = Company::whereMain(1)->first();

		//$this->send_email_to_customer_from_quotation_history($order_history->id, $company->email, $customer_email, $customer_name, 'Has realizado una cotización', 'Se ha hecho un pedido de cotización');

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha enviado la cotización'], 201);
	}

	public function send_email_to_customer_from_quotation_history($order_history_id, $company_email, $customer_email, $customer_name, $subject_customer = 'Has realizado un pedido', $subject_company = 'Se ha hecho un pedido') {

		$company_main = Company::whereMain(1)->first();

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('customer');
			//$query->with('products');
			$query->with('company');
		}])->with('account')->find($order_history_id);

		$code = $order_history->orders[0]->id;
		$code_uuid = $order_history->orders[0]->uuid;
		$date_formatted = Date::parse($order_history->orders[0]->created_at)->format('d \d\e\ F \d\e\l\ Y');

		// $array_to_return = [];

		// foreach ($order_history->orders as $key => $order) {

		// 	$array_products_bought = [];

		// 	foreach ($order->products as $k => $product) {

		// 		$array_products_bought[] = array(
		// 			'name' => $product->name,
		// 			'price' => $product->pivot->price,
		// 			'discount' => $product->pivot->discount,
		// 			'quantity' => $product->pivot->quantity,
		// 		);
		// 	}

		// 	$array_to_return[] = array(
		// 		'company_name' => $order->company->name_company,
		// 		'company_logo' => $order->company->logotype_thumb,
		// 		'total' => $order->total,
		// 		'products' => $array_products_bought,
		// 	);
		// }

		$data = array(
			//'orders' => $array_to_return,
			'company_main_email' => $company_main->email,
			//'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			//'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $company_main->name_company,
			'email' => $company_main->email,
			'subject' => $subject_customer,
		);

		Mail::to($customer_email)->send(new CustomerQuotationTemplate8($data));

		$data = array(
			//'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			//'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'logotype' => $company_main->logotype_thumb,
			//'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $customer_name,
			'email' => $company_main->email,
			'subject' => $subject_company,
		);

		Mail::to($company_main->email)->send(new CompanyQuotationTemplate8($data));
	}

	public function complete() {
		return view('template_2.quotation.1_quotation_complete');
	}
}
