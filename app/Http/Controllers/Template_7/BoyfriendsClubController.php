<?php

namespace App\Http\Controllers\Template_7;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoyFriendsClubRequest;
use App\Mail\BoyFriendsClubMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BoyFriendsClubController extends Controller {
	public function postRegisterFromWeb(BoyFriendsClubRequest $request) {

		$raw_boyfriend_data = json_decode($request->boyfriend, true);
		$raw_girlfriend_data = json_decode($request->girlfriend, true);

		$boyfriend = array(
			'full_name' => $raw_boyfriend_data['full_name'],
			'identity_document' => $raw_boyfriend_data['identity_document'],
			'cellphone' => $raw_boyfriend_data['cellphone'],
			'email' => $raw_boyfriend_data['email'],
			'birthday' => Carbon::createFromFormat('Y-m-d', $raw_boyfriend_data['birthday'])->format('d-m-Y'),
			'address' => $raw_boyfriend_data['address'],
		);

		$girlfriend = array(
			'full_name' => $raw_girlfriend_data['full_name'],
			'identity_document' => $raw_girlfriend_data['identity_document'],
			'cellphone' => $raw_girlfriend_data['cellphone'],
			'email' => $raw_girlfriend_data['email'],
			'birthday' => Carbon::createFromFormat('Y-m-d', $raw_girlfriend_data['birthday'])->format('d-m-Y'),
			'address' => $raw_girlfriend_data['address'],
		);

		/*
			                $company = Company::first();
			                $company_email = $company->email;
		*/
		$company_email = Company::first()->email;
		//$company_email = 'karla.sarmiento@kamasa.pe';

		$email_data = array(
			'boyfriend' => $boyfriend,
			'girlfriend' => $girlfriend,
			'address' => $request->wedding_address,
			'hour' => $request->wedding_hour,
			'date' => Carbon::createFromFormat('Y-m-d', $request->wedding_date)->format('d-m-Y'),
			'company_email' => $company_email,
		);

		Mail::to($company_email)->send(new BoyFriendsClubMail($email_data));

		return response()->json(['success' => true, 'title' => 'Bienvenid@s', 'message' => 'Ya se encuentran registrados en el Club de Novios, nos pondremos en contato. Gracias.'], 201);
	}

}
