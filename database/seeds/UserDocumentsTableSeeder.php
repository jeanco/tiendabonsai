<?php

use Illuminate\Database\Seeder;

class UserDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_type_documents')->insert([
            'name' => 'DNI',
            'description' => 'Documento de Identidad Peruana',
        ]);
        DB::table('user_type_documents')->insert([
            'name' => 'RUC',
            'description' => 'Registro Unico de Contribuyente en PERÚ',
        ]);
        DB::table('user_type_documents')->insert([
            'name' => 'RUT',
            'description' => 'Registro Unico Tributario en CHILE',
        ]);
        DB::table('user_type_documents')->insert([
            'name' => 'Pasaporte',
            'description' => 'Pasaporte Internacional',
        ]);
        DB::table('user_type_documents')->insert([
            'name' => 'Carnet de Extranjería',
            'description' => 'Carnet Internacional',
        ]);

    }
}
