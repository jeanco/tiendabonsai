<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\PermissionCategory;

class PermissionController extends Controller
{
    public function get_view(){

        $user_id = $_REQUEST['index'];

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

		$categories = PermissionCategory::whereHas('permissions', function ($query) use ($user_id) {
			$query->whereHas('permission_users', function ($query) use ($user_id) {
				$query->whereUserId($user_id);
				$query->whereAdditional(0);
			});
		})
			->with(['permissions' => function ($query) use ($user_id) {
				$query->whereHas('permission_users', function ($query) use ($user_id) {
					$query->whereUserId($user_id);
					$query->whereAdditional(0);
				});
				$query->with(['permission_user' => function ($query) use ($user_id) {
					$query->whereUserId($user_id);
					$query->whereAdditional(0);
				}]);
				$query->select(['id', 'display_name', 'permission_category_id']);
			}])
			->select(['id', 'name'])
			->get();

		#Categories with permissions where has permission_user user ->id

		$permissions_id_array = [];

		foreach ($categories as $key => $category) {
			foreach ($category->permissions as $i => $permission) {
				$permissions_id_array[] = $permission->id;
			}
		}

		//Additional permissions
		$categories_additional = PermissionCategory::with(['permissions' => function ($query) use ($permissions_id_array, $user_id) {
			$query->whereNotIn('id', $permissions_id_array);
			$query->select(['id', 'display_name', 'permission_category_id']);
			$query->with(['permission_user' => function ($query) use ($user_id) {
				$query->whereUserId($user_id);
				$query->whereAdditional(1);
			}]);
		}])
			->select(['id', 'name'])
			->get();

		$categories_additional_array = [];

		foreach ($categories_additional as $key => $category_additional) {

			if (count($category_additional->permissions)) {

				$permissions_array = [];

				foreach ($category_additional->permissions as $v => $permission) {

					$permissions_array[] = array(
						'id' => $permission->id,
						'display_name' => $permission->display_name,
						'permission_user' => ($permission->permission_user != null) ? ['activated' => $permission->permission_user->activated] : null,
					);
				}

				$categories_additional_array[] = array(
					'id' => $category_additional->id,
					'name' => $category_additional->name,
					'permissions' => $permissions_array,
				);

			}

		}

		$there_is_categories = (count($categories)) ? 1 : 0;
		$there_is_additional_categories = (count($categories_additional_array)) ? 1 : 0;

		// return response()->json(['categories' => $categories, 'categories_additional' => $categories_additional_array, 'user' => $user_array, 'there_is_categories' => $there_is_categories, 'there_is_additional_categories' => $there_is_additional_categories, 'there_is_not_categories_text' => 'Este usuario no tiene un rol asignado', 'there_is_not_additional_categories_text' => 'No se encontraron permisos adicionales del sistema']);
		$categories_additional = $categories_additional_array;
		$there_is_not_categories_text = 'Este usuario no tiene un rol asignado';
		$there_is_not_additional_categories_text = 'No se encontraron permisos adicionales del sistema';

		$user = array(
			'user_id' => $user_id,
		);

        return view('admin.routers.permissions.index', compact('user_array', 'categories', 'categories_additional', 'there_is_categories','there_is_additional_categories', 'there_is_not_categories_text', 'there_is_not_categories_text', 'there_is_not_additional_categories_text', 'user'));
    }

	#Permissions no additional and permissions aditional separated
	// public function show_user_permissions($user_id) {

	// 	$categories = PermissionCategory::whereHas('permissions', function ($query) use ($user_id) {
	// 		$query->whereHas('permission_users', function ($query) use ($user_id) {
	// 			$query->whereUserId($user_id);
	// 			$query->whereAdditional(0);
	// 		});
	// 	})
	// 		->with(['permissions' => function ($query) use ($user_id) {
	// 			$query->whereHas('permission_users', function ($query) use ($user_id) {
	// 				$query->whereUserId($user_id);
	// 				$query->whereAdditional(0);
	// 			});
	// 			$query->with(['permission_user' => function ($query) use ($user_id) {
	// 				$query->whereUserId($user_id);
	// 				$query->whereAdditional(0);
	// 			}]);
	// 			$query->select(['id', 'display_name', 'permission_category_id']);
	// 		}])
	// 		->select(['id', 'name'])
	// 		->get();

	// 	#Categories with permissions where has permission_user user ->id

	// 	$permissions_id_array = [];

	// 	foreach ($categories as $key => $category) {
	// 		foreach ($category->permissions as $i => $permission) {
	// 			$permissions_id_array[] = $permission->id;
	// 		}
	// 	}

	// 	//Additional permissions
	// 	$categories_additional = PermissionCategory::with(['permissions' => function ($query) use ($permissions_id_array, $user_id) {
	// 		$query->whereNotIn('id', $permissions_id_array);
	// 		$query->select(['id', 'display_name', 'permission_category_id']);
	// 		$query->with(['permission_user' => function ($query) use ($user_id) {
	// 			$query->whereUserId($user_id);
	// 			$query->whereAdditional(1);
	// 		}]);
	// 	}])
	// 		->select(['id', 'name'])
	// 		->get();

	// 	$categories_additional_array = [];

	// 	foreach ($categories_additional as $key => $category_additional) {

	// 		if (count($category_additional->permissions)) {

	// 			$permissions_array = [];

	// 			foreach ($category_additional->permissions as $v => $permission) {

	// 				$permissions_array[] = array(
	// 					'id' => $permission->id,
	// 					'display_name' => $permission->display_name,
	// 					'permission_user' => ($permission->permission_user != null) ? ['activated' => $permission->permission_user->activated] : null,
	// 				);
	// 			}

	// 			$categories_additional_array[] = array(
	// 				'id' => $category_additional->id,
	// 				'name' => $category_additional->name,
	// 				'permissions' => $permissions_array,
	// 			);

	// 		}
	// 	}

	// 	$user = User::with(['entity' => function ($query) {
	// 		$query->select(['id', 'identity_document', 'firstname', 'lastname', 'image']);
	// 	}])
	// 		->with('roles')
	// 		->select(['id', 'username', 'entity_id'])
	// 		->find($user_id);

	// 	$user_array = [
	// 		'user_id' => $user->id,
	// 		'image' => ($user->entity->image != '') ? $user->entity->image : '/images/campus_image.png',
	// 		'identity_document' => $user->entity->identity_document,
	// 		'firstname' => $user->entity->firstname,
	// 		'lastname' => $user->entity->lastname,
	// 		'roles' => $user->roles,
	// 	];

	// 	$there_is_categories = (count($categories)) ? 1 : 0;
	// 	$there_is_additional_categories = (count($categories_additional_array)) ? 1 : 0;

	// 	return response()->json(['categories' => $categories, 'categories_additional' => $categories_additional_array, 'user' => $user_array, 'there_is_categories' => $there_is_categories, 'there_is_additional_categories' => $there_is_additional_categories, 'there_is_not_categories_text' => 'Este usuario no tiene un rol asignado', 'there_is_not_additional_categories_text' => 'No se encontraron permisos adicionales del sistema']);
	// }

}
