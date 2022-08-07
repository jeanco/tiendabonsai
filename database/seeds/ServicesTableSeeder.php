<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('services')->insert([
			'name' => 'Servicio 1',
			'slug' => 'servicio-1',
			'description' => 'Servicio 1.',
			'image' => 'http://lorempixel.com/600/400/city/',
			'image_path' => 'http://lorempixel.com/600/400/city/',
			'image_thumb' => 'http://lorempixel.com/600/400/city/',
			'image_thumb_path' => 'http://lorempixel.com/600/400/city/',
			'published' => 1,
		]);

		DB::table('services')->insert([
			'name' => 'Servicio 2',
			'slug' => 'servicio-2',
			'description' => 'Servicio 2.',
      		'image' => 'http://lorempixel.com/600/400/city/',
			'image_path' => 'http://lorempixel.com/600/400/city/',
			'image_thumb' => 'http://lorempixel.com/600/400/city/',
			'image_thumb_path' => 'http://lorempixel.com/600/400/city/',
			'published' => 1,
		]);
    }
}
