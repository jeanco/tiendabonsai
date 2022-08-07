<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('currencies')->delete();
        
        DB::table('currencies')->insert([
            'name' => 'Nuevo Soles',
            'code' => 'PEN',
            'symbol' => 'S/.',
            'description' => 'Moneda peruana',
            'default_currency' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'country_id' => 1,
            'active' => true,
            'decimal' =>true,
        ]);

        DB::table('currencies')->insert([
            'name' => 'Peso Chileno',
            'code' => 'CLP',
            'symbol' => '$.',
            'description' => 'Moneda chilena',
            'default_currency' => 0,
            'user_id' => 1,
            'company_id' => 1,
            'country_id' => 2,
            'active' => true,
            'decimal' =>false,
        ]);

    }
}
