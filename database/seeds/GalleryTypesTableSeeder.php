<?php

use Illuminate\Database\Seeder;

class GalleryTypesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('gallery_types')->delete();

		DB::table('gallery_types')->insert([
			'name' => 'Principal',
			'slug' => 'principal',
		]);

		DB::table('gallery_types')->insert([
			'name' => 'Más Fotos',
			'slug' => 'mas-fotos',
		]);

	}
}
