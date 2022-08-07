<?php

namespace App\Http\Controllers\Divemotor;

use Auth;
use App\City;
use App\User;
use App\Customer;
use App\PermissionUser;
use App\Http\Controllers\Controller;

class QuotationController extends Controller {

    public function get_view(){

        $cities = City::all();
        return view('divemotor.users.quotation.index', compact('cities'));

    }

    public function datatable(Request $request){

    }

    public function get_other_view(){

        $permissions_array = [];

        $user_id = Auth::user()->id;

        $permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function($query){
				$query->whereHas('category', function($query){
					$query->whereIn('slug', ['catalogo', 'pedidos', 'suscripciones']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}



		$customers = Customer::select(['id', 'first_name', 'last_name'])
            ->get();

            $user_id = Auth::user()->id;

            $user_oficial = User::find($user_id);

            $is_admin = false;

            $user = User::whereHas('roles', function($query){
                $query->where('roles.name', 'ejecutivo-de-ventas');
            })->find($user_id);

            if (count($user)) {
                $salesmen = User::whereId($user_id)->get();
                $cities = City::whereId($user_oficial->city_id)->get();

            } else {
                $salesmen = User::whereHas('roles', function($query){
                    $query->where('roles.name', 'ejecutivo-de-ventas');
                })
                ->select(['id', 'first_name', 'last_name'])
                ->get();

                $is_admin = true;

                $cities = City::all();
            }

        return view('admin.routers.quotation.index', compact('permissions_array', 'cities', 'customers', 'salesmen', 'is_admin'));

    }

}
