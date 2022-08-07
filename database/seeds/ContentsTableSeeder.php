<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('contents')->insert([
			'content' => '¿Como ser un profesional existoso!?',
			'resource' =>'https://www.youtube.com/watch?v=GOKrCp-3kRk',
			'resource_path' => '',
			'resource_thumb' => '',
			'resource_thumb_path' => '',
			'model_id' =>1,
			'model_type' => 1,
			'type' =>2,
		]);
    }
}
