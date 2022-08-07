<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('places')->delete();

		DB::table('places')->insert([
			'name' => 'Sede 1',
			'company_id' => 1,
		]);

		DB::table('places')->insert([
			'name' => 'Sede 2',
			'company_id' => 1,
		]);

	}
}
