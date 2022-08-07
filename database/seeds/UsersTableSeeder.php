<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
      'username' => 'admin',
      'password' => bcrypt('admin'),
			'first_name' => 'Noveltie',
			'last_name' => 'Company',
			'email' => 'servicios@noveltie.la',
			'activated' => true,
			'cel' => '952949785',
			'address' =>'Tacna',
			'user_image'=>'',
			'user_image_path' =>'',
			'user_image_thumb' =>'',
			'user_image_thumb_path'=>'',
			'user_type' => 1,
			'company_id'=>1,
			'country_id'=>1,
			'city_id'=>1,
        ]);
    }
}
