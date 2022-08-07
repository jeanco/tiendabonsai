<?php

use Illuminate\Database\Seeder;

class CompanyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('company_categories')->insert([
          'name' => 'Textiles',
          'slug' => 'textiles',
          'description' => 'descripcion',
          'published' => 1,
        ]);
        DB::table('company_categories')->insert([
          'name' => 'Tecnologia',
          'slug' => 'tecnologia',
          'description' => 'descripcion',
          'published' => 1,
        ]);
        DB::table('company_categories')->insert([
          'name' => 'Servicios',
          'slug' => 'servicios',
          'description' => 'descripcion',
          'published' => 1,
        ]);
        DB::table('company_categories')->insert([
          'name' => 'Salud',
          'slug' => 'salud',
          'description' => 'descripcion',
          'published' => 1,
        ]);

    }
}
