<?php

namespace App\Http\Controllers\Template_3;

use App\Company;
use App\Subscription;
use App\Mail\SubscriptionTemplate1Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionTemplate3Request;
use Mail;

class SubscriptionController extends Controller {

    public function show_view()
    {
        return view('template_3.suscription.index');
    }

	public function store(SubscriptionTemplate3Request $request) {
		$email = $request->email;

		$existSubscription = Subscription::where('email', $email)->first();

		if (count($existSubscription)) {
			return response()->json(['success' => false, 'title' => 'Gracias', 'message' => 'Este email ya está registrado.'], 200);
		}

		$subscription = new Subscription();
		$subscription->email = $email;
		$subscription->cellphone = $request->cellphone;
		$subscription->name = $request->name.' '.$request->lastname;
		$subscription->code = "-";
		$subscription->receive_offers = 1;
		$subscription->save();
		$subscription->code = 'Suscrito-' . $subscription->id;
		$subscription->save();

		$t = array(
			'email' => $request->email,
			'name' => $request->name.' '.$request->lastname,
			'cellphone' => $request->cellphone,
		);

		$company = Company::whereMain(1)->first();
		$companyEmail = $company->email;

		Mail::to($companyEmail)->send(new SubscriptionTemplate1Mail($t, $email));

		return response()->json(['success' => true, 'title' => 'Gracias', 'message' => 'Se ha suscrito correctamente, pronto recibirás novedades en tu email.'], 200);
	}
}
