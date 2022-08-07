<?php

namespace App\Http\Controllers\Template_2;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactTemplate1Request;
use App\Mail\ContactCompanyTemplate1Mail;
use App\Place;
use App\Staff;
use Auth;
use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller {

    public function show_view(Request $request)
    {	
		$places = Place::all();
		$place_selected = session('place_id', $places[0]->id);

		$staff = Staff::wherePlaceId($place_selected)
			->get();

        return view('template_2.contact.index', compact('staff'));
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
