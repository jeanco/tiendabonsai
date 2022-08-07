<?php

namespace App\Http\Controllers;

use App\PermissionCategory;
use App\PermissionRole;
use App\PermissionUser;
use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller {
	public function get_view() {

		$data = [];

		$roles = Role::whereActivated(1)->get();

		foreach ($roles as $i => $role) {
			$role_id = $role->id;

			$categories = PermissionCategory::with(['permissions' => function ($query) use ($role_id) {
				$query->with(['permission_role_activated' => function ($query) use ($role_id) {
					$query->where('role_id', $role_id);
				}]);
			}])
				->get();

			$categories_array = [];

			foreach ($categories as $u => $category) {

				$permissions_array = [];
				foreach ($category->permissions as $a => $permission) {

					$permissions_array[] = array(
						'permission_name' => $permission->display_name,
						'role_id' => $role->id,
						'permission_id' => $permission->id,
						'status' => ($permission->permission_role_activated != null) ? 1 : 0,
					);

				}

				$categories_array[] = array(
					'category_name' => $category->name,
					'permissions' => $permissions_array,
				);
			}

			$data[] = array(
				'slug' => $role->name,
				'role_name' => $role->display_name,
				'categories' => $categories_array,
			);
    }

    $user_id = Auth::user()->id;

    $user = User::with('city')
            ->find($user_id);

    $user_array = array(
            'id' => $user->id,
            'username' => $user->username,
            'cel' => $user->cel,
            'email' => $user->email,
            'address' => $user->address,
			'city_name' => ($user->city != null) ? $user->city->name : '',
    );

    $roles = $data;

    return view('admin.routers.roles.index', compact('user_array', 'roles'));
	}

	public function update($role_id, $permission_id, Request $request) {

		$record = PermissionRole::whereRoleId($role_id)
			->wherePermissionId($permission_id)
			->first();

		if (!count($record)) {
			$new_record = new PermissionRole();
			$new_record->permission_id = $permission_id;
			$new_record->role_id = $role_id;
			$new_record->save();
		} else {
			$record->activated = $request->new_status;
			$record->save();
		}

		#Update this status on permission_user!
		if (!$request->new_status) {
			$permission_users = PermissionUser::wherePermissionId($permission_id)
			// ->whereHas('user', function ($query) use ($role_id, $permission_id) {
			// 	$query->whereHas('roles', function ($query) use ($role_id, $permission_id) {
			// 		//$query->where('roles.id', '!=', $role_id);
			// 		$query->whereHas('permissions', function ($query) use ($permission_id) {
			// 			$query->where('permissions.id', $permission_id);
			// 		});
			// 	});
			// })
				->with(['user' => function ($query) use ($role_id, $permission_id) {
					$query->with(['roles' => function ($query) use ($role_id, $permission_id) {
						$query->where('roles.id', '!=', $role_id);
						$query->whereHas('permissions', function ($query) use ($permission_id) {
							$query->where('permissions.id', $permission_id);
							$query->where('permission_role.activated', 1);
						});
					}]);
				}])
				->get();

			foreach ($permission_users as $key => $permission_user) {
				if (count($permission_user->user->roles)) {
				} else {
					$permission_user->activated = $request->new_status;
					$permission_user->save();
				}
			}
		} else {

			$users = User::whereHas('roles', function ($query) use ($role_id) {
				$query->where('roles.id', $role_id);
			})->get();

			foreach ($users as $key => $user) {
				$permission_user = PermissionUser::wherePermissionId($permission_id)
					->whereUserId($user->id)
					->first();

				if (count($permission_user)) {
					if (!$permission_user->activated) {
						$permission_user->activated = 1;
						$permission_user->save();
					}
				} else {
					$new_permission_user = new PermissionUser();
					$new_permission_user->permission_id = $permission_id;
					$new_permission_user->user_id = $user->id;
					$new_permission_user->save();
				}
			}
		}

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha cambiado el estado del Rol-Permiso!']);
	}
}
