<?php

namespace App\Http\Controllers\Template_1;

use App\AlternativeDirection;
use App\Company;
use App\Country;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileUpdateRequestTemplate11;
use App\Http\Requests\RegisterUserTemplate3Request;
use App\Mail\UserRegisteredCompany;
use App\Mail\UserRegisteredCompanyTemplate11;
use App\Mail\UserRegisteredMail;
use App\Mail\UserRegisteredMailTemplate11;
use App\Order;
use App\Services\GetNameStatusOrderService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use Mail;

class UserController extends Controller {

	public function register(RegisterUserTemplate3Request $request) {

		$data = $request->all();

		$new_customer = new Customer();

		if ($request->document_type == 2) {
			$data['first_name'] = $data['business_name'];
			$data['address'] = $data['business_address'];
			$data['identity_document'] = $data['business_identity_document'];
			$data['cel_whatsapp'] = $data['business_cel_whatsapp'];
		}

		$new_customer->fill($data);
		$new_customer->save();

		$user = new User();
		$user->username = $data['email'];
		$user->password = bcrypt($data['password']);
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email'];
		$user->activated = 1;
		$user->cel = $data['cel_whatsapp'];
		//$user->address = $request->address;
		$user->user_type = 3;
		$user->company_id = 0;
		//$user->gender = $request->gender;
		//$user->cel_holder = $request->cel_holder;
		$user->country_id = 0;
		$user->city_id = 0;
		//$user->birthday = ($request->birthday != '') ? $request->birthday : null;
		$user->customer_id = $new_customer->id;
		$user->save();

		$company = Company::first();

		$data['logotype'] = $company->logotype;
		$data['date_formatted'] = Date::parse($user->created_at)->format('d \d\e\ F \d\e\l\ Y');
		
		$send_company = array(
			'logotype' => $company->logotype,
			'date_formatted' => Date::parse($user->created_at)->format('d \d\e\ F \d\e\l\ Y'),

		);

		$send = array(
			'logotype' => $company->logotype,
			'first_name' => $new_customer->first_name,
			'last_name' => $new_customer->last_name,
			'username' => $user->username,
			'password' => $data['password'],
			'date_formatted' => Date::parse($user->created_at)->format('d \d\e\ F \d\e\l\ Y'),
			'link' => url('/') . '/acceder',
			'dominio' => $_SERVER['SERVER_NAME'],
		);

		Mail::to($company->email)->send(new UserRegisteredCompanyTemplate11($data, $data['email']));
		Mail::to($data['email'])->send(new UserRegisteredMailTemplate11($send, $company->email));

		return response()->json(['title' => '¡Bienvenido!', 'message' => 'Se le ha enviado un mensaje a su correo con sus credenciales de acceso.'], 200);

	}

	public function show_view(Request $request) {
		return view("template_1.users.register.index");
	}

	public function show_my_profile_view() {

		$user_id = Auth::user()->id;

		$user = User::find($user_id);

		$customer = Customer::with('user')
			->with('alternative_direction')
			->find($user->customer_id);

		$countries = Country::all();

		$orders = Order::whereCustomerId($customer->id)
			->with('products')
			->whereOrderType(1)
			->orderBy('id', 'DESC')
			->get();

		$user_orders = [];

		$getter_status_name = new GetNameStatusOrderService();

		foreach ($orders as $key => $order) {

			$total = 0;
			$quantity = 0;

			foreach ($order->products as $k => $product) {
				$total += $product->pivot->price;
				$quantity += $product->pivot->quantity;
			}

			$user_orders[] = array(
				'uuid' => $order->uuid,
				'code' => $order->code,
				'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
				'description' => $order->description,
				'quantity' => $quantity,
				'status_text' => $getter_status_name->execute($order->status),
				'total' => number_format($total, 2, '.', ''),
				'id' => $order->id,
			);
		}


		// $orders = Order::whereCustomerId($customer->id)
		// 	->with('products')
		// 	->whereOrderType(1)
		// 	->orderBy('id', 'DESC')
		// 	->get();

		// $user_orders = [];

		// foreach ($orders as $key => $order) {

		// 	$total = 0;
		// 	$quantity = 0;

		// 	foreach ($order->products as $k => $product) {
		// 		$total += $product->pivot->price;
		// 		$quantity += $product->pivot->quantity;
		// 	}

		// 	$user_orders[] = array(
		// 		'uuid' => $order->uuid,
		// 		'code' => $order->code,
		// 		'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
		// 		'description' => $order->description,
		// 		'quantity' => $quantity,
		// 		'total' => $total,
		// 		'id' => $order->id,
		// 	);
		// }

		$orders_by_cupon = Order::whereCustomerId($customer->id)
			->with(['products' => function ($query) {
				$query->with('image');
			}])
			->whereOrderType(2)
			->get();

		$user_cupons = [];

		// foreach ($orders_by_cupon as $key => $order) {

		// 	$user_cupons[] = array(
		// 		'id' => $order->id,
		// 		'code' => $order->code,
		// 		'image' => $order->products[0]->photo->resource,
		// 		'item' => $order->products[0]->name,
		// 		'price' => $order->products[0]->price,
		// 		'promotion_available' => $order->products[0]->promotion_available,
		// 		'price_promotional' => $order->products[0]->price_promotional,
		// 		// 'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
		// 		// 'description' => $order->description,
		// 		// 'quantity' => $quantity,
		// 		// 'total' => $total,
		// 	);
		// }
		return view('template_1.users.perfil.index', compact('customer', 'countries', 'user_orders', 'user_cupons', 'user_id'));
	}

	public function update_my_profile($customer_id, ProfileUpdateRequestTemplate11 $request) {

		//return $request->all();
		// $identity_document = $request->ruc;

		$customer = Customer::with(['alternative_direction' => function ($query) {
			$query->orderBy('id', 'DESC');
		}])->find($customer_id);

		$customer->identity_document = $request->identity_document;
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->cel_whatsapp = $request->cel_whatsapp;
		$customer->email = $request->email;
		$customer->birthday = $request->birthday;
		//$customer->address = $request->address;

		$customer->save();

		if (count($customer->alternative_direction)) {
			$customer->alternative_direction->country_id = $request->country_id;
			$customer->alternative_direction->city_id = $request->city_id;
			$customer->alternative_direction->province_id = $request->province_id;
			$customer->alternative_direction->district_id = $request->district_id;

			$customer->alternative_direction->address = $request->address_envio;
			// $customer->alternative_direction->identity_document = $request->identity_document_envio;
			// $customer->alternative_direction->first_name = $request->first_name_envio;
			// $customer->alternative_direction->last_name = $request->last_name_envio;
			// $customer->alternative_direction->cel = $request->cel_envio;
			$customer->alternative_direction->save();
		} else {
			$new_alternative_direction = new AlternativeDirection();
			$new_alternative_direction->country_id = $request->country_id;
			$new_alternative_direction->city_id = $request->city_id;
			$new_alternative_direction->province_id = $request->province_id;
			$new_alternative_direction->district_id = $request->district_id;

			$new_alternative_direction->address = $request->address_envio;
			//$new_alternative_direction->identity_document = $request->identity_document_envio;
			// $new_alternative_direction->first_name = $request->first_name_envio;
			// $new_alternative_direction->last_name = $request->last_name_envio;
			// $new_alternative_direction->cel = $request->cel_envio;
			$new_alternative_direction->customer_id = $customer->id;
			$new_alternative_direction->save();
		}

		//$customer->alternative_direction->address = $request->address;
		$user = User::find($request->user_id);
		$user->username = $request->username;

		if ($request->password) {
			$user->password = bcrypt($request->password);
		}

		$user->save();

		// $customer = Customer::whereUserId($id)->first();

		// $entity = Customer::whereIdentityDocument($identity_document)
		// 	->where('id', '!=', $customer->id)
		// 	->get();

		// if (count($entity)) {
		// 	return response()->json(['title' => 'Error', 'message' => 'Ya existe una entidad con el mismo DNI.'], 400);
		// }

		// $other_user = User::whereUsername($request->username)
		// 	->where('id', '!=', $id)
		// 	->get();

		// if (count($other_user)) {
		// 	return response()->json(['title' => 'Error', 'message' => 'Ya existe una entidad con el mismo USERNAME.'], 400);
		// }

		// $data = $request->all();
		// $data['identity_document'] = $identity_document;
		// $data['country_id'] = ($data['country_id'] == '') ? 0 : $data['country_id'];
		// $data['city_id'] = ($data['city_id'] == '') ? 0 : $data['city_id'];
		// $data['birthday'] = ($data['birthday'] == '') ? null : $data['birthday'];

		// $customer->fill($data);
		// $customer->save();

		// $user = User::find($id);
		// $user->fill($data);

		// if ($data['password'] != '') {
		// 	$user->password = bcrypt($data['password']);
		// }

		// $user->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado la entidad'], 200);

	}

}
