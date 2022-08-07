<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    public function login(Request $request){

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            return response()->json([
                'token' => $user->createToken('OhyeepeApp')->accessToken,
                'user' => $user,
            ], 200);

            // $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            // return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }

    public function register(){

    }

    public function details(Request $request){
        return $request->user();
    }

}
