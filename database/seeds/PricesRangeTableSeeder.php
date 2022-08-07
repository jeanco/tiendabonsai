<?php

use Illuminate\Database\Seeder;

class PricesRangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prices_range')->insert([
          'start' => 1,
          'end' => 9,
          'published' => 1,
        ]);
        DB::table('prices_range')->insert([
          'start' => 9,
          'end' => 199,
          'published' => 1,
        ]);
        DB::table('prices_range')->insert([
          'start' => 199,
          'end' => 1999,
          'published' => 1,
        ]);
        DB::table('prices_range')->insert([
          'start' => 1999,
          'end' => 4999.90,
          'published' => 1,
        ]);

    }
}
