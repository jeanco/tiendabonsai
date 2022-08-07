<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;
use App\Province;
use App\District;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('countries')->delete();
        DB::table('cities')->delete();
        DB::table('provinces')->delete();
        DB::table('districts')->delete();
        //PAIS
        $country = Country::create([
            'name' => 'Perú',
            /*'slug' => str_slug('peru')*/
        ]);
        //TACNA
        $department = City::create([
            'name' => 'Tacna',
            /*'slug' => str_slug('Tacna'),*/
            'country_id' => $country->id,
        ]);

        $province = Province::create([
            'name' => 'Tacna',
            /*'slug' => str_slug('Tacna'),*/
            'city_id' => $department->id,
            'country_id' => $country->id,
        ]);

        District::create([
            'name' => 'Tacna',
            /*'slug' => str_slug('Tacna'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

         District::create([
            'name' => 'Calana',
            /*'slug' => str_slug('Calana'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,        
        ]);

            District::create([
            'name' => 'Inclan',
            /*'slug' => str_slug('Inclan'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,    
             ]);
        

        District::create([
            'name' => 'Pachía',
            /*'slug' => str_slug('Pachia'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);
        

        District::create([
            'name' => 'Palca',
            /*'slug' => str_slug('Palca'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Pocollay',
            /*'slug' => str_slug('Pocollay'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Sama',
            /*'slug' => str_slug('Sama'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Alto de la Alianza',
            /*'slug' => str_slug('Alto de la Alianza'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Ciudad Nueva',
            /*'slug' => str_slug('Ciudad Nueva'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Coronel Gregorio Albarracín L.',
            /*'slug' => str_slug('Coronel Gregorio Albarracin L.'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        ///////////////////////////////////


        $province = Province::create([
            'name' => 'Tarata',
            /*'slug' => str_slug('Tarata'),*/
            'city_id' => $department->id,
            'country_id' => $country->id,
        ]);

        District::create([
            'name' => 'Tarata',
            /*'slug' => str_slug('Tarata'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Héroes Albarracin',
            /*'slug' => str_slug('Héroes Albarracin'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Estique',
            /*'slug' => str_slug('Estique'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Estique Pampa',
            /*'slug' => str_slug('Estique Pampa'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Sitajara',
            /*'slug' => str_slug('Sitajara'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Susapaya',
            /*'slug' => str_slug('Susapaya'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Tarucachi',
            /*'slug' => str_slug('Tarucachi'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Ticaco',
            /*'slug' => str_slug('Ticaco'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        //////////////////////////////////


        $province = Province::create([
            'name' => 'Jorge Basadre',
            /*'slug' => str_slug('Jorge Basadre'),*/
            'city_id' => $department->id,
            'country_id' => $country->id,
        ]);

        District::create([
            'name' => 'Locumba',
            /*'slug' => str_slug('Locumba'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Ite',
            /*'slug' => str_slug('Ite'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Ilabaya',
            /*'slug' => str_slug('Ilabaya'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);


        /////////////////////////

        $province = Province::create([
            'name' => 'Candarave',
            /*'slug' => str_slug('Candarave'),*/
            'city_id' => $department->id,
            'country_id' => $country->id,
        ]);

        District::create([
            'name' => 'Candarave',
            /*'slug' => str_slug('Candarave'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Cairani',
            /*'slug' => str_slug('Cairani'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Curibaya',
            /*'slug' => str_slug('Curibaya'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Huanuara',
            /*'slug' => str_slug('Huanuara'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Quilahuani',
            /*'slug' => str_slug('Quilahuani'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

        District::create([
            'name' => 'Camilaca',
            /*'slug' => str_slug('Camilaca'),*/
            'province_id' => $province->id,
            'city_id' => $department->id,
        ]);

    }
}
