<?php

namespace App\Http\Controllers\Template_8;

use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller {
	public function show_view() {

		$services = Service::wherePublished(1)
			->get();

		return view('template_8.services.index', compact('services'));
	}
}
