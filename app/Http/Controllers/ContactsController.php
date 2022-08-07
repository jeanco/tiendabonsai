<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\ContactCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function postContactFromLanding(Request $request)
    {
        try {
                $llaveSecreta="6LdA-g8UAAAAAJKPdG7yh0UMaQT9IIDb0wk-IaaU";
                $ip=$_SERVER['REMOTE_ADDR'];
                $captcha = $request->recaptcha;
                //$captcha=Input::get('recaptcha');
                $respuesta=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$llaveSecreta&response=$captcha&remoteip=$ip");
                $aux=json_decode($respuesta,true);
                if ($aux['success']==true)
                {   
                        $emailData = array(
                            'name' => $request->firstName.' '.$request->lastName,
                            'email' =>$request->email,
                            'cellphone' =>$request->cellphone,
                            'msg' => $request->message,
                        );
                        $company = Company::first();
                        $companyEmail = $company->email;

                        Mail::to($companyEmail)->send(new ContactCompany($emailData, $emailData['email']));
                        return response()->json(['success' => true, 'title' => 'Mensaje Enviado', 'message' => 'Su mensaje ha sido enviado correctamente, nuestros ejecutivos se pondran en contacto con usted.'], 201);
                }
                else{
                    return 'noCaptcha';
                    return response()->json(['success' => false, 'title' => 'noCaptha', 'message' => 'Actualice la página para refrescar el recaptcha.'], 200);
                }

          } catch (Exception $e) {
              return response()->json(['success' => false, 'title' => 'Error Captcha', 'message' => 'Lo sentimos el mensaje no ha sido procesado, intente de nuevo porfavor.'], 200);
          }
    }
}
