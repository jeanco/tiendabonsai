<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class IsAdmin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		$user_id = Auth::user()->id;

		$user = User::whereHas('roles', function($query){
			$query->whereIn('roles.name', ['super-administrador', 'administrador','administrador-empresario']);
		})->find($user_id);

		if (!count($user)) {
			return redirect()->intended('/catalogo');
		}

		return $next($request);
	}
}
