<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Socialite;
use Session;

class SocialAuthController extends Controller {

  // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider, Request $request)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('username', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            ##Create customer
           $customer = Customer::create([
                'document_type' => 1,
                'identity_document' => '',
                'first_name' => $social_user->name,
                'email' => $social_user->email,
                'customer_type' => 1,
                'company_id' => 1,
                //'avatar' => $social_user->avatar,
            ]);

            $user = User::create([
            	'username' => $social_user->email,
                'email' => $social_user->email,
            	'password' => '',
                'first_name' => $social_user->name,
                'company_id' => 1,
                'customer_id' => $customer->id,
                'user_type' => 1,
                'activated' => 1,
                //'avatar' => $social_user->avatar,
            ]);
 
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        $to = Session::get('redirect');
        return redirect()->to('/'.$to);
    }

}	
