<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountSaveRequest;
use App\Http\Requests\AccountUpdateRequest;

use App\BillingCard;
use App\Uploaders\ImageUploader;

class BillingCardsController extends Controller
{
    public function postAccount(AccountSaveRequest $request)
	{	
		try {
			$billingCard = new BillingCard;
			$data = $request->all();
			$billingCard->fill($data);
			$billingCard->published = 1;

			if ($request->hasFile('bank_image')) {

				$img = $request->bank_image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/accounts',$img,'png',400);

				$billingCard->bank_image = $functionUpload->getDropboxUrl();
				$billingCard->bank_image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/accounts',$img,'png',100);
				$billingCard->bank_image_thumb = $functionUpload->getDropboxUrl();
				$billingCard->bank_image_thumb_path = $functionUpload->getDropboxPath();
			}
			$billingCard->save();

			$accounts = BillingCard::orderBy('id','DESC')->get();

			foreach ($accounts as $key => $account) {
				if ($account->bank_image == ''){
					$account->bank_image = "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png";
				}
			}

			return response()->json(array('billingCard'=>$billingCard,'accounts'=>$accounts,'success'=>true),200);
		} catch (Exception $e) {
			return response()->json(array('success'=>false),200);
		}
	}

	public function putAccount(AccountUpdateRequest $request)
	{
		try {
			$billingCard = BillingCard::find($request->account_id);
			$data = $request->all();
			$billingCard->fill($data);

			if ($request->hasFile('bank_image')) {

				$img = $request->bank_image;

				$functionUpload = new ImageUploader();

				$functionUpload->upload('/company/accounts',$img,'png',300);
				$functionUpload->delete($billingCard->bank_image_path,$billingCard->bank_image);

				$billingCard->bank_image = $functionUpload->getDropboxUrl();
				$billingCard->bank_image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/accounts',$img,'png',100);
				$functionUpload->delete($billingCard->bank_image_thumb_path,$billingCard->bank_image_thumb);

				$billingCard->bank_image_thumb = $functionUpload->getDropboxUrl();
				$billingCard->bank_image_thumb_path = $functionUpload->getDropboxPath();
			}

			$billingCard->save();

			$accounts = BillingCard::orderBy('id','DESC')->get();

			foreach ($accounts as $key => $account) {
				if ($account->bank_image == ''){
					$account->bank_image = "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png";
				}
			}

			return response()->json(array('billingCard'=>$billingCard,'accounts'=>$accounts,'success'=>true),200);
		} catch (Exception $e) {
			return response()->json(array('success'=>false),200);
 		}
	}

	public function deleteAccount(Request $request)
	{
		try {
			$accountId = $request->accountId;
			$account = BillingCard::find($accountId);

			$functionUpload = new ImageUploader();
			$functionUpload->delete($account->bank_image_path,$account->bank_image);
			$functionUpload->delete($account->bank_image_thumb_path,$account->bank_image_thumb);
			$account->delete();

			$accounts = BillingCard::all();
			return response()->json(['success'=>true,'accounts'=>$accounts],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}

	public function getAccountById($accountId)
	{
		$account = BillingCard::find($accountId);
		return response()->json(['account'=>$account],200);
	}

	public function getAccounts()
	{
		$accounts = BillingCard::orderBy('id','DESC')->get();

		foreach ($accounts as $key => $account) {
			if ($account->bank_image == '') {
				$account->bank_image = "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png";
			}
		}
		return response()->json(['accounts'=>$accounts],200);
	}

	public function putChangePublishedStatus(Request $request)
	{
		try {
			$lastStatus  = $request->lastStatus;

			$account = BillingCard::find($request->accountId);
			$account->published = ($lastStatus ? 0 : 1);
			$account->save();
			return response()->json(['success'=>true],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}

	}
}
