<?php

namespace App\Http\Controllers;

use App\BillingCard;
use App\Company;
use App\Customer;
use App\GalleryType;
use App\Mail\CompanySuccessfulOrder;
use App\Mail\CustomerConfirmOrder;
use App\Mail\CustomerSuccessfulOrder;
use App\Order;
use App\OrderProduct;
use App\PermissionUser;
use App\Place;
use App\Product;
use App\ShippingStatus;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class OrdersController extends Controller {

	public function getViewOrders() {

		$user = Auth::user();
		$company_id = $user->company_id;

		$t = [];
		$orders = Order::with('customer')
			->orderBy('id', 'DESC')
			->whereCompanyId($company_id)
			->get();

		if (count($orders)) {
			foreach ($orders as $i => $order) {

				$customer = [];

				$total_quantity = 0;

				$order_products = OrderProduct::where('order_id', $order->id)->get();

				foreach ($order_products as $key => $order_product) {
					$total_quantity += $order_product->quantity;
				}

				$customer = array(
					'name' => $order['customer']['first_name'] . " " . $order['customer']['last_name'],
					'cel' => $order['customer']['cel_whatsapp'],
				);

				$currency = DB::table('currencies')
					->where('id', $order->currency_id)
					->first();

				$exchange_rate = DB::table('exchange_rates')
					->where('currency_id', $order->currency_id)
					->first();

				$rate = $exchange_rate->sales_exchange;
				$decimal = $currency->decimal ? 2 : 0;
				$symbol = $currency->symbol;

				$t[] = array(
					'id' => $order->id,
					'date' => $order->created_at->format('d-m-Y'),
					'code' => $order->code,
					'status' => $order->status,
					'quantity' => $total_quantity,
					'total' => $symbol.number_format($order->total*$rate, $decimal, '.', ''),
					'customer' => $customer,
				);
			}
		}

		$companies = Company::select(['id', 'name_company'])
			->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$shipping_status = ShippingStatus::all();

		return view('admin.routers.orders', [
			'orders' => $t,
			'companies' => $companies,
			'permissions_array' => $permissions_array,
			'gallery_types' => $gallery_types,
			'places' => $places,
			'shipping_status' => $shipping_status,
		]);
	}

	public function get_orders_list_view() {

		$user_id = Auth::user()->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$places = [];

		$gallery_types = [];
		return view('admin.routers.orders_list', compact('permissions_array', 'places', 'gallery_types'));
	}

	public function getDetailOrder($id) {
		//Array order
		$t = [];

		//Array products
		$p = [];

		//Array Customer
		$c = [];

		$total_quantity = 0;

		$order = Order::with('customer')->find($id);

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
				'price' => $order_product->price,
				'discount' => $order_product->discount,
				'sub_total' => (float) $order_product->quantity * (float) $order_product->price,
			);

			$total_quantity += $order_product->quantity;
		}

		$c = array(
			'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
			'email' => $order->customer->email,
			'cel' => $order->customer->cel_whatsapp,
		);

		$t = array(
			'id' => $order->id,
			'code' => $order->code,
			'date' => $order->created_at->format('d-m-Y H:i'),
			'status' => $order->status,
			'quantity' => $total_quantity,
			'total' => $order->total,
			'products' => $p,
			'customer' => $c,
		);

		return $t;
	}

	public function allByFilters(Request $request) {
		$name = $request->q;
		$date = $request->date;
		$status = $request->status;

		$orders = (new Order)->newQuery();

		if ($name != '') {

			$orders = $orders->whereHas('customer', function ($query) use ($name) {
				$query->where('first_name', 'LIKE', "%$name%");
				$query->orWhere('last_name', 'LIKE', "%$name%");
			});

			if ($status != '') {
				$orders = $orders->whereStatus($status);
			}

			if ($date != '') {
				$orders = $orders->whereDate('created_at', $date);
			}

		} else {
			if ($status != '') {
				$orders = $orders->whereStatus($status);
			}

			if ($date != '') {
				$orders = $orders->whereDate('created_at', $date);
			}
		}

		$orders = $orders->with('customer')->get();

		$t = [];

		if (count($orders)) {
			foreach ($orders as $i => $order) {

				$customer = [];

				$total_quantity = 0;

				$order_products = OrderProduct::where('order_id', $order->id)->get();

				foreach ($order_products as $key => $order_product) {
					$total_quantity += $order_product->quantity;
				}

				$customer = array(
					'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
					'cel' => $order->customer->cel_whatsapp,
				);

				$t[] = array(
					'id' => $order->id,
					'date' => $order->created_at->format('d-m-Y'),
					'code' => $order->code,
					'status' => $order->status,
					'quantity' => $total_quantity,
					'total' => $order->total,
					'customer' => $customer,
				);
			}
		}

		return $t;
	}

	public function getOrderByCustomerName($customerName) {
		$arrayOrders = [];
		$customers = Customer::where('first_name', 'LIKE', "%$customerName%")->orWhere('last_name', 'LIKE', "%$customerName%")->get();

		$indice = 0;
		foreach ($customers as $k => $customer) {
			foreach ($customer->orders as $i => $order) {
				$arrayOrders[$indice]['orderId'] = $order->id;
				$arrayOrders[$indice]['orderDate'] = $order->created_at->format('d-m-Y');
				$arrayOrders[$indice]['orderCode'] = $order->code;

				$quantity = 0;
				$orderProducts = OrderProduct::where('order_id', $order->id)->get();
				foreach ($orderProducts as $l => $orderProduct) {
					$quantity = $quantity + $orderProduct->quantity;
				}
				$arrayOrders[$indice]['orderQuantity'] = $quantity;
				$arrayOrders[$indice]['orderTotal'] = $order->price;

				$arrayOrders[$indice]['customerName'] = $customer->first_name . ' ' . $customer->last_name;
				$arrayOrders[$indice]['customerCel'] = $customer->cel_whatsapp;
				$indice = $indice + 1;
			}
		}

		return $arrayOrders;
	}

	public function getOrdersByStatus($statusId) {
		$arrayOrders = [];
		$orders = Order::where('status', $statusId)->get();

		if (count($orders)) {
			foreach ($orders as $i => $order) {
				$arrayOrders[$i]['orderId'] = $order->id;
				$arrayOrders[$i]['orderDate'] = $order->created_at->format('d-m-Y');
				$arrayOrders[$i]['orderCode'] = $order->code;

				$quantity = 0;
				$orderProducts = OrderProduct::where('order_id', $order->id)->get();
				foreach ($orderProducts as $l => $orderProduct) {
					$quantity = $quantity + $orderProduct->quantity;
				}
				$arrayOrders[$i]['orderQuantity'] = $quantity;
				$arrayOrders[$i]['orderTotal'] = $order->price;

				$customer = Customer::find($order->customer_id);
				$arrayOrders[$i]['customerName'] = $customer->first_name . ' ' . $customer->last_name;
				$arrayOrders[$i]['customerCel'] = $customer->cel_whatsapp;
			}
		}
		return response()->json(['orders' => $arrayOrders], 200);
	}

	public function getOrdersByDateAndStatus($dateVal, $status) {
		$orders = Order::all();

		if ($dateVal == 0) {
			if ($status == 0) {
			} else {
				$orders = Order::where('status', $status)->get();
			}
		} else {
			if ($status == 0) {
				$orders = Order::whereDate('created_at', '=', $dateVal)->get();
			} else {
				$orders = Order::whereDate('created_at', '=', $dateVal)->where('status', $status)->get();
			}
		}

		$arrayOrders = [];

		if (count($orders)) {
			foreach ($orders as $i => $order) {
				$arrayOrders[$i]['orderId'] = $order->id;
				$arrayOrders[$i]['orderDate'] = $order->created_at->format('d-m-Y');
				$arrayOrders[$i]['orderCode'] = $order->code;
				$arrayOrders[$i]['orderStatus'] = $order->status;

				$quantity = 0;
				$orderProducts = OrderProduct::where('order_id', $order->id)->get();
				foreach ($orderProducts as $l => $orderProduct) {
					$quantity = $quantity + $orderProduct->quantity;
				}
				$arrayOrders[$i]['orderQuantity'] = $quantity;
				$arrayOrders[$i]['orderTotal'] = $order->price;

				$customer = Customer::find($order->customer_id);
				$arrayOrders[$i]['customerName'] = $customer->first_name . ' ' . $customer->last_name;
				$arrayOrders[$i]['customerCel'] = $customer->cel_whatsapp;
			}
		}
		return response()->json(['orders' => $arrayOrders], 200);
	}

	public function getOrdersFromProducts($productId) {
		$orders = OrderProduct::where('product_id', $productId)->get();
		return response()->json(['orders' => $orders], 200);
	}

	public function putConfirmOrder(Request $request) {
		try {
			// $message = $request->orderMessage;
			$order = Order::find($request->orderId);
			// $order->message = $message;
			// $order->save();
			// $this->sendEmailToTheCustomer($order->customer_id, $order->id);
			$order->status = 2;
			$order->save();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function putCancelOrder(Request $request) {
		try {
			$order = Order::find($request->orderId);
			$order->status = 3;
			$order->save();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function saveCustomerFromOrder($dataCustomer) {
		$customer = Customer::where('email', $dataCustomer['email'])->first();

		if (!count($customer)) {
			$customer = new Customer;
		}

		$customer->customer_type = $dataCustomer['customerType'];

		if ($dataCustomer['customerType'] == 1) {
			$customer->first_name = $dataCustomer['firstName'];
			$customer->last_name = $dataCustomer['lastName'];
			$customer->ruc = "";
			$customer->legal_name = "";

		} else if ($dataCustomer['customerType'] == 2) {
			$customer->first_name = "";
			$customer->last_name = "";
			$customer->ruc = $dataCustomer['ruc'];
			$customer->legal_name = $dataCustomer['legal_name'];
		}

		$customer->email = $dataCustomer['email'];
		$customer->cel_whatsapp = $dataCustomer['cel'];
		$customer->facebook = $dataCustomer['facebook'];
		$customer->city = $dataCustomer['city'];
		$customer->country = $dataCustomer['country'];
		$customer->save();
		return $customer->id;
	}

	public function saveOrderProductsFromOrder($items, $orderId) {
		foreach ($items as $i => $item) {
			$orderProduct = new OrderProduct();
			$orderProduct->order_id = $orderId;
			$orderProduct->product_id = $item['itemId'];
			$orderProduct->quantity = $item['quantity'];
			$orderProduct->price = $this->getPriceFromProduct($item['itemId']) * $item['quantity'];
			$orderProduct->save();
		}
	}
	public function getPriceFromProduct($productId) {
		$product = Product::find($productId);
		if ($product->promotion_available) {
			return $product->price_promotion;
		}
		return $product->price;
	}

	public function getTotalPriceFromOrder($orderId) {
		$orderProducts = OrderProduct::where('order_id', $orderId)->get();
		$totalPrice = 0;
		foreach ($orderProducts as $i => $orderProduct) {
			$totalPrice = $totalPrice + $orderProduct->price * $orderProduct->quantity;
		}
		return $totalPrice;
	}

	public function sendEmailBoth($customerId, $orderId) {
		$company = Company::first();
		$companyEmail = $company->email;
		$customer = Customer::find($customerId);
		$customerEmail = $customer->email;
		$data = [];

		$data['company']['name'] = $company->name_company;
		$data['company']['logotype'] = $company->logotype;
		$data['company']['cel'] = $company->cel;
		$data['company']['phone'] = $company->phone;
		$data['company']['email'] = $company->email;
		$data['company']['address'] = $company->address;

		$data['customer']['email'] = $customerEmail;
		$data['customer']['first_name'] = $customer->first_name;
		$data['customer']['last_name'] = $customer->last_name;
		$data['customer']['cel'] = $customer->cel_whatsapp;
		$data['customer']['city'] = $customer->city;
		$data['customer']['country'] = $customer->country;

		$orders = DB::table('order_products')
			->select('products.name as productName', 'order_products.quantity as productQuantity', 'order_products.price as productPrice')
			->join('products', 'products.id', '=', 'order_products.product_id')
			->where('order_products.order_id', $orderId)
			->get();

		foreach ($orders as $k => $order) {
			$data['products'][$k]['productName'] = $order->productName;
			$data['products'][$k]['productQuantity'] = $order->productQuantity;
			$data['products'][$k]['productPrice'] = $order->productPrice;
		}

		$order = Order::find($orderId);
		$data['order']['total'] = $order->price;
		$data['order']['created_at'] = $order->created_at;
		$data['order']['description'] = $order->description;

		$accounts = BillingCard::where('published', 1)->get();
		$data['accounts'] = [];

		if (count($accounts)) {
			foreach ($accounts as $u => $account) {
				$data['accounts'][$u]['account_name'] = $account->account_name;
				$data['accounts'][$u]['bank_image_thumb'] = $account->bank_image_thumb;
				$data['accounts'][$u]['account_number'] = $account->account_number;
			}
		}

		Mail::to($companyEmail)->send(new CompanySuccessfulOrder($data, $customerEmail));
		Mail::to($customerEmail)->send(new CustomerSuccessfulOrder($data, $companyEmail));
	}

	public function sendEmailToTheCustomer($customerId, $orderId) {
		$company = Company::first();
		$companyEmail = $company->email;
		$customer = Customer::find($customerId);
		$customerEmail = $customer->email;
		$data = [];

		$data['company']['name'] = $company->name_company;
		$data['company']['logotype'] = $company->logotype;
		$data['company']['cel'] = $company->cel;
		$data['company']['phone'] = $company->phone;
		$data['company']['email'] = $company->email;
		$data['company']['address'] = $company->address;

		$data['customer']['email'] = $customerEmail;
		$data['customer']['first_name'] = $customer->first_name;
		$data['customer']['last_name'] = $customer->last_name;
		$data['customer']['city'] = $customer->city;
		$data['customer']['country'] = $customer->country;

		$orders = DB::table('order_products')
			->select('products.name as productName', 'order_products.quantity as productQuantity', 'order_products.price as productPrice')
			->join('products', 'products.id', '=', 'order_products.product_id')
			->where('order_products.order_id', $orderId)
			->get();

		foreach ($orders as $k => $order) {
			$data['products'][$k]['productName'] = $order->productName;
			$data['products'][$k]['productQuantity'] = $order->productQuantity;
			$data['products'][$k]['productPrice'] = $order->productPrice;
		}

		$order = Order::find($orderId);
		$data['order']['total'] = $order->price;
		$data['order']['created_at'] = $order->created_at;
		$data['order']['description'] = $order->description;
		$data['order']['message'] = $order->message;

		$accounts = BillingCard::where('published', 1)->get();
		$data['accounts'] = [];

		if (count($accounts)) {
			foreach ($accounts as $u => $account) {
				$data['accounts'][$u]['account_name'] = $account->account_name;
				$data['accounts'][$u]['bank_image_thumb'] = $account->bank_image_thumb;
				$data['accounts'][$u]['account_number'] = $account->account_number;
			}
		}

		Mail::to($customerEmail)->send(new CustomerConfirmOrder($data, $companyEmail));
	}

	public function getOrderReport($orderCode) {
		$order = Order::where('code', $orderCode)->first();
		$orderId = $order->id;
		$customer = Customer::find($order->customer_id);
		$company = Company::first();

		$orderDetails = DB::table('order_products')
			->select('products.name as productName', 'order_products.quantity as productQuantity',
				'order_products.price as productPrice')
			->join('products', 'products.id', '=', 'order_products.product_id')
			->where('order_products.order_id', $orderId)
			->get();

		$count = count($orderDetails);

		$mpdf = new \mPDF();
		$view = view('admin.reports.generic', compact(['order', 'orderDetails', 'company', 'customer']))->render();
		$mpdf->WriteHTML($view);
		$mpdf->Output();
	}

	public function getOrdersGrid() {

		$user = Auth::user();
		$company_id = $user->company_id;

		$t = [];
		$orders = Order::with('customer')
			->orderBy('id', 'DESC')
			->whereCompanyId($company_id)
			->get();

		if (count($orders)) {
			foreach ($orders as $i => $order) {

				$customer = [];

				$total_quantity = 0;

				$order_products = OrderProduct::where('order_id', $order->id)->get();

				foreach ($order_products as $key => $order_product) {
					$total_quantity += $order_product->quantity;
				}

				$customer = array(
					'name' => $order['customer']['first_name'] . " " . $order['customer']['last_name'],
					'cel' => $order['customer']['cel_whatsapp'],
				);

				$t[] = array(
					'id' => $order->id,
					'date' => $order->created_at->format('d-m-Y'),
					'code' => $order->code,
					'status' => $order->status,
					'quantity' => $total_quantity,
					'total' => $order->total,
					'customer' => $customer,
				);
			}
		}

		$companies = Company::select(['id', 'name_company'])
			->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$shipping_status = ShippingStatus::all();

		return view('admin.routers.orders_grid', [
			'orders' => $t,
			'companies' => $companies,
			'permissions_array' => $permissions_array,
			'gallery_types' => $gallery_types,
			'places' => $places,
			'shipping_status' => $shipping_status,
		]);
	}

	public function getOrdersPerfil() {

		$user = Auth::user();
		$company_id = $user->company_id;

		$t = [];
		$orders = Order::with('customer')
			->orderBy('id', 'DESC')
			->whereCompanyId($company_id)
			->get();

		if (count($orders)) {
			foreach ($orders as $i => $order) {

				$customer = [];

				$total_quantity = 0;

				$order_products = OrderProduct::where('order_id', $order->id)->get();

				foreach ($order_products as $key => $order_product) {
					$total_quantity += $order_product->quantity;
				}

				$customer = array(
					'name' => $order['customer']['first_name'] . " " . $order['customer']['last_name'],
					'cel' => $order['customer']['cel_whatsapp'],
				);

				$t[] = array(
					'id' => $order->id,
					'date' => $order->created_at->format('d-m-Y'),
					'code' => $order->code,
					'status' => $order->status,
					'quantity' => $total_quantity,
					'total' => $order->total,
					'customer' => $customer,
				);
			}
		}

		$companies = Company::select(['id', 'name_company'])
			->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$shipping_status = ShippingStatus::all();

		return view('admin.routers.orders_perfil', [
			'orders' => $t,
			'companies' => $companies,
			'permissions_array' => $permissions_array,
			'gallery_types' => $gallery_types,
			'places' => $places,
			'shipping_status' => $shipping_status,
		]);
	}
}
