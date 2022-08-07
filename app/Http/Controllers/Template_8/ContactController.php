<?php

namespace App\Http\Controllers\Template_8;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactTemplate8Request;
use App\Mail\ContactCompanyTemplate8Mail;
use App\Staff;
use Mail;

class ContactController extends Controller {

	public function show_view() {

		$staff = Staff::whereType(2)
			->get();

		$staff_sliders = ceil(count($staff) / 2);

		return view('template_8.contact.index', compact('staff', 'staff_sliders'));
	}

	public function send(ContactTemplate8Request $request) {
		$data_to_send = array(
			'name' => $request->name,
			'email' => $request->email,
			'cellphone' => $request->cellphone,
			'subject' => $request->subject,
			'msg' => $request->msg,
		);

		$company = Company::whereMain(true)->first();

		Mail::to($company->email)
			->send(new ContactCompanyTemplate8Mail($data_to_send, $data_to_send['email']));

		return response()->json(['title' => 'Se ha enviado el mensaje']);
	}

}
