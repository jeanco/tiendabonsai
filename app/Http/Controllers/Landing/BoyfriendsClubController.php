<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Company;
use App\Mail\BoyFriendsClubMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BoyFriendsClubController extends Controller
{
    public function postRegisterFromWeb(Request $request)
    {   

        return $request->all();
        
                $raw_boyfriend_data = $request->boyfriend;
                $raw_girlfriend_data = $request->girlfriend;

                $boyfriend = array(
                    'full_name' => $raw_boyfriend_data['fullname'],
                    'identity_document' => $raw_boyfriend_data['identityDocument'],
                    'cellphone' => $raw_boyfriend_data['cellphone'],
                    'email' => $raw_boyfriend_data['email'],
                    'birthday' => $raw_boyfriend_data['birthday']
                    'address' => $raw_boyfriend_data['address'],
                );

                $girlfriend = array(
                    'full_name' => $raw_girlfriend_data['fullname'],
                    'identity_document' => $raw_girlfriend_data['identityDocument'],
                    'cellphone' => $raw_girlfriend_data['cellphone'],
                    'email' => $raw_girlfriend_data['email'],
                    'birthday' => $raw_girlfriend_data['birthday']
                    'address' => $raw_girlfriend_data['address'],
                );

                /*
                $company = Company::first();
                $company_email = $company->email;
                */
                $company_email = Company::first()->email;
                //$company_email = 'karla.sarmiento@kamasa.pe';

                $email_data = array(
                    'boyfriend' => $boyfriend,
                    'girlfriend' => $girlfriend,
                    'address' => $request->address,
                    'hour' => $request->hour,
                    'date' => $request->date,
                    'company_email' => $company_email,
                );

                Mail::to($company_email)->send(new BoyFriendsClubMail($email_data));

                return response()->json(['success' => true, 'title' => 'Bienvenid@s', 'message' => 'Ya se encuentran registrados en el Club de Novios, nos pondremos en contato. Gracias.'], 201);
    }

    public function postRegisterFromWebRecaptcha(Request $request)
    {
        try {
            $llaveSecreta = "6LdA-g8UAAAAAJKPdG7yh0UMaQT9IIDb0wk-IaaU";
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $request->recaptcha;
            //$captcha=Input::get('recaptcha');
            $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$llaveSecreta&response=$captcha&remoteip=$ip");
            $aux = json_decode($respuesta, true);
            if ($aux['success'] == true) {

                $raw_boyfriend_data = $request->boyfriend;
                $raw_girlfriend_data = $request->girlfriend;

                $boyfriend = array(
                    'full_name' => $raw_boyfriend_data['fullname'],
                    'identity_document' => $raw_boyfriend_data['identityDocument'],
                    'cellphone' => $raw_boyfriend_data['cellphone'],
                    'email' => $raw_boyfriend_data['email'],
                    'address' => $raw_boyfriend_data['address'],
                    'birthday' => $raw_boyfriend_data['birthday']
                );

                $girlfriend = array(
                    'full_name' => $raw_girlfriend_data['fullname'],
                    'identity_document' => $raw_girlfriend_data['identityDocument'],
                    'cellphone' => $raw_girlfriend_data['cellphone'],
                    'email' => $raw_girlfriend_data['email'],
                    'address' => $raw_girlfriend_data['address'],
                    'birthday' => $raw_girlfriend_data['birthday']
                );

                $company = Company::first();
                $company_email = $company->email;

                $email_data = array(
                    'boyfriend' => $boyfriend,
                    'girlfriend' => $girlfriend,
                    'address' => $request->address,
                    'hour' => $request->hour,
                    'date' => $request->date,
                    'company_email' => $company_email,
                );

                Mail::to($company_email)->send(new BoyFriendsClubEmail($email_data));

                return response()->json(['success' => true, 'title' => 'Bienvenid@s', 'message' => 'Ya se encuentran registrados en el Club de Novios, nos pondremos en contato. Gracias.'], 201);
            } else {
                return 'noCaptcha';
                return response()->json(['success' => false, 'title' => 'noCaptha', 'message' => 'Actualice la página para refrescar el recaptcha.'], 200);
            }

        } catch (Exception $e) {
            return response()->json(['success' => false, 'title' => 'Error Captcha', 'message' => 'Lo sentimos el mensaje no ha sido procesado, intente de nuevo porfavor.'], 200);
        }
    }
}
