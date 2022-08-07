<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\User;

class AuthPersonalized {
	public function __construct(Auth $auth) {
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next) {
		if ($this->auth->guest()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {
				return redirect()->guest('/plataforma');
			}
		} else {
			// $user_id = Auth::user();

			// $user = User::whereHas('roles', function($query){
			// 	$query->where('roles.name', 'super-administrador');
			// })->find($user_id);

			// if (!count($user)) {
			// 	return redirect()->intended('/catalogo');
			// }

			//Redigir a catalogo o catalogo

			// if (\Auth::user()->company_id == 0) {
			// 	return redirect()->intended('/catalogo');
			// }
		}
		return $next($request);
	}
}
