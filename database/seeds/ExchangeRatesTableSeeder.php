<?php

use Illuminate\Database\Seeder;

class ExchangeRatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exchange_rates')->insert([
            'sales_exchange' => 1,
            'currency_id' => 1,
            'user_id' => 1,
            'active' => true,
        ]);

        DB::table('exchange_rates')->insert([
          'sales_exchange' => 200,
          'currency_id' => 2,
          'user_id' => 1,
          'active' => true,
        ]);

    }
}
