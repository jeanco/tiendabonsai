<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Categorías de atributos
		DB::table('categories_attributes')->insert([
			'name' => 'Marca',
			'slug' => 'marca',
			'published' => 1,
		]);
		DB::table('categories_attributes')->insert([
			'name' => 'Capacidad',
			'slug' => 'capacidad',
			'published' => 1,
		]);
		DB::table('categories_attributes')->insert([
			'name' => 'Color',
			'slug' => 'color',
			'published' => 1,
		]);
		DB::table('categories_attributes')->insert([
			'name' => 'Potencia',
			'slug' => 'potencia',
			'published' => 1,
		]);

		// Atributos de Marca
		DB::table('attributes')->insert([
			'name' => 'Sony',
			'slug' => 'sony',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'LG',
			'slug' => 'lg',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Samsung',
			'slug' => 'samsung',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Panasonic',
			'slug' => 'panasonic',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Daewoo',
			'slug' => 'daewoo',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Aoc',
			'slug' => 'aoc',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Master-G',
			'slug' => 'master-g',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'IRT',
			'slug' => 'irt',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Aiwa',
			'slug' => 'aiwa',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Philips',
			'slug' => 'philips',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Advance',
			'slug' => 'advance',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Audiolab',
			'slug' => 'audiolab',
			'description' => '',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		DB::table('attributes')->insert([
			'name' => 'Otras Marcas',
			'slug' => 'otras-marcas',
			'description' => 'Otras Marcas',
			'category_attribute_id' => 1,
			'published' => 1,
		]);

		// Atributos para Capacidad
		// En Lavadoras
		DB::table('attributes')->insert([
			'name' => '11 Kg.',
			'slug' => '11-kg',
			'description' => '11 Kg.',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		// En Refrigeradoras
		DB::table('attributes')->insert([
			'name' => '120 Lt.',
			'slug' => '120-lt',
			'description' => '120 Lt.',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		// En Cocinas
		DB::table('attributes')->insert([
			'name' => '2 Hornillas',
			'slug' => '2-hornillas',
			'description' => '2 Hornillas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '4 Hornillas',
			'slug' => '4-hornillas',
			'description' => '4 Hornillas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '5 Hornillas',
			'slug' => '5-hornillas',
			'description' => '5 Hornillas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '6 Hornillas',
			'slug' => '6-hornillas',
			'description' => '6 Hornillas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		// En Hornos microondas
		DB::table('attributes')->insert([
			'name' => '20 Lt.',
			'slug' => '20-lt',
			'description' => '20 litros',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		// En Televisores
		DB::table('attributes')->insert([
			'name' => '32"',
			'slug' => '32',
			'description' => '32 pulgadas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '40"',
			'slug' => '40',
			'description' => '40 pulgadas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '49"',
			'slug' => '49',
			'description' => '49 pulgadas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => '55"',
			'slug' => '55',
			'description' => '55 pulgadas',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		// En aspiradoras
		DB::table('attributes')->insert([
			'name' => 'Bolsa"',
			'slug' => 'bolsa',
			'description' => 'Bolsa',
			'category_attribute_id' => 2,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Tanque"',
			'slug' => 'tanque',
			'description' => 'Tanque',
			'category_attribute_id' => 2,
			'published' => 1,
		]);

		// Atributos de Colores
		DB::table('attributes')->insert([
			'name' => 'Blanco',
			'slug' => 'blanco',
			'description' => 'blanco',
			'category_attribute_id' => 3,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Silver',
			'slug' => 'silver',
			'description' => 'silver',
			'category_attribute_id' => 3,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Negro',
			'slug' => 'negro',
			'description' => 'negro',
			'category_attribute_id' => 3,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Cromado',
			'slug' => 'cromado',
			'description' => 'cromado',
			'category_attribute_id' => 3,
			'published' => 1,
		]);
		DB::table('attributes')->insert([
			'name' => 'Otros colores',
			'slug' => 'otros-colores',
			'description' => 'otros-colores',
			'category_attribute_id' => 3,
			'published' => 1,
		]);

		// Atributos de Potencia
		DB::table('attributes')->insert([
			'name' => '1000 watts',
			'slug' => '1000-watts',
			'description' => '1000 watts de potencia',
			'category_attribute_id' => 4,
			'published' => 1,
		]);
	}
}
