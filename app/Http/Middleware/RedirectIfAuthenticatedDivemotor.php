<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedDivemotor {

	public function handle($request, Closure $next, $guard = null) {
		if (Auth::guard($guard)->check()) {
			return redirect('/catalogo');
		}

		return $next($request);
	}
}
