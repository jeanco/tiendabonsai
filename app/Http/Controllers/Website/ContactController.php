<?php

namespace App\Http\Controllers\Website;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactCompany;
use Mail;

class ContactController extends Controller {
	
	public function show_view() {
		$path = $this->get_current_company_path();
		return view("{$path}.contact.index");
	}

	public function send(ContactRequest $request) {

		$data_to_send = array(
			'name' => $request->name,
			'email' => $request->email,
			'cellphone' => $request->cellphone,
			'subject' => $request->subject,
			'msg' => $request->msg,
		);

		$company = Company::whereMain(true)->first();

		Mail::to($company->email)
			->send(new ContactCompany($data_to_send, $data_to_send['email']));

		return response()->json(['title' => 'Se ha enviado el mensaje']);
	}
}
