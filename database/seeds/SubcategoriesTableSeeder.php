<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('subcategories')->insert([
			'name' => 'Subcategoria',
			'slug' => 'subcategoria',
			'content' => '-----',
			'published' => 1,
			'category_id' => 1,
		]);

	}
}
