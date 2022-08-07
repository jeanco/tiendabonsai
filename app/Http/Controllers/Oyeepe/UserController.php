<?php

namespace App\Http\Controllers\Oyeepe;

use App\Country;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserOyeepeRequest;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function show_view(Request $request) {
		$path = $this->get_current_company_path();
		return view("{$path}.users.register.index");
	}

	public function register(RegisterUserOyeepeRequest $request) {
		$data = $request->all();
		$identity_document = $data['ruc'];

		$exist_customer = Customer::whereIdentityDocument($identity_document)
			->first();

		if (count($exist_customer)) {
			if ($exist_customer->user_id != 0) {
				return response()->json(['title' => 'Error', 'message' => 'Ya existe un usuario', 'one_error' => true], 400);
			}

			$new_user = new User();
			$new_user->username = $data['ruc'];
			$new_user->first_name = '';
			$new_user->last_name = '';
			$new_user->email = '';
			$new_user->cel = '';
			$new_user->activated = 1;
			$new_user->user_type = 4;
			$new_user->company_id = 0;
			$new_user->country_id = 0;
			$new_user->city_id = 0;
			$new_user->password = bcrypt($data['password']);

			$new_user->save();

			$exist_customer->identity_document = $data['ruc'];
			$exist_customer->first_name = $data['first_name'];
			$exist_customer->last_name = $data['last_name'];
			$exist_customer->email = $data['email'];
			$exist_customer->cel_whatsapp = $data['cel'];
			$exist_customer->user_id = $new_user->id;
			$exist_customer->save();

		} else {
			$new_user = new User();
			$new_user->username = $data['ruc'];
			$new_user->first_name = '';
			$new_user->last_name = '';
			$new_user->email = '';
			$new_user->cel = '';
			$new_user->activated = 1;
			$new_user->user_type = 4;
			$new_user->company_id = 0;
			$new_user->country_id = 0;
			$new_user->city_id = 0;
			$new_user->password = bcrypt($data['password']);

			$new_user->save();

			$new_customer = new Customer();
			$new_customer->identity_document = $data['ruc'];
			$new_customer->first_name = $data['first_name'];
			$new_customer->last_name = $data['last_name'];
			$new_customer->email = $data['email'];
			$new_customer->cel_whatsapp = $data['cel'];
			$new_customer->user_id = $new_user->id;
			$new_customer->city_id = 0;
			$new_customer->country_id = 0;
			$new_customer->save();
		}
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado los registros con éxito!'], 201);
	}

	public function show_my_profile_view($user_id) {
		$customer = Customer::where('user_id', $user_id)
			->with('user')
			->first();

		$countries = Country::all();

		//Update coupons lifetime
		if (!count($customer)) {
			return response()->json(['title' => 'Error', 'message' => 'No existe un cliente para el usuario logeado'], 401);
		}

		$this->update_my_coupons($customer->id);

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
			->where('status', '!=', 3)
			->whereOrderType(2)
			->get();

		$user_cupons = [];

		$now = Carbon::now();

		foreach ($orders_by_cupon as $key => $order) {

			// $total_cupon = 0;
			// // $quantity_cupon = 0;

			// foreach ($order->products as $k => $product) {
			// 	$total_cupon += $product->pivot->price;
			// 	$quantity_cupon += $product->pivot->quantity;
			// }
			$days_remaining = 0;
			$text_of_time_remaining = '';
			if ($order->status == 1) {
				$days_remaining = 7 - $now->diffInDays($order->created_at);

				$text_of_time_remaining = "Quedan {$days_remaining} días";

				if ($days_remaining == 0) {
					$hours_remaining = $now->diffInHours($order->created_at->addDays(7));
					$text_of_time_remaining = "Quedan {$hours_remaining} horas para usarse";
				}
			}

			$user_cupons[] = array(
				'id' => $order->id,
				'code' => $order->code,
				'image' => ($order->products[0]->photo != null) ? $order->products[0]->photo->resource : '',
				'item' => $order->products[0]->name,
				'price' => $order->products[0]->price,
				'promotion_available' => $order->products[0]->promotion_available,
				'price_promotional' => $order->products[0]->price_promotional,
				'status' => $order->status,
				'days_remaining' => $text_of_time_remaining,
				// 'date' => Carbon::parse($order->created_at)->format('d-m-Y'),
				// 'description' => $order->description,
				// 'quantity' => $quantity,
				// 'total' => $total,
			);
		}

		return view('oyeepe.users.perfil.index', compact('customer', 'countries', 'user_orders', 'user_cupons'));
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

	public function update_my_coupons($customer_id) {

		// $user_id = Auth::user()->id;

		// $customer = Customer::whereUserId($user_id)->first();

		$now = Carbon::now();

		$orders = Order::whereStatus(1)
			->whereOrderType(2)
			->whereCustomerId($customer_id)
			->get();

		foreach ($orders as $key => $order) {

			$initial_date = Carbon::parse($order->created_at);
			if ($now->diffInDays($initial_date) > 7) {
				$order->status = 3;
				$order->save();
			}
		}

		return "ok";

	}

}
