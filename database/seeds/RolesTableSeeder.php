<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        // id=1
        DB::table('roles')->insert([
            'name' => 'super-administrador',
            'display_name' => 'Super Administrador',
        ]);
        // id=2
        DB::table('roles')->insert([
            'name' => 'administrador',
            'display_name' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'name' => 'administrador-empresario',
            'display_name' => 'Administrador Empresario',
        ]);

        // id=3
        DB::table('roles')->insert([
            'name' => 'jefe-de-ventas',
            'display_name' => 'Jefe de Ventas',
        ]);
        // id=4
        DB::table('roles')->insert([
            'name' => 'ejecutivo-de-ventas',
            'display_name' => 'Ejecutivo de ventas',
        ]);

    }
}
