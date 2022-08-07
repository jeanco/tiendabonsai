<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgreetmentRequest as AgreetmentRequest;
use App\Http\Requests\AgreetmentUpdateRequest as AgreetmentUpdateRequest;
use App\Agreetment as Agreetment;
use App\Uploaders\ImageUploader;
use Auth;

class AgreetmentsController extends Controller
{
    protected $defaultImage;

    public function __construct()
    {
        $this->detaultImage = asset('static/images/image_no_available.png');
    }

    public function landing()
    {   
        $testimonies = Agreetment::wherePublished(true)->get();
        
        $data = [];
        foreach ($testimonies as $key => $testimony) {
            $data[] = [
                'imageUrl' => $testimony->image,
                'title' => $testimony->title,
                'link' => $testimony->website,
                'description' => $testimony->description,
            ];
        }
        return response()->json(['data' => $data], 200);
    }

    public function postAgreetment(AgreetmentRequest $request)
    {   
        try {
        	$user = Auth::user();
            $data = $request->all();
            $agreetment  = new Agreetment();
            $agreetment->fill($data);
            $agreetment->published = 1;
            $agreetment->company_id = $user->company_id;

            if ($request->hasFile('agreetment_image')) {

                $img = $request->agreetment_image;

                $functionUpload = new ImageUploader();
                $functionUpload->upload('/company/agreetments',$img,'png',400);

                $agreetment->image = $functionUpload->getDropboxUrl();
                $agreetment->image_path = $functionUpload->getDropboxPath();

                $functionUpload->upload('/company/agreetments',$img,'png',100);
                $agreetment->image_thumb = $functionUpload->getDropboxUrl();
                $agreetment->image_thumb_path = $functionUpload->getDropboxPath();
            }

            $agreetment->save();
            $agreetments = Agreetment::orderBy('id','DESC')->get();
            return response()->json(['success'=>true,'agreetment'=>$agreetment,'agreetments'=>$agreetments],200);
        } catch (Exception $e) {
            return response()->json(['success'=>false],200);
        }
    }

    public function putAgreetment(AgreetmentUpdateRequest $request)
    {
        try {
        	$user = Auth::user();
            $data = $request->all();
            $agreetment  = Agreetment::find($request->agreetment_id);
            $agreetment->fill($data);
            $agreetment->company_id = $user->company_id;

            if ($request->hasFile('agreetment_image')) {

                $img = $request->agreetment_image;

                $functionUpload = new ImageUploader();

                $functionUpload->upload('/company/agreetments',$img,'png',300);
                $functionUpload->delete($agreetment->image_path,$agreetment->image);

                $agreetment->image = $functionUpload->getDropboxUrl();
                $agreetment->image_path = $functionUpload->getDropboxPath();

                $functionUpload->upload('/company/agreetments',$img,'png',100);
                $functionUpload->delete($agreetment->image_thumb_path,$agreetment->image_thumb);

                $agreetment->image_thumb = $functionUpload->getDropboxUrl();
                $agreetment->image_thumb_path = $functionUpload->getDropboxPath();
            }
            $agreetment->save();
            $agreetments = Agreetment::orderBy('id','DESC')->get();
            return response()->json(['success'=>true,'agreetment'=>$agreetment,'agreetments'=>$agreetments],200);
        } catch (Exception $e) {
            return response()->json(['success'=>false],200);
        }
    }

    public function getAgreetmentById($agreetmentId)
    {
        $agreetment = Agreetment::find($agreetmentId);
        return response()->json(['agreetment'=>$agreetment],200);
    }

    public function getAgreetments()
    {
    	$user = Auth::user();
        $company_id = $user->company_id;
        
        $agreetments = Agreetment::orderBy('id','DESC')
            ->whereCompanyId($company_id)
            ->get();
        
        foreach ($agreetments as $i => $agreetment) {
            if ($agreetment->image == '') {
                $agreetment->image = $this->detaultImage;
            }
            $agreetment->published = (float) $agreetment->published;
        }
        return response()->json(['agreetments'=>$agreetments],200);
    }

    public function deleteAgreetment(Request $request)
    {
        try {
            $agreetment = Agreetment::find($request->agreetmentId);
            $functionUpload = new ImageUploader();
            $functionUpload->delete($agreetment->image_path,$agreetment->image);
            $functionUpload->delete($agreetment->image_thumb_path,$agreetment->image_thumb);
            $agreetment->delete();
            $agreetments = Agreetment::orderBy('id','DESC')->get();
            return response()->json(['success'=>true,'agreetments'=>$agreetments],200);
        } catch (Exception $e) {
            return response()->json(['success'=>false],200);
        }
    }

    public function putChangePublishedStatus(Request $request)
    {
        try {
            $lastStatus  = $request->lastStatus;

            $agreetment = Agreetment::find($request->agreetmentId);
            $agreetment->published = ($lastStatus ? 0 : 1);
            $agreetment->save();
            return response()->json(['success'=>true],200);
        } catch (Exception $e) {
            return response()->json(['success'=>false],200);
        }
    }
}
