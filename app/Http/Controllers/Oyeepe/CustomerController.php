<?php

namespace App\Http\Controllers\Oyeepe;

use App\User;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCustomerRequest;

class CustomerController extends Controller {

    public function register(RegisterCustomerRequest $request){

		$data = $request->all();

		$customer_stored = Customer::where('identity_document', $data['identity_document'])
			->first();

		if (count($customer_stored)) {
            $customer_stored->fill($data);
            // $customer_stored->user_id = 0;
			$customer_stored->save();

			$customer_id = $customer_stored->id;
			$customer_email = $customer_stored->email;
			$customer_name = "{$customer_stored->first_name} {$customer_stored->last_name}";
			$customer = $customer_stored;
		} else {
            $customer = new Customer;
            $customer->user_id = 0;
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

        return $customer->identity_document;

    }

}
