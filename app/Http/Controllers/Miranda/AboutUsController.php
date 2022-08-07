<?php

namespace App\Http\Controllers\Miranda;

use App\Company;
use App\Content;
use App\Http\Controllers\Controller;
use App\Service;
use App\Value;

class AboutUsController extends Controller {

	public function show_view() {
		$company = Company::first();

		$images = Content::whereType(1)
			->whereModelType(1)
			->whereModelId($company->id)
			->take(4)
			->get();

		$values = Value::wherePublished(1)
			->get();

		$services = Service::wherePublished(1)
			->take(6)
			->get();

		$companies = Company::whereStatus(1)
			->get();

		$index = 0;
		$services_array = [];

		if (count($services) == 6) {
			foreach ($services as $key => $service) {
				if ($key > 2) {
					if ($key == 3) {
						$index++;
					}

					$services_array[$index][] = array(
						'name' => $service->name,
						'description' => $service->description,
						'image' => $service->image_thumb,
					);
				} else {
					$services_array[$index][] = array(
						'name' => $service->name,
						'description' => $service->description,
						'image' => $service->image_thumb,
					);
				}
			}
		}
		$path = $this->get_current_company_path();
		return view("{$path}.about_as.index", compact('company', 'images', 'values', 'services_array', 'companies'));
	}
}
