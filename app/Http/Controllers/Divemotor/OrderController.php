<?php

namespace App\Http\Controllers\Divemotor;

use Auth;
use App\City;
use App\User;
use App\Order;
use Datatables;
use App\Company;
use App\Product;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Entities\OrderHistory;
use App\Services\NextNumberService;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\CustomerSuccessfulOrder;
use App\Http\Requests\StoreOrderDivemotorRequest;


class OrderController extends Controller {

	public function get_view(){

		$last_order = Order::orderBy('id', 'DESC')
			->first();

		$last_number = $last_order->number;

		$new_number = new NextNumberService();
		$number = $new_number->execute($last_number);

		return view("divemotor.checkout.shopping_cart", compact('number'));
	}

	public function store(StoreOrderDivemotorRequest $request) {

		$data = $request->except('first_name');
        $data['last_name'] = "";
        $data['account_id'] = 0;
        $data['city_id'] = 0;
        $data['country_id'] = 0;
        $data['user_id'] = 0;

        $exist_number = Order::whereNumber($data['number'])->get();

        if (count($exist_number)) {
            return response()->json(['title' => 'Error', 'message' => 'El número enviado ya existe'], 400);
        }

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
            $customer->first_name = $request->first_name;
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
		// $order_history->description = $data['description'];
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
                'commission_percentage' => $product->commission_percentage,
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

            $total_commission = 0;
			$total = 0;

			$order = new Order;
            $order->code = '';
            $order->number = $data['number'];
			$order->description = $data['description'];
			$order->message = '';
			$order->total = $total;
			$order->customer_id = $customer_id;
			$order->status = 1; // Pendiente
			$order->user_id = Auth::user()->id; // Usuario admin
			$order->account_id = $data['account_id'];
			$order->currency_id = 1;
			$order->is_separated = 0;
			$order->company_id = $company->id;
			$order->order_history_id = $order_history->id;
			$order->save();

			foreach ($cart_array as $i => $product) {
				if ($company_id == $product['company_id']) {

                    $total += (float) $product['price'];
                    $total_commission = (float) $product['price']*$product['commission_percentage']/100 + $total_commission;

					#Se crea una orden con esta compañía
					$order->products()->attach($product['id'],
						[
							'quantity' => $product['quantity'],
							'price' => $product['price'],
							'discount' => $product['discount'],
						]);
				}
			}

			#Calculating the igv
			$total_igv = round($total*0.18,2);
            $order->commission = $total_commission;
			$order->subtotal = $total;
			$order->total_igv = $total_igv;
			$order->total = round($total + $total_igv, 2);
			$order->save();
		}

		// $company = Company::whereMain(1)->first();

		#Email para el cliente y para el main
		//-----------$this->send_email_to_customer_from_order_history($order_history->id, $company->email, $customer_email, $customer_name);

		// $companies_not_main = Company::whereMain(0)->get();

		// if (count($companies_not_main)) {
			#Email para las compañias not main;
			// $this->send_email_to_companies_from_order_history($order_history->id, $company->email, $company->name_company);
		// }
		$new_number = new NextNumberService();
		$number = $new_number->execute($data['number']);

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha generado satisfactoriamente su Cotización', 'number' => $number, 'order_id' => $order->id]);
		// return "ok";
	}

	public function get_view_quotation(){

		$customers = Customer::select(['id', 'first_name', 'last_name'])
			->get();

		$user_id = Auth::user()->id;

		$is_admin = false;

		$user_oficial = User::find($user_id);

		$user = User::whereHas('roles', function($query){
			$query->where('roles.name', 'ejecutivo-de-ventas');
		})->find($user_id);

		if (count($user)) {
			$salesmen = User::whereId($user_id)->get();
			$cities = City::whereId($user_oficial->city_id)->get();

		} else {
			$salesmen = User::whereHas('roles', function($query){
				$query->where('roles.name', 'ejecutivo-de-ventas');
			})
			->select(['id', 'first_name', 'last_name'])
			->get();

			$is_admin = true;

			$cities = City::all();
		}

        return view('divemotor.users.quotation.index', compact('cities', 'salesmen', 'customers', 'is_admin'));
	}

	public function datatable(Request $request){
			$city_id = $request->city_id;
			$user_id = $request->user_id;
			$start_date = $request->start_date;
			$end_date = $request->end_date;
			$customer_id = $request->customer_id;

			$result = (new Order)->newQuery();

			$result = $result->join('customers', 'customers.id', '=', 'orders.customer_id')
				->join('users', 'users.id', '=', 'orders.user_id')
				->join('cities', 'cities.id', '=', 'users.city_id')
				->select(['orders.id as id', 'orders.order_type as index', 'cities.name as city_name' ,'orders.created_at as emission_date',
					'orders.number as number', 'customers.first_name as customer_first_name',
					'customers.last_name as customer_last_name', 'users.first_name as salesman_first_name',
					'users.last_name as salesman_last_name', 'orders.total as total', 'orders.commission as commission'])
				->whereDate('orders.created_at', '>=', $start_date)
				->whereDate('orders.created_at', '<=', $end_date);

				if ($city_id != '') {
					$result = $result->where('cities.id', '=', $city_id);
				}

				if ($user_id != '') {
					$result = $result->where('orders.user_id', '=', $user_id);
				}

				if ($customer_id != '') {
					$result = $result->where('customers.id', $customer_id);
				}


			return DataTables::of($result)
				->addColumn('Actions', function ($model) {
					return;
				})->make(true);

	}

	public function see_quotation($id){

		$order = Order::with('customer')
			->with('products')
			->with('user')
			->find($id);

		return view('divemotor.checkout.order_view', compact('order'));
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
				'total_igv' => $order->total_igv,
				'company_name' => $order->company->name_company,
				'company_logo' => $order->company->logotype_thumb,
				'total' => $order->total,
				'products' => $array_products_bought,
			);
		}

		// $data = array(
		// 	'orders' => $array_to_return,
		// 	'company_main_email' => $company_main->email,
		// 	'payment_way' => $order_history->account->name,
		// 	'document_link' => url('/') . '/documento/' . $order_history_id,
		// 	'company_main_name' => $company_main->name_company,
		// );

		// Mail::to($customer_email)->send(new CustomerSuccessfulOrder($data));

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => '',
			'document_link' => url('/') . '/documento/' . $order_history_id,
			'company_main_name' => $customer_name,
		);

		Mail::to($company_main->email)->send(new CustomerSuccessfulOrder($data));
	}

}
