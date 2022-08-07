<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		DB::table('posts')->insert([
  			'title' => 'Tema 1',
  			'slug' =>'tema-1',
  			'content' => "Lorem Ipsum es ssum ha sido el tte ies contenian pasajes d, como por ejemplo Aldus PageMaker, el cual iones de Lorem Ipsum.",
  			'published' =>1,
  		]);

  		DB::table('posts')->insert([
  			'title' => 'Tema 2',
  			'slug' =>'tema-2',
  			'content' => "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de temprenta) desconocido usó una galeríasobrevivió 500 años, sino dando eseontenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual ince Lorem Ipsum.",
  			'published' =>1,
  		]);

  		DB::table('posts')->insert([
  			'title' => 'Tema 3',
  			'slug' =>'tema-3',
  			'content' => "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de temprenta) desconocido usó una galeríasobrevivió 500 años, sino dando eseontenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual ince Lorem Ipsum.",
  			'published' =>1,
  		]);

  		DB::table('posts')->insert([
  			'title' => 'Tema 4',
  			'slug' =>'tema-4',
  			'content' => "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de temprenta) desconocido usó una galeríasobrevivió 500 años, sino dando eseontenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual ince Lorem Ipsum.",
  			'published' =>1,
  		]);
    }
}
