<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;
use App\Province;
use App\District;

class RegionsChileTableSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {

      $country = Country::create([
          'name' => 'Chile'
      ]);

          // City son las Regiones de Chile
          // Region 1
          $department = City::create([
              'name' => 'Región Arica y Parinacota',
              'country_id' => $country->id
          ]);

              // Es la misma region por ahora
              $province = Province::create([
                  'name' => 'Arica y Parinacota',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                    // Son las comunas de toda la region (de sus provincias)
                    District::create([
                        'name' => 'Arica',
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    District::create([
                        'name' => 'Camarones',
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    District::create([
                        'name' => 'General Lagos',
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    District::create([
                        'name' => 'Putre',
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

          $department = City::create([
              'name' => 'Región Tarapacá',
              'country_id' => $country->id
          ]);

              $province = Province::create([
                  'name' => 'Iquique',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Alto Hospicio',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Iquique',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'El Tamarugal',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Camiña',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Colchane',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Huara',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Pica',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Pozo Almonte',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

          $department = City::create([
              'name' => 'Región Antofagasta',
              'country_id' => $country->id
          ]);

              $province = Province::create([
                  'name' => 'Antofagasta',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Antofagasta',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Mejillones',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Sierra Gorda',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Taltal',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'El Loa',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Calama',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Ollagüe',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'San Pedro de Atacama',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Tocopilla',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'María Elena',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

                  District::create([
                      'name' => 'Tocopilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

          $department = City::create([
              'name' => 'Región Atacama',
              'country_id' => $country->id
          ]);

              // Es la misma region por ahora
              $province = Province::create([
                  'name' => 'Chañaral',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Chañaral',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Diego de Almagro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);


              $province = Province::create([
                  'name' => 'Copiapó',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Caldera',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Copiapó',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Tierra Amarilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Huasco',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Alto del Carmen',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Freirina',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Huasco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Vallenar',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);


          $department = City::create([
              'name' => 'Región Coquimbo',
              'country_id' => $country->id
          ]);

              $province = Province::create([
                  'name' => 'Choapa',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Canela',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Illapel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Vilos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Salamanca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Elqui',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Andacollo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Coquimbo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Higuera',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Serena',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Paihuano',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Vicuña',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Limarí',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Combarbalá',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Monte Patria',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ovalle',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Punitaqui',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Hurtado',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

          $department = City::create([
              'name' => 'Región Valparaíso',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Isla de Pascua',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Isla de Pascua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Los Andes',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Calle Larga',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Andes',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Rinconada',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Esteban',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Petorca',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Cabildo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Ligua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Papudo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Petorca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Zapallar',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'Quillota',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Hijuelas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Calera',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Cruz',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Nogales',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quillota',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

              $province = Province::create([
                  'name' => 'San Antonio',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Algarrobo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cartagena',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'El Quisco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'El Tabo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Antonio',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santo Domingo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'San Felipe de Aconcagua',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Catemu',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Llay-Llay',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Panquehue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Putaendo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Felipe',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santa María',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Valparaíso',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Casablanca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Concón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Juan Fernández',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puchuncaví',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quintero',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Valparaíso',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Viña del Mar',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Marga',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Limache',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Olmué',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quilpué',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Villa Alemana',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //

          $department = City::create([
              'name' => 'Región Metropolitana de Santiago',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Chacabuco',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Colina',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lampa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Til Til',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Cordillera',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Pirque',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puente Alto',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San José de Maipo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Maipo',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Buin',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Calera de Tango',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Paine',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Bernardo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Melipilla',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Alhué',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curacaví',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'María Pinto',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Melipilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Pedro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Santiago',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Cerrillos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cerro Navia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Conchalí',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'El Bosque',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Estación Central',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Huechuraba',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Independencia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Cisterna',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Granja',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Florida',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Pintana',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Reina',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Las Condes',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lo Barnechea',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lo Espejo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lo Prado',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Macul',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Maipú',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ñuñoa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pedro Aguirre Cerda',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Peñalolén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Providencia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pudahuel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quilicura',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quinta Normal',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Recoleta',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Renca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Miguel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Joaquín',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Ramón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santiago',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Vitacura',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Talagante',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'El Monte',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Isla de Maipo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Padre Hurtado',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Peñaflor',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Talagante',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región del Libertador General Bernardo O Higgins',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Cachapoal',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Codegua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Coinco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Coltauco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Doñihue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Graneros',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Las Cabras',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Machalí',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Malloa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Mostazal',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Olivar',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Peumo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pichidegua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quinta de Tilcoco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Rancagua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Rengo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Requínoa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Vicente de Tagua Tagua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Cardenal Caro',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'La Estrella',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Litueche',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Marchigüe',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Navidad',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Paredones',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pichilemu',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Colchagua',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Chépica',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Chimbarongo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lolol',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Nancagua',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Palmilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Peralillo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Placilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pumanque',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Fernando',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santa Cruz',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

          $department = City::create([
              'name' => 'Región del Maule',
              'country_id' => $country->id
          ]);

              $province = Province::create([
                  'name' => 'Cauquenes',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Cauquenes',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Chanco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pelluhue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Curicó',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Curicó',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Hualañé',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Licantén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Molina',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Rauco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Romeral',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Sagrada Familia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Teno',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Vichuquén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Linares',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Colbún',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Linares',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Longaví',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Parral',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Retiro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Javier',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Villa Alegre',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Yerbas Buenas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Talca',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Constitución',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curepto',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Empedrado',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Maule',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pelarco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pencahue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Claro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Clemente',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Rafael',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Talca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de Ñuble',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Itata',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Cobquecura',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Coelemu',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ninhue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Portezuelo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quirihue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ránquil',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Trehuaco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Diguillín',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Bulnes',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Chillán Viejo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Chillán',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'El Carmen',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pemuco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pinto',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quillón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Ignacio',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Yungay',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Punilla',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Coihueco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ñiquén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Carlos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Fabián',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Nicolás',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región del Biobío',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Arauco',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Arauco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cañete',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Contulmo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curanilahue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lebu',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Álamos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Tirúa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Biobío',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Alto Biobío',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Antuco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cabrero',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Laja',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Ángeles',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Mulchén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Nacimiento',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Negrete',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quilaco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quilleco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Rosendo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santa Bárbara',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Tucapel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Yumbel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Concepción',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Chiguayante',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Concepción',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Coronel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Florida',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Hualpén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Hualqui',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lota',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Penco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Pedro de la Paz',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Santa Juana',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Talcahuano',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Tomé',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de La Araucanía',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Cautín',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Carahue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cholchol',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cunco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curarrehue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Freire',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Galvarino',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Gorbea',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lautaro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Loncoche',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Melipeuco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Nueva Imperial',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Padre Las Casas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Perquenco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pitrufquén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Pucón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puerto Saavedra',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Temuco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Teodoro Schmidt',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Toltén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Vilcún',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Villarrica',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Malleco',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Angol',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Collipulli',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curacautín',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Ercilla',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lonquimay',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Sauces',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lumaco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Purén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Renaico',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Traiguén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Victoria',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de Los Ríos',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Valdivia',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Corral',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lanco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Lagos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Máfil',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Mariquina',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Paillaco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Panguipulli',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Valdivia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Ranco',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Futrono',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'La Unión',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lago Ranco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Bueno',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de Los Lagos',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Chiloé',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Ancud',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Castro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Chonchi',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Curaco de Vélez',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Dalcahue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puqueldón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Queilén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quemchi',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quellón',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Quinchao',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Llanquihue',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Calbuco',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cochamó',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Fresia',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Frutillar',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Llanquihue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Los Muermos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Maullín',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puerto Montt',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puerto Varas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Osorno',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Osorno',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puerto Octay',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Purranque',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Puyehue',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Negro',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Juan de la Costa',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Pablo',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Palena',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Chaitén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Futaleufú',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Hualaihué',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Palena',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de Aysén del General Carlos Ibáñez del Campo',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Aysén',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Aysén',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cisnes',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Guaitecas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Provincia Capitán Prat',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Cochrane',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'O Higgins',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Tortel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Provincia de Coyhaique',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Coyhaique',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Lago Verde',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Provincia General Carrera',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Chile Chico',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Ibáñez',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
          //
          $department = City::create([
              'name' => 'Región de Magallanes y de la Antártica Chilena',
              'country_id' => $country->id
          ]);
              //
              $province = Province::create([
                  'name' => 'Antártica Chilena',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Antártica',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Cabo de Hornos',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Magallanes',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Laguna Blanca',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Punta Arenas',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Río Verde',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'San Gregorio',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Tierra del Fuego',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Porvenir',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Primavera',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Timaukel',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
              //
              $province = Province::create([
                  'name' => 'Última Esperanza',
                  'city_id' => $department->id,
                  'country_id' => $country->id, //Chile
              ]);

                  District::create([
                      'name' => 'Natales',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);
                  District::create([
                      'name' => 'Torres del Paine',
                      'province_id' => $province->id,
                      'city_id' => $department->id,
                  ]);

    }
}
