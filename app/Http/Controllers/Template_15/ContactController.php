<?php

namespace App\Http\Controllers\Template_15;

use Mail;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactTemplate1Request;
use App\Company;
use App\Mail\ContactCompanyTemplate1Mail;

class ContactController extends Controller {

    public function show_view()
    {
        return view('template_15.contact.index');
    }

    public function send(ContactTemplate1Request $request)
    {
		$data_to_send = array(
			'name' => $request->name,
			'email' => $request->email,
			'cellphone' => $request->cellphone,
			'subject' => $request->subject,
			'msg' => $request->msg,
		);

		$company = Company::whereMain(true)->first();

		Mail::to($company->email)
			->send(new ContactCompanyTemplate1Mail($data_to_send, $data_to_send['email']));

		return response()->json(['title' => 'Se ha enviado el mensaje']);
	}

}
