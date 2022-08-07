<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LandingGuestMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		if (Auth::guard($guard)->check()) {
			$user = Auth::user();
			return redirect("/miperfil");
		}

		return $next($request);
	}
}
