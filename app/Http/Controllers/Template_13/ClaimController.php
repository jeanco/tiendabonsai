<?php

namespace App\Http\Controllers\Template_13;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClaimSaveRequest;
use App\Mail\SendClaimToTheCompany;
use Illuminate\Support\Facades\Mail;

class ClaimController extends Controller {

	public function sendToTheCompany(ClaimSaveRequest $request) {
		$t = [];

		$t['person']['name'] = $request->full_name;
		//$t['person']['legal_name'] = $request->person['legalName'];
		$t['person']['phone'] = $request->phone;
		$t['person']['other_phone'] = $request->other_phone;
		$t['person']['address'] = $request->address;
		$t['person']['reference'] = $request->reference;
		$t['person']['district'] = $request->district;
		$t['person']['province'] = $request->province;
		$t['person']['region'] = $request->region;
		$t['person']['type_document'] = $request->document_type;
		$t['person']['document'] = $request->identity_document;
		$t['person']['email'] = $request->email;

		$t['amount'] = $request->amount;
		$item_contracted_text = '';
		if ($request->item_option_id == 1) {
			$item_contracted_text = 'Producto';
		}
		if ($request->item_option_id == 2) {
			$item_contracted_text = 'Servicio';
		}

		$t['item_contracted'] = $item_contracted_text;
		$t['item_description'] = $request->description_item;
		$t['payment_voucher'] = $request->payment_voucher;

		$claim_option_text = '';
		if ($request->claim_option_id == 1) {
			$claim_option_text = 'Reclamo';
		}
		if ($request->claim_option_id == 2) {
			$claim_option_text = 'Queja';
		}
		if ($request->claim_option_id == 3) {
			$claim_option_text = 'Consulta';
		}

		$t['claim_option'] = $claim_option_text;

		$t['details'] = $request->details;
		$t['order'] = $request->order;
		$t['about_provider'] = $request->about_provider;
		/*
			        $t['document_image'] = '';

			        if ($request->document['extension'] != '') {
			            $img = $request->document['base64'];
			            $ext = $request->document['extension'];

			            $functionUpload = new ImageUploader();
			            $functionUpload->upload('/claims/images',$img, $ext,900);

			            $t['document_image'] = $functionUpload->getDropboxUrl();
			        }

			        $response_channel_text = '';

			        if ($request->responseChanelId == 1) {
			            $response_channel_text = 'Personal';
			        }
			        if ($request->responseChanelId == 2) {
			            $response_channel_text = 'Email';
			        }
			        if ($request->responseChanelId == 3) {
			            $response_channel_text = 'Carta';
			        }
			        if ($request->responseChanelId == 4) {
			            $response_channel_text = 'Teléfono';
			        }
			        $t['response_channel'] = $response_channel_text;
		*/

		//Enviar el email
		$company = Company::first();
		$companyEmail = $company->email;

		$t['company']['name'] = $company->name_company;
		$t['company']['logotype'] = $company->logotype_thumb;

		Mail::to($companyEmail)->send(new SendClaimToTheCompany($t, $t['person']['email']));

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha registrado la solicitud'], 200);
	}
}
