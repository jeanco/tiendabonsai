<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\User;

use App\Country;
use App\Customer;
use App\Http\Requests\RegisterUserOyeepeRequest;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function register(RegisterUserRequest $request) {

		$data = $request->all();

		// $birthday_without_format = $request->birthday;
		// return $birthday_without_format;
		// $birthday_formatted = Carbon::createFromFormat('d/m/Y', $birthday_without_format)->format('Y-m-d');
		// $data['birthday'] = $birthday_formatted;
		$data['username'] = $data['cel'];
		$data['company_id'] = 0;
		$data['password'] = bcrypt($data['password']);
		$data['activated'] = 0;
		$data['user_type'] = 1;
		$data['country_id'] = 0;
		$data['city_id'] = 0;
		$data['birthday'] = ($request->birthday != '') ? $request->birthday : null;
		$data['company_id'] = 1;

		$new_user = new User();
		$new_user->fill($data);
		$new_user->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha registrado el usuario'], 200);

	}

	public function show_view(Request $request) {
		$path = $this->get_current_company_path();
		return view("{$path}.users.register.index");
	}

	public function show_my_profile_view($user_id) {
		// $user = User::with('customer')->find($user_id);
		$customer = Customer::where('user_id', $user_id)
			->with('user')
			->first();
		$countries = Country::all();

		$orders = Order::whereCustomerId($customer->id)
			->with('products')
			->whereOrderType(1)
			->get();

		$user_orders = [];

		foreach ($orders as $key => $order) {

			$total = 0;
			$quantity = 0;

			foreach ($order->products as $k => $product) {
				$total += $product->pivot->price;
				$quantity += $product->pivot->quantity;
			}

			$user_orders[] = array(
				'code' => $order->code,
				'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
				'description' => $order->description,
				'quantity' => $quantity,
				'total' => $total,
				'id' => $order->id,
			);
		}

		$orders_by_cupon = Order::whereCustomerId($customer->id)
			->with(['products' => function ($query) {
				$query->with('image');
			}])
			->whereOrderType(2)
			->get();

		$user_cupons = [];

		foreach ($orders_by_cupon as $key => $order) {

			$user_cupons[] = array(
				'id' => $order->id,
				'code' => $order->code,
				'image' => $order->products[0]->photo->resource,
				'item' => $order->products[0]->name,
				'price' => $order->products[0]->price,
				'promotion_available' => $order->products[0]->promotion_available,
				'price_promotional' => $order->products[0]->price_promotional,
				// 'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
				// 'description' => $order->description,
				// 'quantity' => $quantity,
				// 'total' => $total,
			);
		}

		return view('website.users.perfil.index', compact('customer', 'countries', 'user_orders', 'user_cupons'));
	}

	public function update_my_profile($id, Request $request) {
		$identity_document = $request->ruc;

		$customer = Customer::whereUserId($id)->first();

		$entity = Customer::whereIdentityDocument($identity_document)
			->where('id', '!=', $customer->id)
			->get();

		if (count($entity)) {
			return response()->json(['title' => 'Error', 'message' => 'Ya existe una entidad con el mismo DNI.'], 400);
		}

		$other_user = User::whereUsername($request->username)
			->where('id', '!=', $id)
			->get();

		if (count($other_user)) {
			return response()->json(['title' => 'Error', 'message' => 'Ya existe una entidad con el mismo USERNAME.'], 400);
		}

		$data = $request->all();
		$data['identity_document'] = $identity_document;
		$data['country_id'] = ($data['country_id'] == '') ? 0 : $data['country_id'];
		$data['city_id'] = ($data['city_id'] == '') ? 0 : $data['city_id'];
		$data['birthday'] = ($data['birthday'] == '') ? null : $data['birthday'];

		$customer->fill($data);
		$customer->save();

		$user = User::find($id);
		$user->fill($data);

		if ($data['password'] != '') {
			$user->password = bcrypt($data['password']);
		}

		$user->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado la entidad'], 200);

	}

}
