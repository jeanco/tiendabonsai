<?php

namespace App\Http\Controllers\Template_13;

use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionTemplate1Request;
use App\Mail\SubscriptionTemplate1Mail;
use App\Subscription;
use Mail;

class QuotationController extends Controller {

	public function show_view() {

		$categories_ = Category::with(['products' => function ($query) {
			$query->wherePublished(1);
			$query->select(['id', 'name', 'category_id']);
			$query->with('photo');
		}])->wherePublished(1)
			->select(['id', 'name'])
			->whereHas('products', function ($query) {
				$query->wherePublished(1);
			})
			->get();

		return view('template_13.quotation.index', compact('categories_'));
	}

	public function store(SubscriptionTemplate1Request $request) {
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
			'cellphone' => $request->cellphone,
		);

		$company = Company::whereMain(1)->first();
		$companyEmail = $company->email;

		Mail::to($companyEmail)->send(new SubscriptionTemplate1Mail($t, $email));

		return response()->json(['success' => true, 'title' => 'Gracias', 'message' => 'Se ha suscrito correctamente, pronto recibirás novedades en tu email.'], 200);
	}

	public function complete() {
		return view('template_13.quotation.1_quotation_complete');
	}
}
