<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Place;
use App\Price;
use App\Role;
use App\User;
use DB;
use Illuminate\Http\Request;

class FixerController extends Controller
{
	public function assign_super_admin_to_this_user($user_id){

		$role = Role::whereName('super-administrador')
			->first();

		$user = User::find($user_id);
		$user->roles()->attach($role->id);

		return "ok";
	}

	public function assign_all_permissions_this_user($user_id) {

		$user = User::find($user_id);
		$permissions = Permission::all();

		$user->permissions()->detach();

		foreach ($permissions as $key => $permission) {
			$user->permissions()->attach($permission->id, ['additional' => 0]);
		}

		return "All permissions were assigned to this user!";
	}

	public function assign_all_permissions_this_role() {


		$role = Role::all();
		//return $role[0]->id;

		foreach ($role as $key => $value) {

			$role = Role::find($value->id);
			$permissions = Permission::all();
			$role->permissions()->detach();

			foreach ($permissions as $key => $permission) {
				$role->permissions()->attach($permission->id, ['activated' => 1]);
			}

		}
		return "All permissions were assigned to this role!";
	}

	public function product_unit_price()
	{
		DB::table('prices')->delete();
		$place = Place::first();

		$products = DB::table('products')
			->where('deleted_at', null)
			// ->whereIn('id', [9, 11])
			->get();	

		foreach ($products as $key => $product) {

			$price = new Price();
			$price->name = "-";
			$price->type = 1;
			$price->price = $product->price;
			$price->min_quantity = 1;
			$price->status = true;
			$price->product_id = $product->id;
			$price->place_id = $place->id;
			$price->save();
		}

		return "prices have been created for all products";

	}


}
