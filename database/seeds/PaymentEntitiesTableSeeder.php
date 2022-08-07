<?php

use Illuminate\Database\Seeder;

class PaymentEntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payment_ways')->insert([
        'name' => 'En Efectivo',
      ]);
      DB::table('payment_ways')->insert([
        'name' => 'Depósito o Transferencia',
      ]);
      DB::table('payment_ways')->insert([
        'name' => 'Pago en línea',
      ]);
       DB::table('payment_ways')->insert([
        'name' => 'Otros',
      ]);


      //Entidades de Pago
      //Tienda fisica
      DB::table('payment_entities')->insert([
          'name' => 'Tienda física',
          'logo' => 'https://dl.dropboxusercontent.com/s/c61svsmsgql22n8/dinero.png?dl=0',
          //'type' => 1,
          'description' => 'Tienda física para el pago en efectivo',
      ]);
      //Bancos
        DB::table('payment_entities')->insert([
            'name' => 'Banco de Crédito del Perú - BCP',
            'logo' => 'https://dl.dropboxusercontent.com/s/ioshldw0yqixjn1/bcp.png?dl=0',
            //'type' => 1,
            'description' => 'Banco de Crédito del Perú.',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco Interbank',
            'logo' => 'https://dl.dropboxusercontent.com/s/dj60y118ziq0g5r/interbank.png?dl=0',
            //'type' => 1,
            'description' => 'Banco Interbank',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco Scotiabank',
            'logo' => 'https://dl.dropboxusercontent.com/s/1x986mxtcb0byyv/Scotiabank.png?dl=0',
            'description' => 'The Bank of Nova Scotia',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco BBVA Continental',
            'logo' => 'https://dl.dropboxusercontent.com/s/s5ktr0m8nf3n9ca/bbva.png?dl=0',
            //'type' => 1,
            'description' => 'Grupo BBVA Continental',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco Financiero',
            'logo' => 'https://dl.dropboxusercontent.com/s/mf86nx57uf6mbln/logo-banco-financiero.jpg',
            //'type' => 1,
            'description' => 'Banco Financiero',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco de la Nación',
            'logo' => 'https://dl.dropboxusercontent.com/s/5dfcg74r66ld9j8/logo-banco-nacion.png?dl=0',
            //'type' => 1,
            'description' => 'Banco de la Nación - Perú',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'Banco BanBif',
            'logo' => 'https://dl.dropboxusercontent.com/s/961gdocgfeyg6y8/banbif.png?dl=0',
            //'type' => 1,
            'description' => 'Banco Interamericano de Finanzas',
        ]);

        //servicios Financieros
        DB::table('payment_entities')->insert([
            'name' => 'Western Union',
            'logo' => 'https://dl.dropboxusercontent.com/s/ugvyb0desnl9soa/wu.png?dl=0',
            //'type' => 2,
            'description' => 'The Western Union Company',
        ]);
        DB::table('payment_entities')->insert([
            'name' => 'MoneyGram',
            'logo' => 'https://dl.dropboxusercontent.com/s/sl1b99vqr84nbkr/moneygram.png?dl=0',
            //'type' => 2,
            'description' => 'MoneyGram International Inc.',
        ]);

        //servicios de Caja
        DB::table('payment_entities')->insert([
            'name' => 'Caja Arequipa',
            'logo' => 'https://dl.dropboxusercontent.com/s/rdh0jxie9o82qk8/caja-arequipa-logo.png?dl=0',
            //'type' => 3,
            'description' => 'Caja Arequipa',
        ]);

         //envios pago contra entrega
        DB::table('payment_entities')->insert([
            'name' => 'Envios Pago contra Entrega',
            'logo' => 'https://dl.dropboxusercontent.com/s/sxpmkl2iaj6v9h8/entrega.png?dl=0',
            //'type' => 3,
            'description' => 'Envios Pago contra Entrega',
        ]);

        //Pasarela de pago
        DB::table('payment_entities')->insert([
            'name' => 'Tarjeta de Crédito o Débito',
            'logo' => 'https://dl.dropboxusercontent.com/s/adzz33dbk647se3/banner_pagos.png?dl=0',
            //'type' => 3,
            'description' => 'Tarjeta de Crédito o Débito',
        ]);

        //Pago Yape
        DB::table('payment_entities')->insert([
            'name' => 'Yape',
            'logo' => 'https://dl.dropboxusercontent.com/s/jpywhd3nnvimcql/yape.png?dl=0',
            //'type' => 3,
            'description' => 'Forma de Pago Online YAPE',
        ]);

    }
}
