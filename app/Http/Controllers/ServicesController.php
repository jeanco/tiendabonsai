<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Service;
use App\Uploaders\ImageUploader;
use Auth;
use Illuminate\Http\Request;

class ServicesController extends Controller {
	protected $defaultImage;

	public function __construct() {
		$this->detaultImage = asset('static/images/image_no_available.png');
	}

	public function postService(ServiceRequest $request) {
		try {

			$user = Auth::user();

			$data = $request->all();
			$service = new Service();
			$service->fill($data);
			$service->slug = str_slug($request->name, '-');
			$service->published = 1;
			$service->user_id = $user->id;
			$service->company_id = $user->company_id;

			if ($request->hasFile('service_image')) {

				$img = $request->service_image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/services', $img, 'png', 900);

				$service->image = $functionUpload->getDropboxUrl();
				$service->image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/services', $img, 'png', 300);
				$service->image_thumb = $functionUpload->getDropboxUrl();
				$service->image_thumb_path = $functionUpload->getDropboxPath();
			}

			$service->save();
			$services = Service::orderBy('id', 'DESC')
				->whereCompanyId($user->company_id)
				->get();
			return response()->json(['success' => true, 'service' => $service, 'services' => $services], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putService(ServiceUpdateRequest $request) {
		try {

			$user = Auth::user();

			$data = $request->all();
			$service = Service::find($request->service_id);
			$service->fill($data);

			if ($request->hasFile('service_image')) {

				$img = $request->service_image;

				$functionUpload = new ImageUploader();

				$functionUpload->upload('/company/services', $img, 'png', 900);
				$functionUpload->delete($service->image_path, $service->image);

				$service->image = $functionUpload->getDropboxUrl();
				$service->image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/services', $img, 'png', 300);
				$functionUpload->delete($service->image_thumb_path, $service->image_thumb);

				$service->image_thumb = $functionUpload->getDropboxUrl();
				$service->image_thumb_path = $functionUpload->getDropboxPath();
			}
			$service->save();
			$services = Service::orderBy('id', 'DESC')
				->whereCompanyId($user->company_id)
				->get();
			return response()->json(['success' => true, 'service' => $service, 'services' => $services], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function getServiceById($serviceId) {
		$service = Service::find($serviceId);
		return response()->json(['service' => $service], 200);
	}

	public function getServices() {

		$company_id = Auth::user()->company_id;

		$services = Service::orderBy('id', 'ASC')
			->whereCompanyId($company_id)
			->get();

		foreach ($services as $i => $service) {
			if ($service->image == '') {
				$service->image = $this->detaultImage;
			}
		}
		return response()->json(['services' => $services], 200);
	}

	public function deleteService(Request $request) {
		try {

			$user = Auth::user();

			$service = Service::find($request->serviceId);
			$functionUpload = new ImageUploader();
			$functionUpload->delete($service->image_path, $service->image);
			$functionUpload->delete($service->image_thumb_path, $service->image_thumb);
			$service->delete();
			$services = Service::orderBy('id', 'DESC')
				->whereCompanyId($user->company_id)
				->get();
			return response()->json(['success' => true, 'services' => $services], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putChangePublishedStatus(Request $request) {
		try {
			$lastStatus = $request->lastStatus;

			$service = Service::find($request->serviceId);
			$service->published = ($lastStatus ? 0 : 1);
			$service->save();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function getImages($id, Request $request)
	{
		$request->session()->put('model_type', 5);

		$service = Service::with('images')->find($id);
    	return $service->images;
	}

}
