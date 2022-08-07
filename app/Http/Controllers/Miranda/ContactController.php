<?php

namespace App\Http\Controllers\Miranda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller {

	public function show_view() {
		return view('miranda.contact.index');
	}

	public function send_email(Request $request) {
		return $request->all();

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

		return response()->json(['title' => 'Ok']);

	}
}
