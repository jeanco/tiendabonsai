<?php

use Illuminate\Database\Seeder;

class CampaingCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('campaign_categories')->insert([
          'name' => 'Banner Principal',
          'published' => 1,
        ]);
        DB::table('campaign_categories')->insert([
          'name' => 'Banner Promocionales',
          'published' => 1,
        ]);

    }
}
