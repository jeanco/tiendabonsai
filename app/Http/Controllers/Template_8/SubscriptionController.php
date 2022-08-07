<?php

namespace App\Http\Controllers\Template_8;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionTemplate8Request;
use App\Mail\SubscriptionTemplate8Mail;
use App\Subscription;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller {

	public function store(SubscriptionTemplate8Request $request) {
		$email = $request->email;

		$existSubscription = Subscription::where('email', $email)->first();

		if (count($existSubscription)) {
			return response()->json(['success' => false, 'title' => 'Gracias', 'message' => 'Este email ya está registrado.'], 200);
		}

		$subscription = new Subscription();
		$subscription->email = $email;
		$subscription->cellphone = "-";
		$subscription->name = $request->name;
		$subscription->code = "-";
		$subscription->receive_offers = 1;
		$subscription->save();
		$subscription->code = 'Suscrito-' . $subscription->id;
		$subscription->save();

		$t = array(
			'email' => $request->email,
			'name' => $request->name,
		);

		$company = Company::whereMain(1)->first();
		$companyEmail = $company->email;

		Mail::to($companyEmail)->send(new SubscriptionTemplate8Mail($t, $email));

		return response()->json(['success' => true, 'title' => 'Gracias', 'message' => 'Se ha suscrito correctamente, pronto recibirás novedades en tu email.'], 200);
	}
}
