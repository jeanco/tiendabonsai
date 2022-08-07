<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projects')->insert([
          'name' => 'template_5',
          'path' => 'template_5',
          'status' => 1,
        ]);
        DB::table('projects')->insert([
          'name' => 'website',
          'path' => 'website',
          'status' => 0,
        ]);

    }
}
