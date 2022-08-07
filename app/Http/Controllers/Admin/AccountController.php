<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountCreateRequest;
use App\Http\Requests\AccountUpdateRequest;
use Auth;

class AccountController extends Controller {
	public function all() {

		$company_id = Auth::user()->company_id;
		
		$accounts = Account::with('payment_entity')
			->whereCompanyId($company_id)
			->get();
		return $accounts;
	}

	public function show($id) {
		$account = Account::find($id);
		return $account;
	}

	public function store(AccountCreateRequest $request) {

		$user = Auth::user();

		$data = $request->all();
		$account = new Account();
		$account->fill($data);
		$account->currency_id = 1;
		$account->user_id = $user->id;
		$account->company_id = $user->company_id;

		if ($request->currency_id) {
			$account->currency_id = $request->currency_id;
		}

		$account->payment_entity_id = 1;
		if ($request->payment_entity_id) {
			$account->payment_entity_id = $request->payment_entity_id;
		}

		$account->save();
		return;
	}

	public function update($id, AccountUpdateRequest $request) {
		$data = $request->all();
		$account = Account::find($id);
		$account->fill($data);
		$account->save();
		return;
	}

	public function updatePublished($id) {
		$account = Account::find($id);
		$account->published = ($account->published == 1) ? 0 : 1;
		$account->save();
		return;
	}

	public function delete($id) {
		$account = Account::with('orders')->find($id);

		if (count($account->orders)) {
			return response()->json(['message' => 'Esta cuenta tiene ordenes asociadas'], 400);
		}

		$account->delete();
		return;
	}

}
