<?php

namespace App\Http\Controllers\Landing;

use App\Company;
use App\Subscription;
use App\Mail\SendMailSubscription;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use Mail;

class SubscriptionController extends Controller {
	public function store(SubscriptionRequest $request) {
		$email = $request->email;

		$existSubscription = Subscription::where('email', $email)->first();

		if (count($existSubscription)) {
			return response()->json(['success' => false, 'title' => 'Gracias', 'message' => 'Este email ya está registrado.'], 200);
		}

		$subscription = new Subscription();
		$subscription->email = $email;
		$subscription->cellphone = $request->cellphone;
		$subscription->name = $request->name;
		$subscription->code = "-";
		$subscription->receive_offers = 1;
		$subscription->save();
		$subscription->code = 'Suscrito-' . $subscription->id;
		$subscription->save();

		$t = array(
			'email' => $request->email,
			'name' => $request->name,
			// 'cellphone' => $request->cell,
		);

		$company = Company::whereMain(1)->first();
		$companyEmail = $company->email;

		Mail::to($companyEmail)->send(new SendMailSubscription($t, $email));

		return response()->json(['success' => true, 'title' => 'Gracias', 'message' => 'Se ha suscrito correctamente, pronto recibirás novedades en tu email.'], 200);
	}

}
