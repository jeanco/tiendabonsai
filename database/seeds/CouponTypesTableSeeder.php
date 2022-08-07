<?php

use Illuminate\Database\Seeder;

class CouponTypesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('coupon_types')->delete();

		DB::table('coupon_types')->insert([
			'name' => 'Descuento Monto Total',
			'is_by_percentage' => 0, // true 1 = significa que el descuento es valor monto
		]);

		/*
		DB::table('coupon_types')->insert([
			'name' => 'Descuento por Porcentaje Global',
			'is_by_percentage' => 1,
		]);
		*/
	}
}
