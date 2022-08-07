<?php

use Illuminate\Database\Seeder;

class ShippingStatusTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		/*DB::table('shipping_status')->delete();*/

		DB::table('shipping_status')->insert([
			'name' => 'En preparación',
		]);

		DB::table('shipping_status')->insert([
			'name' => 'Enviado',
		]);

		DB::table('shipping_status')->insert([
			'name' => 'En camino',
		]);

		DB::table('shipping_status')->insert([
			'name' => 'Entregado',
		]);

	}
}
