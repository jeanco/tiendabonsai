<?php

namespace App\Http\Controllers\Template_14;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller {

	public function show_view($service_slug) {

		$services = DB::table('services')
			->where('slug', $service_slug)
			->where('deleted_at', null)
			->get();

		$service = $services[0];

		return view('template_14.returns_exchanges.index', compact('service'));
	}

	 public function show_view_page()  {
      return view('template_14.services.index');
  }

}
