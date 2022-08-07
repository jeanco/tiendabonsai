<?php

namespace App\Http\Controllers\Landing;

use App\Company;
use App\Http\Controllers\Controller;
use App\Mail\SendClaimToTheCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClaimController extends Controller {

	public function sendToTheCompany(Request $request) {
		$t = [];

		$t['person']['name'] = $request->person['fullname'];
		//$t['person']['legal_name'] = $request->person['legalName'];
		$t['person']['phone'] = $request->person['phone'];
		$t['person']['other_phone'] = $request->person['otherPhone'];
		$t['person']['address'] = $request->person['address'];
		$t['person']['reference'] = $request->person['reference'];
		$t['person']['district'] = $request->person['district'];
		$t['person']['province'] = $request->person['province'];
		$t['person']['region'] = $request->person['region'];
		$t['person']['type_document'] = $request->person['documentType'];
		$t['person']['document'] = $request->person['identityDocument'];
		$t['person']['email'] = $request->person['email'];

		$t['amount'] = $request->amount;
		$item_contracted_text = '';
		if ($request->itemOptionId == 1) {
			$item_contracted_text = 'Producto';
		}
		if ($request->itemOptionId == 2) {
			$item_contracted_text = 'Servicio';
		}

		$t['item_contracted'] = $item_contracted_text;
		$t['item_description'] = $request->descriptionItem;
		$t['payment_voucher'] = $request->paymentVoucher;

		$claim_option_text = '';
		if ($request->claimOptionId == 1) {
			$claim_option_text = 'Reclamo';
		}
		if ($request->claimOptionId == 2) {
			$claim_option_text = 'Queja';
		}
		if ($request->claimOptionId == 3) {
			$claim_option_text = 'Consulta';
		}

		$t['claim_option'] = $claim_option_text;

		$t['details'] = $request->details;
		$t['order'] = $request->order;
		$t['about_provider'] = $request->aboutProvider;
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
		return;
	}
}
