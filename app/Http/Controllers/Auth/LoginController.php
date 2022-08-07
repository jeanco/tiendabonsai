<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	/*
		  |--------------------------------------------------------------------------
		  | Login Controller
		  |--------------------------------------------------------------------------
		  |
		  | This controller handles authenticating users for the application and
		  | redirecting them to your home screen. The controller uses a trait
		  | to conveniently provide its functionality to your applications.
		  |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = 'admin/dashboard';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest', ['except' => 'logout']);
	}

	public function username() {
		return 'username';
	}

	/* Custom Login without use Laravel's login */
	public function showLoginForm() {
		return view('admin.login');
	}

	public function authenticate(Request $request) {
		if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activated' => 1])) {

			$is_admin = User::admins()->whereId(Auth::user()->id)->exists();

			if ($is_admin) {
				return redirect()->intended('admin/dashboard');
			}

			Auth::logout();
			return redirect()->intended('plataforma')->with('data', ['Usted no puede permisos para acceder a esta plataforma']);
			// return response()->json($is_admin);
			// return response()->json(Auth::user()->admins()->exists());
		} else {
			return redirect()->intended('plataforma')->with('data', ['Nombre de usuario y/o Contraseña Incorrectas']);
		}
	}

	public function authenticate_from_checkout(Request $request) {
		if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activated' => 1])) {
			//return redirect()->intended("/miperfil/" . Auth::user()->id);
			return redirect()->intended("/checkout/info");
		} else {
			//return redirect()->intended('acceder')->with('data', ['Error']);
			return redirect()->intended('/checkout/info')->with('data', ['Error']);
		}
	}

	public function authenticate_from_landing(Request $request) {
		if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activated' => 1])) {
			return redirect()->intended("/miperfil");
			//return redirect()->intended("/checkout/info");
		} else {
			return redirect()->back()->with('data', ['Error']);
			//return redirect()->intended('/checkout/info')->with('data', ['Error']);
		}
	}

	public function authenticate_divemotor(Request $request) {

		if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'activated' => 1])) {
			// if (!empty($request->remember)) {
			// 	Auth::login(Auth::user(), true);
			// }
			// return redirect()->intended("/miperfil/" . Auth::user()->id);
			return redirect()->intended("/catalogo");
		} else {
			return redirect()->intended('acceder')->with('data', ['Error']);
		}
	}

	public function logout(Request $request) {
		$this->guard()->logout();

		$request->session()->flush();

		$request->session()->regenerate();

		return redirect('/');
	}
}
