<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;

class CountriesTableSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        DB::table('cities')->delete();

        $country = Country::create([
            'name' => 'Perú'
        ]);

        City::create([
            'name' => 'Tacna',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Moquegua',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Amazonas',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Áncash',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Apurímac',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Arequipa',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Ayacucho',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Cajamarca',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Callao',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Cusco',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Huancavelica',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Huánuco',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Ica',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Junín',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'La Libertad',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Lambayeque',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Lima',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Loreto',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Madre de Dios',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Pasco',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Piura',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Puno',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'San Martín',
          'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Tumbes',
            'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Ucayali',
            'country_id' => $country->id
        ]);

        $country = Country::create([
            'name' => 'Chile'
        ]);

        City::create([
            'name' => 'Arica',
            'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Antofagasta',
            'country_id' => $country->id
        ]);

        City::create([
            'name' => 'Alto Hospicio',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Angol',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Ancud',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Casa Blanca',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Calama',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Copiapo',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Tocopilla',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'San Pedro de Atacama',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Vallenar',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'La Serena',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Vicuña',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Coquimbo',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Iquique',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Pozo al monte',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'San Antonio',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Puente Alto',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Talca',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'San Fernando',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Linares',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Chillan',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'San Carlos',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Los Angeles',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'San Pedro de la Paz',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Temuco',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Valdivia',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Los Lagos',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Osomo',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Puerto Varas',
            'country_id' => $country->id
        ]);
        City::create([
            'name' => 'Puerto Montt',
            'country_id' => $country->id
        ]);
    }
}
