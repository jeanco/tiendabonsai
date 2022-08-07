<?php

use Illuminate\Database\Seeder;
use App\TransportCompany;
class tramsportCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {   
       
        DB::table('transport_companies')->delete();
        //PAIS
        $transport = TransportCompany::create([
            'name' => 'Flores',
            /*'slug' => str_slug('peru')*/
        ]);
        $transport = TransportCompany::create([
            'name' => 'Olva Currier',
            /*'slug' => str_slug('peru')*/
        ]);

        $transport = TransportCompany::create([
            'name' => 'Pavill',
            /*'slug' => str_slug('peru')*/
        ]);

        $transport = TransportCompany::create([
            'name' => 'Yo Pido',
            /*'slug' => str_slug('peru')*/
        ]);
       

    }
}
