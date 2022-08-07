<?php

namespace App\Http\Controllers;

use App\PermissionUser;
use Illuminate\Http\Request;

class PermissionUserController extends Controller {
	public function update($user_id, $permission_id, Request $request) {
		$record = PermissionUser::whereUserId($user_id)
			->wherePermissionId($permission_id)->first();

		$record->activated = $request->new_status;
		$record->save();
		return;
	}

	public function update_additional_permission($user_id, $permission_id, Request $request) {
		$record = PermissionUser::whereUserId($user_id)
			->wherePermissionId($permission_id)->first();

		if (count($record)) {
			$record->activated = $request->new_status;
			$record->save();
		} else {
			$new_record = new PermissionUser();
			$new_record->user_id = $user_id;
			$new_record->permission_id = $permission_id;
			$new_record->additional = 1;
			$new_record->activated = 1;
			$new_record->save();
		}
		return;
	}

}
