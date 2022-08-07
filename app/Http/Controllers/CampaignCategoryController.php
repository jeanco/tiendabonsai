<?php

namespace App\Http\Controllers;

use App\Entities\CampaignCategory;

class CampaignCategoryController extends Controller {
	public function index() {
		$categories = CampaignCategory::all();
		return $categories;
	}
}
