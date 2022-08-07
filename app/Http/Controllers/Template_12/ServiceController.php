<?php

namespace App\Http\Controllers\Template_12;

use App\Campaign;
use App\Category;
use App\Company;
use App\Agreetment;
use App\Entities\CompanyCategory;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Content;
use App\Service;
use App\Subcategory;
use App\Value;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use DB;

class ServiceController extends Controller {
  public function show_view()  {

  	$services = Service::wherePublished(1)
			->select(['id', 'name', 'description','image','slug'])
			->get();

      //return view('template_12.services.index');
      return view('template_12.services.index', compact('services'));
  }

  public function show_view_pages($service_slug) {

		$services = DB::table('services')
			->where('slug', $service_slug)
			->where('deleted_at', null)
			->get();

		$service = $services[0];

		return view('template_12.returns_exchanges.index', compact('service'));
	}
}
