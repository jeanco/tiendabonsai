<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('products')->insert([
			'name' => 'producto 1',
			'slug' => 'producto-1',
			'description' => 'Esta es la presentacion del perfil de un producto',
			'image' => 'http://lorempixel.com/600/400/city/',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 150,
			'price_promotion' => 40,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);

		DB::table('products')->insert([
			'name' => 'producto 2',
			'slug' => 'producto-2',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>2,
			'category_id' => 1,
			'price' => 60.49,
			'price_promotion' => 50.45,
			'promotion_available' => true,
			'user_id' => 1,
			'published' =>1,
		]);

		DB::table('products')->insert([
			'name' => 'producto 3',
			'slug' => 'producto-3',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 50.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);

		DB::table('products')->insert([
			'name' => 'producto 7',
			'slug' => 'producto-7',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 55.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 8',
			'slug' => 'producto-8',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 2,
			'price' => 53.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 9',
			'slug' => 'producto-9',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>2,
			'category_id' => 2,
			'price' => 53.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 10',
			'slug' => 'producto-10',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 2,
			'price' => 50.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 11',
			'slug' => 'producto-11',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 50.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 12',
			'slug' => 'producto-12',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 45.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 13',
			'slug' => 'producto-13',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 48.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);
		DB::table('products')->insert([
			'name' => 'producto 14',
			'slug' => 'producto-14',
			'description' => 'Esta es la presentacion del perfil de un producto',
			//'image' => 'http://cdn.bulbagarden.net/upload/thumb/0/02/Blasty.png/230px-Blasty.png',
			'published' => 1,
			'subcategory_id' =>1,
			'category_id' => 1,
			'price' => 40.00,
			'price_promotion' => 40.00,
			'promotion_available' => false,
			'user_id' => 1,
			'published' =>1,
		]);

    }
}
