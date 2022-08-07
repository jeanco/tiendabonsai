<?php

namespace App\Http\Controllers\Template_10;

use App\Http\Controllers\Controller;
use App\Gallery;
use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller {

	public function show_view() {

		/*$service = Service::whereSlug($slug_service)
			->first();

		$servicex = Service::whereSlug($slug_service)
			->first();*/



		$services = Gallery::select(['title', 'slug', 'description', 'category_id', 'link', 'published'])
			->wherePublished(1)
			->get();
	



	

		return view('template_10.service.index', compact('services'));
	}
}
