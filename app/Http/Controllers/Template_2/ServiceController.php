<?php

namespace App\Http\Controllers\Template_2;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller {

	public function show_view($service_slug) {

		// $services = DB::table('services')
		// 	->where('slug', $service_slug)
		// 	->where('deleted_at', null)
		// 	->get();

		// $service = $services[0];

		$service = Service::whereSlug($service_slug)
			->with('images')
			->first();

		return view('template_2.services.perfil.index', compact('service'));
	}

	 public function show_view_page()  {
      return view('template_2.services.index');
  }

}
