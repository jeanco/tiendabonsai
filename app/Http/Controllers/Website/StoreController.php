<?php

namespace App\Http\Controllers\Website;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Carbon\Carbon;

class StoreController extends Controller {

	public function show($id) {
		$company = Company::find($id);

		$company->membership_date_formatted = Carbon::parse($company->membership_date)->format('d/m/Y');

		return $company;
	}

	public function store(StoreRequest $request) {
		$data = $request->all();
		$membership_date_without_format = $request->membership_date_without_format;

		$membership_date_formatted = Carbon::createFromFormat('d/m/Y', $membership_date_without_format)->format('Y-m-d');

		$data['membership_date'] = $membership_date_formatted;
		$data['title_slogan'] = "";
		$data['subtitle_slogan'] = "";
		$data['subtitle_slogan'] = "";
		$data['work_description_company'] = "";
		$data['terms_and_conditions'] = "";

		$company = new Company();
		$company->fill($data);
		$company->slug_company = str_slug($request->name_company, "-");

		// if ($request->hasFile('company_logo')) {
		// 	$img = $request->file('company_logo');
		// 	$functionUpload = new ImageUploader();
		// 	$functionUpload->upload('/company', $img, 'png', 500);
		// 	$functionUpload->delete($company->logotype_path, $company->logotype);

		// 	$company->logotype = $functionUpload->getDropboxUrl();
		// 	$company->logotype_path = $functionUpload->getDropboxPath();

		// 	$functionUpload->upload('/company', $img, 'png', 300);
		// 	$functionUpload->delete($company->logotype_thumb_path, $company->logotype_thumb);

		// 	$company->logotype_thumb = $functionUpload->getDropboxUrl();
		// 	$company->logotype_thumb_path = $functionUpload->getDropboxPath();
		// }

		// if ($request->hasFile('company_logo_white')) {
		// 	$img = $request->file('company_logo_white');

		// 	$functionUpload = new ImageUploader();
		// 	$functionUpload->upload('/company', $img, 'png', 500);
		// 	$functionUpload->delete($company->logotype_white_path, $company->logotype_white);

		// 	$company->logotype_white = $functionUpload->getDropboxUrl();
		// 	$company->logotype_white_path = $functionUpload->getDropboxPath();

		// 	$functionUpload->upload('/company', $img, 'png', 300);
		// 	$functionUpload->delete($company->logotype_white_thumb_path, $company->logotype_white_thumb);

		// 	$company->logotype_white_thumb = $functionUpload->getDropboxUrl();
		// 	$company->logotype_white_thumb_path = $functionUpload->getDropboxPath();
		// }

		$company->save();
		return response()->json(['success' => true], 200);
	}

	public function update($company_id, StoreRequest $request) {
		$data = $request->all();

		$membership_date_without_format = $request->membership_date_without_format;

		$membership_date_formatted = Carbon::createFromFormat('d/m/Y', $membership_date_without_format)->format('Y-m-d');

		$data['membership_date'] = $membership_date_formatted;

		$company = Company::find($company_id);
		$company->fill($data);
		$company->slug_company = str_slug($request->name_company, "-");
		$company->save();
	}
}
