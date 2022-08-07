<?php

use Illuminate\Database\Seeder;

class TypePlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		DB::table('place_types')->insert([
  			'name' => 'Tienda Fisica',
        'description' => 'Tienda fisica',
  		]);

      DB::table('place_types')->insert([
  			'name' => 'Almacén',
        'description' => 'Almacén',
  		]);

      DB::table('place_types')->insert([
  			'name' => 'Distribuidor',
        'description' => 'Distribuidor',
  		]);

    }
}
