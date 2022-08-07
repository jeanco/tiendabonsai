<?php

namespace App\Http\Controllers\Divemotor;

use Auth;
use App\City;
use App\User;
use Illuminate\Http\Request;
use App\Uploaders\ImageUploader;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function get_view(){

        $user_id = Auth::user()->id;

        $user = User::with('city')->find($user_id);

        $cities = City::all();

        return view('divemotor.users.perfil.index', compact('user', 'cities'));
    }

    public function update($id, Request $request){

        $user = User::find($id);
        $data = $request->all();

        $user->fill($data);

        if ($request->image_base_64 != '') {
            $img = $request->image_base_64;
            $functionUpload = new ImageUploader();
            $functionUpload->upload('/users/images', $img, 'png', 300);
            $functionUpload->delete($user->user_image_path, $user->user_image);


            $user->user_image = $functionUpload->getDropboxUrl();
            $user->user_image_path = $functionUpload->getDropboxPath();

            $functionUpload->upload('/users/images', $img, 'png', 50);
            $functionUpload->delete($user->user_image_thumb_path, $user->user_image_thumb);

            $user->user_image_thumb = $functionUpload->getDropboxUrl();
            $user->user_image_thumb_path = $functionUpload->getDropboxPath();
        }

        $user->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado al usuario'], 200);

    }



}
