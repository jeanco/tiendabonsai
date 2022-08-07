<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\PermissionRole;
use App\PermissionUser;
use App\Uploaders\ImageUploader;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserPasswordRequest;
use App\RoleUser;
use Illuminate\Http\Request;

class UsersController extends Controller {
	public function getUsers( Request $request) {

		//dd($request["type"]);
		$user_id = Auth::user()->id;

		$user = User::with(['roles' => function($query){
				$query->whereIn('roles.name', ['super-administrador']);
			}])
			->find($user_id);

		// $user_id = $user->id;
		$company_id = $user->company_id;

		$company = Company::find($company_id);

		$users = User::where('id', '!=', $user_id)
			->where('company_id', '>', 0)
			->with('company');

		if (!count($user->roles)) {

			// $users = $users->whereHas('roles', function($query){
			// 	$query->whereNotIn('roles.name', ['super-administrador']);
			// });

			$users = $users->whereDoesntHave('roles', function($query){
				$query->whereIn('roles.name', ['super-administrador']);
			});

			// $roles = $roles->where('name', '!=', 'super-administrador');
		}

		if ($company->main != 1) {
			$users = $users->whereCompanyId($company_id)
				->where('company_id', '!=', 0);
		}

		

		if ($request["type"]==2) {
			$users = User::where('id', '!=', $user_id)
			->where('company_id', '=', 0)
			->with('company');
		}
		$users = $users->get();


		return response()->json(['users' => $users], 200);
	}

	public function getUser($userId) {
		$user = User::find($userId);
		return response()->json(['user' => $user], 200);
	}

	public function suspendUser($userId) {
		try {
			$user = User::find($userId);
			$user->activated = 0;
			$user->save();

			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function activateUser($userId) {
		try {
			$user = User::find($userId);
			$user->activated = 1;
			$user->save();

			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);

		}
	}

	public function postUser(UserCreateRequest $request) {
		try {

			// $company = Company::find($request->company_id);

			$data = $request->all();
			$user = new User();
			$user->fill($data);
			$user->activated = 1;
			$user->password = bcrypt($data['password']);
			$user->country_id = 0;

			if ($request->hasFile('user_image')) {
				$img = $request->file('user_image');
				$functionUpload = new ImageUploader();
				$functionUpload->upload('/users/images', $img, 'png', 300);

				$user->user_image = $functionUpload->getDropboxUrl();
				$user->user_image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/users/images', $img, 'png', 50);
				$user->user_image_thumb = $functionUpload->getDropboxUrl();
				$user->user_image_thumb_path = $functionUpload->getDropboxPath();
			}

			$user->save();

			//Assigning role and permissions
			$role_id = $request->user_type;

			$user->roles()->attach($role_id);

			#Attaching permission_user
			$role_permission = PermissionRole::whereRoleId($role_id)
				->get();

			foreach ($role_permission as $i => $rp) {

				$exist_record_permission_user = PermissionUser::whereUserId($user->id)
					->wherePermissionId($rp->permission_id)->first();

				if (!count($exist_record_permission_user)) {
					$new_permission_user = new PermissionUser();
					$new_permission_user->user_id = $user->id;
					$new_permission_user->permission_id = $rp->permission_id;
					$new_permission_user->additional = 0;
					$new_permission_user->activated = $rp->activated;
					$new_permission_user->save();
				} else {
					if ($rp->activated) {
						$exist_record_permission_user->activated = 1;
						$exist_record_permission_user->save();
					}
				}
			}

			return response()->json(['success' => true], 200);

		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putUser(UserUpdateRequest $request) {
		try {
			$data = $request->all();
			$user = User::find($data['user_id']);
			$user->fill($data);

			if ($request->hasFile('user_image')) {
				$img = $request->file('user_image');
				$functionUpload = new ImageUploader();
				$functionUpload->upload('/users/images', $img, 'png', 300);
				$functionUpload->delete($user->user_image_path, $user->user_image);

				$user->user_image = $functionUpload->getDropboxUrl();
				$user->user_image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/users/images', $img, 'png', 50);
				$functionUpload->delete($user->user_image_thumb_path, $user->user_image_thumb);
				$user->user_image_thumb = $functionUpload->getDropboxUrl();
				$user->user_image_thumb_path = $functionUpload->getDropboxPath();
			}
			$user->save();

			$id = $user->id;

			#Updating the roles and permissions;

			$roles_array = [];
			$roles_array[] = $request->user_type;

			$user = User::with(['roles' => function ($query) use ($roles_array) {
				$query->whereNotIn('roles.id', $roles_array);
				$query->select(['roles.id', 'roles.display_name']);
			}])->find($id);

			//return $user->roles;

			#Delete all roles that in $user->roles
			foreach ($user->roles as $key => $role) {
				$role_id = $role->id;

				$role_user = RoleUser::where('user_id', $id)
					->where('role_id', $role_id)
					->first();

				$role_user->delete();

				$permissions = PermissionUser::whereUserId($id)
					->whereHas('permission', function ($query) use ($role_id) {
						$query->whereHas('permission_roles_activated', function ($query) use ($role_id) {
							$query->whereRoleId($role_id);
						});
					})->get();

				foreach ($permissions as $y => $permission) {
					$permission_id = $permission->permission_id;

					$permission_user = PermissionUser::wherePermissionId($permission_id)
						->whereUserId($id)
						->with(['user' => function ($query) use ($role_id, $permission_id) {
							$query->with(['roles' => function ($query) use ($role_id, $permission_id) {
								$query->where('roles.id', '!=', $role_id);
								$query->whereHas('permissions', function ($query) use ($permission_id) {
									$query->where('permissions.id', $permission_id);
									$query->where('permission_role.activated', 1);
								});
							}]);
						}])
						->first();

					if (count($permission_user->user->roles)) {
					} else {
						$permission_user->activated = 0;
						$permission_user->save();
					}

				}

				// ->get();
			}

			$user = User::with('roles')->find($id);

			$user_roles_id_array = [];

			foreach ($user->roles as $key => $role) {
				$user_roles_id_array[] = $role->id;
			}

			foreach ($roles_array as $e => $new_id) {

				#Added new roles if the id is not in user_roles_id_array
				if (!in_array($new_id, $user_roles_id_array)) {
					$user->roles()->attach($new_id);

					$permissions_role = PermissionRole::whereRoleId($new_id)->get();

					foreach ($permissions_role as $key => $permission_role) {

						$exist_permission_user = PermissionUser::wherePermissionId($permission_role->permission_id)->whereUserId($id)
							->first();

						if (count($exist_permission_user)) {
							if ($permission_role->activated) {
								$exist_permission_user->activated = 1;
								$exist_permission_user->save();
							}
						} else {
							$user->permissions()->attach($permission_role->permission_id, ['additional' => 0, 'activated' => $permission_role->activated]);
						}
					}
				}
			}

			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);

		}
	}

	public function putProfileUser(UserProfileRequest $request) {
		try {
			$data = $request->all();
			$user = User::find($request->profile_id);
			$user->fill($data);

			if ($request->hasFile('user_image')) {
				$img = $request->file('user_image');
				$functionUpload = new ImageUploader();
				$functionUpload->upload('/users/images', $img, 'png', 300);
				$functionUpload->delete($user->user_image_path, $user->user_image);

				$user->user_image = $functionUpload->getDropboxUrl();
				$user->user_image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/users/images', $img, 'png', 50);
				$functionUpload->delete($user->user_image_thumb_path, $user->user_image_thumb);
				$user->user_image_thumb = $functionUpload->getDropboxUrl();
				$user->user_image_thumb_path = $functionUpload->getDropboxPath();
			}
			$user->save();
			return response()->json(['success' => true, 'user' => $user], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putChangePassword(UserPasswordRequest $request) {
		try {
			$userId = $request->id;
			$user = User::find($userId);
			$user->password = bcrypt($request->password);
			$user->save();

			if (Auth::user()->id == $userId) {
				Auth::logout();
			}
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function user_information(){
		return Auth::user()->id;
	}

}
