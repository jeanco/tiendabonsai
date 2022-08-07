<?php

namespace App\Http\Controllers;

use Auth;
use App\Role;
use App\User;

class RolesController extends Controller
{
    public function get_view(){

        $user_id = Auth::user()->id;

        $user = User::with('city')
            ->find($user_id);

        $user_array = array(
            'id' => $user->id,
            'username' => $user->username,
            'cel' => $user->cel,
            'email' => $user->email,
            'address' => $user->address,
            'city_name' => $user->city->name
        );

        $roles = Role::all();

        return view('admin.routers.roles.index', compact('user_array', 'roles'));
    }


}
