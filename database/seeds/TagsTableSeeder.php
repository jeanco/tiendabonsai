<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		DB::table('tags_posts')->insert([
  			'name' => 'Noticias',
        'slug' => 'noticias',
  		]);

      DB::table('tags_posts')->insert([
  			'name' => 'Eventos',
        'slug' => 'eventos',
  		]);

    }
}
