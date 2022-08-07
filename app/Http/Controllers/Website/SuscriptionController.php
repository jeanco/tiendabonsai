<?php

namespace App\Http\Controllers\Website;

use App\Entities\TagPost;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class SuscriptionController extends Controller {
	public function show_view() {

		$path = $this->get_current_company_path();

		$last_blog = Post::latest()
			->with('image')
			->with('user')
			->first();

		$other_blogs = [];

		

		return view("{$path}.suscription.index", compact('last_blog', 'other_blogs'));
	}


}
