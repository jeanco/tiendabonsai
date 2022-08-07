<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->insert([
			'name' => 'Categoria',
			'slug' => 'categoria',
			'content' => 'Estos productos estan dirigidos a un publico objetivo',
			'published' => 1,
		]);


    }
}
