<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Uploaders\PdfUploader;
use Auth;
use Carbon\Carbon;
use Datatables;
use Excel;
use Illuminate\Http\Request;

class CustomersController extends Controller {
	public function getCustomerByEmail(Request $request) {
		$customer = Customer::select(['first_name as firstName',
			'last_name as lastName',
			'legal_name as legalName',
			'ruc',
			'facebook',
			'cel_whatsapp as cel',
			'city',
			'country',
			'ruc',
			'customer_type as customerType',
			'legal_name as legalName',
		])->where('email', $request->email)->get();
		if (count($customer) > 0) {
			return response()->json(['data' => $customer[0]], 200);
		} else {
			$customer = false;
			return response()->json(['data' => $customer], 200);
		}
	}

	public function getCustomers() {
		$customers = Customer::all();
		return response()->json(['customers' => $customers], 200);
	}

	public function get_info_to_the_datatable() {

		$company_id = Auth::user()->company_id;

		$company = Company::find($company_id);

		$result = (new Customer)->newQuery();

		if ($company->main != 1) {
			$result = $result->join('company_customer', 'customers.id', '=', 'company_customer.customer_id')
				->where('company_customer.company_id', $company_id);
		}

		// $result = $result->whereHas('user', function ($query) use ($company_id) {
		// 	$query->whereCompanyId($company_id);
		// });

		$result = $result
			->select(['customers.created_at', 'customers.id', 'customers.identity_document', 'customers.first_name', 'customers.last_name', 'customers.birthday', 'customers.email', 'customers.cel_whatsapp']);

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {

				return "";

			})->make(true);
	}

	public function deleteCustomer($id) {
		$customer = Customer::with('orders')->find($id);
		if (count($customer->orders)) {
			return response()->json(['message' => 'Este cliente tiene ordenes.'], 400);
		}
		$customer->delete();
		return;
	}

	public function getCustomer($id) {
		$customer = Customer::find($id);
		$customer->birthday = ($customer->birthday) ? Carbon::parse($customer->birthday)->format('d/m/Y') : '';
		return $customer;
	}

	public function saveCustomer(CustomerRequest $request) {

		$user = Auth::user();

		$data = $request->all();

		if ($data['birthday'] != '') {
			$birthday_without_format = Carbon::createFromFormat('d/m/Y', $data['birthday']);
			$birthday_with_new_format = $birthday_without_format->format('Y/m/d');
			$data['birthday'] = $birthday_with_new_format;
		} else {
			unset($data['birthday']);
		}

		$customer = new Customer();
		$customer->fill($data);
		$customer->company_id = $user->company_id;
		$customer->user_id = $user->id;
		$customer->save();

		if ($request->hasFile('certificate_one')) {

			$pdf = $request->certificate_one;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_one = $functionUpload->getDropboxUrl();
			$customer->certificate_one_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_two')) {

			$pdf = $request->certificate_two;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_two = $functionUpload->getDropboxUrl();
			$customer->certificate_two_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_three')) {

			$pdf = $request->certificate_three;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_three = $functionUpload->getDropboxUrl();
			$customer->certificate_three_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_four')) {

			$pdf = $request->certificate_four;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_four = $functionUpload->getDropboxUrl();
			$customer->certificate_four_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_five')) {

			$pdf = $request->certificate_five;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_five = $functionUpload->getDropboxUrl();
			$customer->certificate_five_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_six')) {

			$pdf = $request->certificate_six;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_six = $functionUpload->getDropboxUrl();
			$customer->certificate_six_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_seven')) {

			$pdf = $request->certificate_seven;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_seven = $functionUpload->getDropboxUrl();
			$customer->certificate_seven_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_eight')) {

			$pdf = $request->certificate_eight;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_eight = $functionUpload->getDropboxUrl();
			$customer->certificate_eight_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_nine')) {

			$pdf = $request->certificate_nine;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_nine = $functionUpload->getDropboxUrl();
			$customer->certificate_nine_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_ten')) {

			$pdf = $request->certificate_ten;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);

			$customer->certificate_ten = $functionUpload->getDropboxUrl();
			$customer->certificate_ten_path = $functionUpload->getDropboxPath();
		}


		$customer->save();

		return;
	}

	public function updateCustomer(CustomerUpdateRequest $request) {
		$data = $request->all();
		if ($data['birthday'] != '') {
			$birthday_without_format = Carbon::createFromFormat('d/m/Y', $data['birthday']);
			$birthday_with_new_format = $birthday_without_format->format('Y/m/d');
			$data['birthday'] = $birthday_with_new_format;
		} else {
			unset($data['birthday']);
		}
		$customer = Customer::find($data['customer_id']);
		$customer->fill($data);
		$customer->save();

		if ($request->hasFile('certificate_one')) {

			$pdf = $request->certificate_one;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_one_path, $customer->certificate_one);

			$customer->certificate_one = $functionUpload->getDropboxUrl();
			$customer->certificate_one_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_two')) {

			$pdf = $request->certificate_two;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_two_path, $customer->certificate_two);

			$customer->certificate_two = $functionUpload->getDropboxUrl();
			$customer->certificate_two_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_three')) {

			$pdf = $request->certificate_three;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_three_path, $customer->certificate_three);

			$customer->certificate_three = $functionUpload->getDropboxUrl();
			$customer->certificate_three_path = $functionUpload->getDropboxPath();
		}
		
		if ($request->hasFile('certificate_four')) {

			$pdf = $request->certificate_four;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_four_path, $customer->certificate_four);

			$customer->certificate_four = $functionUpload->getDropboxUrl();
			$customer->certificate_four_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_five')) {

			$pdf = $request->certificate_five;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_five_path, $customer->certificate_five);

			$customer->certificate_five = $functionUpload->getDropboxUrl();
			$customer->certificate_five_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_six')) {

			$pdf = $request->certificate_six;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_six_path, $customer->certificate_six);

			$customer->certificate_six = $functionUpload->getDropboxUrl();
			$customer->certificate_six_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_seven')) {

			$pdf = $request->certificate_seven;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_seven_path, $customer->certificate_seven);

			$customer->certificate_seven = $functionUpload->getDropboxUrl();
			$customer->certificate_seven_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_eight')) {

			$pdf = $request->certificate_eight;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_eight_path, $customer->certificate_eight);

			$customer->certificate_eight = $functionUpload->getDropboxUrl();
			$customer->certificate_eight_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_nine')) {

			$pdf = $request->certificate_nine;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_nine_path, $customer->certificate_nine);

			$customer->certificate_nine = $functionUpload->getDropboxUrl();
			$customer->certificate_nine_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('certificate_ten')) {

			$pdf = $request->certificate_ten;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/customers/certificates', $pdf, $ext);
			$functionUpload->delete($customer->certificate_ten_path, $customer->certificate_ten);

			$customer->certificate_ten = $functionUpload->getDropboxUrl();
			$customer->certificate_ten_path = $functionUpload->getDropboxPath();
		}

		$customer->save();


	}

	public function exportCustomers() {

		$company_id = Auth::user()->company_id;

		$customers = Customer::with('city')
			->with('country')
			->whereHas('user', function ($query) use ($company_id) {
				$query->whereCompanyId($company_id);
			})
			->get();

		$t = [];

		foreach ($customers as $key => $customer) {

			$t[] = array(
				'identity_document' => $customer->identity_document,
				'first_name' => $customer->first_name,
				'last_name' => $customer->last_name,
				'cel' => $customer->cel_whatsapp,
				'facebook' => $customer->facebook,
				'address' => $customer->address,
				'origin' => $customer->city->name . " " . $customer->country->name,
				'email' => $customer->email,
				'birthday' => Carbon::parse($customer->birthday)->format('d/m/Y'),
			);
		}

		$dateNow = Carbon::now()->format('d-m-Y h:i');
		$excelName = 'Reporte de clientes ' . $dateNow;

		Excel::create($excelName, function ($excel) use ($t) {
			$excel->sheet('Data', function ($sheet) use ($t) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray(["Documento", "Nombres", "Apellidos", "Celular", "Facebook", "Dirección", "Ciudad - País", "email", "Fecha de nacimiento"]);

				foreach ($t as $key => $p) {
					$sheet->row($key + 2, $p);
				}
			});
		})->export('xls');

	}

	public function search_customer(Request $request){

		$identity_document = $request->identity_document;

		$customer = Customer::whereIdentityDocument($identity_document)
			->first();

		if (count($customer)) {
			return $customer;
		}
		return [];
	}
}
