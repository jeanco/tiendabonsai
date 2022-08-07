<?php

namespace App\Http\Controllers;

class BrandsController extends Controller {
	public function getBrands() {
		$data = [
			// [
			// 	'name' => 'Sony',
			// 	'imageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJg-XR5i7Nqe1O1QbakjbpSrQJIsq-xttJYyHNjSJBoxhZQETu',
			// 	'link' => 'https://www.sony.com/',
			// ],
			[
				'name' => 'LG',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/e5nc9jq2a36mff1/LG.png?dl=0',
				'link' => 'https://www.lg.com',
			],
			[
				'name' => 'Daewoo',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/71m0lfxuehbc4qb/DAEWOO.png?dl=0',
				'link' => 'http://www.dwe.com.pe/',
			],
			// [
			// 	'name' => 'Electrolux',
			// 	'imageUrl' => 'https://dl.dropboxusercontent.com/s/zvg8897hx81izyq/ELECTROLUX.png?dl=0',
			// 	'link' => 'http://www.electrolux.com/',
			// ],
			// [
			// 	'name' => 'Sole',
			// 	'imageUrl' => 'https://dl.dropboxusercontent.com/s/eo0e09axgz9pbdj/SOLE.png?dl=0',
			// 	'link' => 'http://www.sole.com.pe/',
			// ],
			// [
			// 	'name' => 'Indurama',
			// 	'imageUrl' => 'https://dl.dropboxusercontent.com/s/z5rniaxvptys83r/INDURAMA.png?dl=0',
			// 	'link' => 'https://www.indurama.com/pe/site',
			// ],
			// [
			// 	'name' => 'Ika',
			// 	'imageUrl' => 'https://dl.dropboxusercontent.com/s/3dns7x9qvfh8n86/IKA.png?dl=0',
			// 	'link' => '#',
			// ],
			[
				'name' => 'Samsung',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/idcwsuatujjjk34/SAMSUNG.png?dl=0',
				'link' => 'http://www.samsung.com/pe/',
			],
		];

		return response()->json(['data' => $data], 200);
	}

}
