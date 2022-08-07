<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;
use App\Province;
use App\District;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Amazonas //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Amazonas',
            /*'slug' => str_slug('Amazonas'),*/
            'country_id' => 1, //Peru
        ]);

              // Chachapoyas ====================================
              $province = Province::create([
                  'name' => 'Chachapoyas',
                  /*'slug' => str_slug('Chachapoyas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chachapoyas
                    District::create([
                        'name' => 'Chachapoyas',
                        /*'slug' => str_slug('Chachapoyas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Asunción
                    District::create([
                        'name' => 'Asunción',
                        /*'slug' => str_slug('Asunción'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Balsas
                    District::create([
                        'name' => 'Balsas',
                        /*'slug' => str_slug('Balsas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cheto
                    District::create([
                        'name' => 'Cheto',
                        /*'slug' => str_slug('Cheto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chiliquin
                    District::create([
                        'name' => 'Chiliquin',
                        /*'slug' => str_slug('Chiliquin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chuquibamba
                    District::create([
                        'name' => 'Chuquibamba',
                        /*'slug' => str_slug('Chuquibamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Granada
                    District::create([
                        'name' => 'Granada',
                        /*'slug' => str_slug('Granada'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancas
                    District::create([
                        'name' => 'Huancas',
                        /*'slug' => str_slug('Huancas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Jalca
                    District::create([
                        'name' => 'La Jalca',
                        /*'slug' => str_slug('La Jalca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Leimebamba
                    District::create([
                        'name' => 'Leimebamba',
                        /*'slug' => str_slug('Leimebamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Levanto
                    District::create([
                        'name' => 'Levanto',
                        /*'slug' => str_slug('Levanto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Magdalena
                    District::create([
                        'name' => 'Magdalena',
                        /*'slug' => str_slug('Magdalena'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariscal Castilla
                    District::create([
                        'name' => 'Mariscal Castilla',
                        /*'slug' => str_slug('Mariscal Castilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Molinopampa
                    District::create([
                        'name' => 'Molinopampa',
                        /*'slug' => str_slug('Molinopampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Montevideo
                    District::create([
                        'name' => 'Montevideo',
                        /*'slug' => str_slug('Montevideo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Olleros
                    District::create([
                        'name' => 'Olleros',
                        /*'slug' => str_slug('Olleros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quinjalca
                    District::create([
                        'name' => 'Quinjalca',
                        /*'slug' => str_slug('Quinjalca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Daguas
                    District::create([
                        'name' => 'San Francisco de Daguas',
                        /*'slug' => str_slug('San Francisco de Daguas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Isidro de Maino
                    District::create([
                        'name' => 'San Isidro de Maino',
                        /*'slug' => str_slug('San Isidro de Maino'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Soloco
                    District::create([
                        'name' => 'Soloco',
                        /*'slug' => str_slug('Soloco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sonche
                    District::create([
                        'name' => 'Sonche',
                        /*'slug' => str_slug('Sonche'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Bagua ====================================
              $province = Province::create([
                  'name' => 'Bagua',
                  /*'slug' => str_slug('Bagua'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Bagua
                    District::create([
                        'name' => 'Bagua',
                        /*'slug' => str_slug('Bagua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aramango
                    District::create([
                        'name' => 'Aramango',
                        /*'slug' => str_slug('Aramango'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Copallin
                    District::create([
                        'name' => 'Copallin',
                        /*'slug' => str_slug('Copallin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Parco
                    District::create([
                        'name' => 'El Parco',
                        /*'slug' => str_slug('El Parco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Imaza
                    District::create([
                        'name' => 'Imaza',
                        /*'slug' => str_slug('Imaza'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Peca
                    District::create([
                        'name' => 'La Peca',
                        /*'slug' => str_slug('La Peca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Bongará ====================================
              $province = Province::create([
                  'name' => 'Bongará',
                  /*'slug' => str_slug('Bongará'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Jumbilla
                    District::create([
                        'name' => 'Jumbilla',
                        /*'slug' => str_slug('Jumbilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chisquilla
                    District::create([
                        'name' => 'Chisquilla',
                        /*'slug' => str_slug('Chisquilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Churuja
                    District::create([
                        'name' => 'Churuja',
                        /*'slug' => str_slug('Churuja'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Corosha
                    District::create([
                        'name' => 'Corosha',
                        /*'slug' => str_slug('Corosha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cuispes
                    District::create([
                        'name' => 'Cuispes',
                        /*'slug' => str_slug('Cuispes'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Florida
                    District::create([
                        'name' => 'Florida',
                        /*'slug' => str_slug('Florida'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jazan
                    District::create([
                        'name' => 'Jazan',
                        /*'slug' => str_slug('Jazan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Recta
                    District::create([
                        'name' => 'Recta',
                        /*'slug' => str_slug('Recta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Carlos
                    District::create([
                        'name' => 'San Carlos',
                        /*'slug' => str_slug('San Carlos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Shipasbamba
                    District::create([
                        'name' => 'Shipasbamba',
                        /*'slug' => str_slug('Shipasbamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Valera
                    District::create([
                        'name' => 'Valera',
                        /*'slug' => str_slug('Valera'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yambrasbamba
                    District::create([
                        'name' => 'Yambrasbamba',
                        /*'slug' => str_slug('Yambrasbamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Condorcanqui ====================================
              $province = Province::create([
                  'name' => 'Condorcanqui',
                  /*'slug' => str_slug('Condorcanqui'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Nieva
                    District::create([
                        'name' => 'Nieva',
                        /*'slug' => str_slug('Nieva'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Cenepa
                    District::create([
                        'name' => 'El Cenepa',
                        /*'slug' => str_slug('El Cenepa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Río Santiago
                    District::create([
                        'name' => 'Río Santiago',
                        /*'slug' => str_slug('Río Santiago'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Luya ====================================
              $province = Province::create([
                  'name' => 'Luya',
                  /*'slug' => str_slug('Luya'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Lamud
                    District::create([
                        'name' => 'Lamud',
                        /*'slug' => str_slug('Lamud'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Camporredondo
                    District::create([
                        'name' => 'Camporredondo',
                        /*'slug' => str_slug('Camporredondo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cocabamba
                    District::create([
                        'name' => 'Cocabamba',
                        /*'slug' => str_slug('Cocabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colcamar
                    District::create([
                        'name' => 'Colcamar',
                        /*'slug' => str_slug('Colcamar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Conila
                    District::create([
                        'name' => 'Conila',
                        /*'slug' => str_slug('Conila'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Inguilpata
                    District::create([
                        'name' => 'Inguilpata',
                        /*'slug' => str_slug('Inguilpata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Longuita
                    District::create([
                        'name' => 'Longuita',
                        /*'slug' => str_slug('Longuita'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lonya Chico
                    District::create([
                        'name' => 'Lonya Chico',
                        /*'slug' => str_slug('Lonya Chico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Luya
                    District::create([
                        'name' => 'Luya',
                        /*'slug' => str_slug('Luya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Luya Viejo
                    District::create([
                        'name' => 'Luya Viejo',
                        /*'slug' => str_slug('Luya Viejo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // María
                    District::create([
                        'name' => 'María',
                        /*'slug' => str_slug('María'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocalli
                    District::create([
                        'name' => 'Ocalli',
                        /*'slug' => str_slug('Ocalli'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocumal
                    District::create([
                        'name' => 'Ocumal',
                        /*'slug' => str_slug('Ocumal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pisuquia
                    District::create([
                        'name' => 'Pisuquia',
                        /*'slug' => str_slug('Pisuquia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Providencia
                    District::create([
                        'name' => 'Providencia',
                        /*'slug' => str_slug('Providencia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Cristóbal
                    District::create([
                        'name' => 'San Cristóbal',
                        /*'slug' => str_slug('San Cristóbal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Yeso
                    District::create([
                        'name' => 'San Francisco de Yeso',
                        /*'slug' => str_slug('San Francisco de Yeso'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Jerónimo
                    District::create([
                        'name' => 'San Jerónimo',
                        /*'slug' => str_slug('San Jerónimo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Lopecancha
                    District::create([
                        'name' => 'San Juan de Lopecancha',
                        /*'slug' => str_slug('San Juan de Lopecancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Catalina
                    District::create([
                        'name' => 'Santa Catalina',
                        /*'slug' => str_slug('Santa Catalina'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Tomas
                    District::create([
                        'name' => 'Santo Tomas',
                        /*'slug' => str_slug('Santo Tomas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tingo
                    District::create([
                        'name' => 'Tingo',
                        /*'slug' => str_slug('Tingo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Trita
                    District::create([
                        'name' => 'Trita',
                        /*'slug' => str_slug('Trita'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Rodríguez de Mendoza ====================================
              $province = Province::create([
                  'name' => 'Rodríguez de Mendoza',
                  /*'slug' => str_slug('Rodríguez de Mendoza'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Nicolás
                    District::create([
                        'name' => 'San Nicolás',
                        /*'slug' => str_slug('San Nicolás'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chirimoto
                    District::create([
                        'name' => 'Chirimoto',
                        /*'slug' => str_slug('Chirimoto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochamal
                    District::create([
                        'name' => 'Cochamal',
                        /*'slug' => str_slug('Cochamal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huambo
                    District::create([
                        'name' => 'Huambo',
                        /*'slug' => str_slug('Huambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Limabamba
                    District::create([
                        'name' => 'Limabamba',
                        /*'slug' => str_slug('Limabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Longar
                    District::create([
                        'name' => 'Longar',
                        /*'slug' => str_slug('Longar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariscal Benavides
                    District::create([
                        'name' => 'Mariscal Benavides',
                        /*'slug' => str_slug('Mariscal Benavides'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Milpuc
                    District::create([
                        'name' => 'Milpuc',
                        /*'slug' => str_slug('Milpuc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Omia
                    District::create([
                        'name' => 'Omia',
                        /*'slug' => str_slug('Omia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa
                    District::create([
                        'name' => 'Santa Rosa',
                        /*'slug' => str_slug('Santa Rosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Totora
                    District::create([
                        'name' => 'Totora',
                        /*'slug' => str_slug('Totora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vista Alegre
                    District::create([
                        'name' => 'Vista Alegre',
                        /*'slug' => str_slug('Vista Alegre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Utcubamba ====================================
              $province = Province::create([
                  'name' => 'Utcubamba',
                  /*'slug' => str_slug('Utcubamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Bagua Grande
                    District::create([
                        'name' => 'Bagua Grande',
                        /*'slug' => str_slug('Bagua Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cajaruro
                    District::create([
                        'name' => 'Cajaruro',
                        /*'slug' => str_slug('Cajaruro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cumba
                    District::create([
                        'name' => 'Cumba',
                        /*'slug' => str_slug('Cumba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Milagro
                    District::create([
                        'name' => 'El Milagro',
                        /*'slug' => str_slug('El Milagro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jamalca
                    District::create([
                        'name' => 'Jamalca',
                        /*'slug' => str_slug('Jamalca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lonya Grande
                    District::create([
                        'name' => 'Lonya Grande',
                        /*'slug' => str_slug('Lonya Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yamón
                    District::create([
                        'name' => 'Yamón',
                        /*'slug' => str_slug('Yamón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Áncash //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Áncash',
            /*'slug' => str_slug('Áncash'),*/
            'country_id' => 1, //Peru
        ]);

              // Huaraz ====================================
              $province = Province::create([
                  'name' => 'Huaraz',
                  /*'slug' => str_slug('Huaraz'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huaraz
                    District::create([
                        'name' => 'Huaraz',
                        /*'slug' => str_slug('Huaraz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochabamba
                    District::create([
                        'name' => 'Cochabamba',
                        /*'slug' => str_slug('Cochabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colcabamba
                    District::create([
                        'name' => 'Colcabamba',
                        /*'slug' => str_slug('Colcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanchay
                    District::create([
                        'name' => 'Huanchay',
                        /*'slug' => str_slug('Huanchay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Independencia
                    District::create([
                        'name' => 'Independencia',
                        /*'slug' => str_slug('Independencia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jangas
                    District::create([
                        'name' => 'Jangas',
                        /*'slug' => str_slug('Jangas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Libertad
                    District::create([
                        'name' => 'La Libertad',
                        /*'slug' => str_slug('La Libertad'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Olleros
                    District::create([
                        'name' => 'Olleros',
                        /*'slug' => str_slug('Olleros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampas Grande
                    District::create([
                        'name' => 'Pampas Grande',
                        /*'slug' => str_slug('Pampas Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pariacoto
                    District::create([
                        'name' => 'Pariacoto',
                        /*'slug' => str_slug('Pariacoto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pira
                    District::create([
                        'name' => 'Pira',
                        /*'slug' => str_slug('Pira'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tarica
                    District::create([
                        'name' => 'Tarica',
                        /*'slug' => str_slug('Tarica'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Aija ====================================
              $province = Province::create([
                  'name' => 'Aija',
                  /*'slug' => str_slug('Aija'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Aija
                    District::create([
                        'name' => 'Aija',
                        /*'slug' => str_slug('Aija'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coris
                    District::create([
                        'name' => 'Coris',
                        /*'slug' => str_slug('Coris'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacllán
                    District::create([
                        'name' => 'Huacllán',
                        /*'slug' => str_slug('Huacllán'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Merced
                    District::create([
                        'name' => 'La Merced',
                        /*'slug' => str_slug('La Merced'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Succha
                    District::create([
                        'name' => 'Succha',
                        /*'slug' => str_slug('Succha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Antonio Raymondi ====================================
              $province = Province::create([
                  'name' => 'Antonio Raymondi',
                  /*'slug' => str_slug('Antonio Raymondi'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Llamellin
                    District::create([
                        'name' => 'Llamellin',
                        /*'slug' => str_slug('Llamellin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aczo
                    District::create([
                        'name' => 'Aczo',
                        /*'slug' => str_slug('Aczo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // ChacchoChaccho
                    District::create([
                        'name' => 'ChacchoChaccho',
                        /*'slug' => str_slug('ChacchoChaccho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chingas
                    District::create([
                        'name' => 'Chingas',
                        /*'slug' => str_slug('Chingas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mirgas
                    District::create([
                        'name' => 'Mirgas',
                        /*'slug' => str_slug('Mirgas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Rontoy
                    District::create([
                        'name' => 'San Juan de Rontoy',
                        /*'slug' => str_slug('San Juan de Rontoy'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Asunción ====================================
              $province = Province::create([
                  'name' => 'Asunción',
                  /*'slug' => str_slug('Asunción'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chacas
                    District::create([
                        'name' => 'Chacas',
                        /*'slug' => str_slug('Chacas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acochaca
                    District::create([
                        'name' => 'Acochaca',
                        /*'slug' => str_slug('Acochaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Bolognesi ====================================
              $province = Province::create([
                  'name' => 'Bolognesi',
                  /*'slug' => str_slug('Bolognesi'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chiquian
                    District::create([
                        'name' => 'Chiquian',
                        /*'slug' => str_slug('Chiquian'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Abelardo Pardo Lezameta
                    District::create([
                        'name' => 'Abelardo Pardo Lezameta',
                        /*'slug' => str_slug('Abelardo Pardo Lezameta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Antonio Raymondi
                    District::create([
                        'name' => 'Antonio Raymondi',
                        /*'slug' => str_slug('Antonio Raymondi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aquia
                    District::create([
                        'name' => 'Aquia',
                        /*'slug' => str_slug('Aquia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cajacay
                    District::create([
                        'name' => 'Cajacay',
                        /*'slug' => str_slug('Cajacay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Canis
                    District::create([
                        'name' => 'Canis',
                        /*'slug' => str_slug('Canis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colquioc
                    District::create([
                        'name' => 'Colquioc',
                        /*'slug' => str_slug('Colquioc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huallanca
                    District::create([
                        'name' => 'Huallanca',
                        /*'slug' => str_slug('Huallanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huasta
                    District::create([
                        'name' => 'Huasta',
                        /*'slug' => str_slug('Huasta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllacayan
                    District::create([
                        'name' => 'Huayllacayan',
                        /*'slug' => str_slug('Huayllacayan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Primavera
                    District::create([
                        'name' => 'La Primavera',
                        /*'slug' => str_slug('La Primavera'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mangas
                    District::create([
                        'name' => 'Mangas',
                        /*'slug' => str_slug('Mangas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pacllon
                    District::create([
                        'name' => 'Pacllon',
                        /*'slug' => str_slug('Pacllon'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Miguel de Corpanqui
                    District::create([
                        'name' => 'San Miguel de Corpanqui',
                        /*'slug' => str_slug('San Miguel de Corpanqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ticllos
                    District::create([
                        'name' => 'Ticllos',
                        /*'slug' => str_slug('Ticllos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Carhuaz ====================================
              $province = Province::create([
                  'name' => 'Carhuaz',
                  /*'slug' => str_slug('Carhuaz'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Carhuaz
                    District::create([
                        'name' => 'Carhuaz',
                        /*'slug' => str_slug('Carhuaz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acopampa
                    District::create([
                        'name' => 'Acopampa',
                        /*'slug' => str_slug('Acopampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Amashca
                    District::create([
                        'name' => 'Amashca',
                        /*'slug' => str_slug('Amashca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anta
                    District::create([
                        'name' => 'Anta',
                        /*'slug' => str_slug('Anta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ataquero
                    District::create([
                        'name' => 'Ataquero',
                        /*'slug' => str_slug('Ataquero'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcara
                    District::create([
                        'name' => 'Marcara',
                        /*'slug' => str_slug('Marcara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pariahuanca
                    District::create([
                        'name' => 'Pariahuanca',
                        /*'slug' => str_slug('Pariahuanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Miguel de Aco
                    District::create([
                        'name' => 'San Miguel de Aco',
                        /*'slug' => str_slug('San Miguel de Aco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Shilla
                    District::create([
                        'name' => 'Shilla',
                        /*'slug' => str_slug('Shilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tinco
                    District::create([
                        'name' => 'Tinco',
                        /*'slug' => str_slug('Tinco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yungar
                    District::create([
                        'name' => 'Yungar',
                        /*'slug' => str_slug('Yungar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Carlos Fermín Fitzcarrald ====================================
              $province = Province::create([
                  'name' => 'Carlos Fermín Fitzcarrald',
                  /*'slug' => str_slug('Carlos Fermín Fitzcarrald'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Luis
                    District::create([
                        'name' => 'San Luis',
                        /*'slug' => str_slug('San Luis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Nicolás
                    District::create([
                        'name' => 'San Nicolás',
                        /*'slug' => str_slug('San Nicolás'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauya
                    District::create([
                        'name' => 'Yauya',
                        /*'slug' => str_slug('Yauya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Casma ====================================
              $province = Province::create([
                  'name' => 'Casma',
                  /*'slug' => str_slug('Casma'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Casma
                    District::create([
                        'name' => 'Casma',
                        /*'slug' => str_slug('Casma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Buena Vista Alta
                    District::create([
                        'name' => 'Buena Vista Alta',
                        /*'slug' => str_slug('Buena Vista Alta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Comandante Noel
                    District::create([
                        'name' => 'Comandante Noel',
                        /*'slug' => str_slug('Comandante Noel'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yautan
                    District::create([
                        'name' => 'Yautan',
                        /*'slug' => str_slug('Yautan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Corongo ====================================
              $province = Province::create([
                  'name' => 'Corongo',
                  /*'slug' => str_slug('Corongo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Corongo
                    District::create([
                        'name' => 'Corongo',
                        /*'slug' => str_slug('Corongo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aco
                    District::create([
                        'name' => 'Aco',
                        /*'slug' => str_slug('Aco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bambas
                    District::create([
                        'name' => 'Bambas',
                        /*'slug' => str_slug('Bambas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cusca
                    District::create([
                        'name' => 'Cusca',
                        /*'slug' => str_slug('Cusca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Pampa
                    District::create([
                        'name' => 'La Pampa',
                        /*'slug' => str_slug('La Pampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanac
                    District::create([
                        'name' => 'Yanac',
                        /*'slug' => str_slug('Yanac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yupan
                    District::create([
                        'name' => 'Yupan',
                        /*'slug' => str_slug('Yupan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huari ====================================
              $province = Province::create([
                  'name' => 'Huari',
                  /*'slug' => str_slug('Huari'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huari
                    District::create([
                        'name' => 'Huari',
                        /*'slug' => str_slug('Huari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anra
                    District::create([
                        'name' => 'Anra',
                        /*'slug' => str_slug('Anra'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cajay
                    District::create([
                        'name' => 'Cajay',
                        /*'slug' => str_slug('Cajay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chavin de Huantar
                    District::create([
                        'name' => 'Chavin de Huantar',
                        /*'slug' => str_slug('Chavin de Huantar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacachi
                    District::create([
                        'name' => 'Huacachi',
                        /*'slug' => str_slug('Huacachi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacchis
                    District::create([
                        'name' => 'Huacchis',
                        /*'slug' => str_slug('Huacchis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huachis
                    District::create([
                        'name' => 'Huachis',
                        /*'slug' => str_slug('Huachis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huantar
                    District::create([
                        'name' => 'Huantar',
                        /*'slug' => str_slug('Huantar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Masin
                    District::create([
                        'name' => 'Masin',
                        /*'slug' => str_slug('Masin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paucas
                    District::create([
                        'name' => 'Paucas',
                        /*'slug' => str_slug('Paucas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ponto
                    District::create([
                        'name' => 'Ponto',
                        /*'slug' => str_slug('Ponto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rahuapampa
                    District::create([
                        'name' => 'Rahuapampa',
                        /*'slug' => str_slug('Rahuapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rapayan
                    District::create([
                        'name' => 'Rapayan',
                        /*'slug' => str_slug('Rapayan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Marcos
                    District::create([
                        'name' => 'San Marcos',
                        /*'slug' => str_slug('San Marcos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Chana
                    District::create([
                        'name' => 'San Pedro de Chana',
                        /*'slug' => str_slug('San Pedro de Chana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uco
                    District::create([
                        'name' => 'Uco',
                        /*'slug' => str_slug('Uco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huarmey ====================================
              $province = Province::create([
                  'name' => 'Huarmey',
                  /*'slug' => str_slug('Huarmey'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huarmey
                    District::create([
                        'name' => 'Huarmey',
                        /*'slug' => str_slug('Huarmey'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochapeti
                    District::create([
                        'name' => 'Cochapeti',
                        /*'slug' => str_slug('Cochapeti'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Culebras
                    District::create([
                        'name' => 'Culebras',
                        /*'slug' => str_slug('Culebras'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayan
                    District::create([
                        'name' => 'Huayan',
                        /*'slug' => str_slug('Huayan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Malvas
                    District::create([
                        'name' => 'Malvas',
                        /*'slug' => str_slug('Malvas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huaylas ====================================
              $province = Province::create([
                  'name' => 'Huaylas',
                  /*'slug' => str_slug('Huaylas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Caraz
                    District::create([
                        'name' => 'Caraz',
                        /*'slug' => str_slug('Caraz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huallanca
                    District::create([
                        'name' => 'Huallanca',
                        /*'slug' => str_slug('Huallanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huata
                    District::create([
                        'name' => 'Huata',
                        /*'slug' => str_slug('Huata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaylas
                    District::create([
                        'name' => 'Huaylas',
                        /*'slug' => str_slug('Huaylas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mato
                    District::create([
                        'name' => 'Mato',
                        /*'slug' => str_slug('Mato'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pamparomas
                    District::create([
                        'name' => 'Pamparomas',
                        /*'slug' => str_slug('Pamparomas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pueblo Libre
                    District::create([
                        'name' => 'Pueblo Libre',
                        /*'slug' => str_slug('Pueblo Libre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Cruz
                    District::create([
                        'name' => 'Santa Cruz',
                        /*'slug' => str_slug('Santa Cruz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Toribio
                    District::create([
                        'name' => 'Santo Toribio',
                        /*'slug' => str_slug('Santo Toribio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yuracmarca
                    District::create([
                        'name' => 'Yuracmarca',
                        /*'slug' => str_slug('Yuracmarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Mariscal Luzuriaga ====================================
              $province = Province::create([
                  'name' => 'Mariscal Luzuriaga',
                  /*'slug' => str_slug('Mariscal Luzuriaga'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Piscobamba
                    District::create([
                        'name' => 'Piscobamba',
                        /*'slug' => str_slug('Piscobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Casca
                    District::create([
                        'name' => 'Casca',
                        /*'slug' => str_slug('Casca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Eleazar Guzmán Barrón
                    District::create([
                        'name' => 'Eleazar Guzmán Barrón',
                        /*'slug' => str_slug('Eleazar Guzmán Barrón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Fidel Olivas Escudero
                    District::create([
                        'name' => 'Fidel Olivas Escudero',
                        /*'slug' => str_slug('Fidel Olivas Escudero'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llama
                    District::create([
                        'name' => 'Llama',
                        /*'slug' => str_slug('Llama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llumpa
                    District::create([
                        'name' => 'Llumpa',
                        /*'slug' => str_slug('Llumpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lucma
                    District::create([
                        'name' => 'Lucma',
                        /*'slug' => str_slug('Lucma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Musga
                    District::create([
                        'name' => 'Musga',
                        /*'slug' => str_slug('Musga'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Ocros ====================================
              $province = Province::create([
                  'name' => 'Ocros',
                  /*'slug' => str_slug('Ocros'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Ocros
                    District::create([
                        'name' => 'Ocros',
                        /*'slug' => str_slug('Ocros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acas
                    District::create([
                        'name' => 'Acas',
                        /*'slug' => str_slug('Acas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cajamarquilla
                    District::create([
                        'name' => 'Cajamarquilla',
                        /*'slug' => str_slug('Cajamarquilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carhuapampa
                    District::create([
                        'name' => 'Carhuapampa',
                        /*'slug' => str_slug('Carhuapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochas
                    District::create([
                        'name' => 'Cochas',
                        /*'slug' => str_slug('Cochas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Congas
                    District::create([
                        'name' => 'Congas',
                        /*'slug' => str_slug('Congas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llipa
                    District::create([
                        'name' => 'Llipa',
                        /*'slug' => str_slug('Llipa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Cristóbal de Raján
                    District::create([
                        'name' => 'San Cristóbal de Raján',
                        /*'slug' => str_slug('San Cristóbal de Raján'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro
                    District::create([
                        'name' => 'San Pedro',
                        /*'slug' => str_slug('San Pedro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Chilcas
                    District::create([
                        'name' => 'Santiago de Chilcas',
                        /*'slug' => str_slug('Santiago de Chilcas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Pallasca ====================================
              $province = Province::create([
                  'name' => 'Pallasca',
                  /*'slug' => str_slug('Pallasca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cabana
                    District::create([
                        'name' => 'Cabana',
                        /*'slug' => str_slug('Cabana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bolognesi
                    District::create([
                        'name' => 'Bolognesi',
                        /*'slug' => str_slug('Bolognesi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Conchucos
                    District::create([
                        'name' => 'Conchucos',
                        /*'slug' => str_slug('Conchucos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacaschuque
                    District::create([
                        'name' => 'Huacaschuque',
                        /*'slug' => str_slug('Huacaschuque'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huandoval
                    District::create([
                        'name' => 'Huandoval',
                        /*'slug' => str_slug('Huandoval'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lacabamba
                    District::create([
                        'name' => 'Lacabamba',
                        /*'slug' => str_slug('Lacabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llapo
                    District::create([
                        'name' => 'Llapo',
                        /*'slug' => str_slug('Llapo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pallasca
                    District::create([
                        'name' => 'Pallasca',
                        /*'slug' => str_slug('Pallasca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampas
                    District::create([
                        'name' => 'Pampas',
                        /*'slug' => str_slug('Pampas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa
                    District::create([
                        'name' => 'Santa Rosa',
                        /*'slug' => str_slug('Santa Rosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tauca
                    District::create([
                        'name' => 'Tauca',
                        /*'slug' => str_slug('Tauca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Pomabamba ====================================
              $province = Province::create([
                  'name' => 'Pomabamba',
                  /*'slug' => str_slug('Pomabamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Pomabamba
                    District::create([
                        'name' => 'Pomabamba',
                        /*'slug' => str_slug('Pomabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllan
                    District::create([
                        'name' => 'Huayllan',
                        /*'slug' => str_slug('Huayllan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Parobamba
                    District::create([
                        'name' => 'Parobamba',
                        /*'slug' => str_slug('Parobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quinuabamba
                    District::create([
                        'name' => 'Quinuabamba',
                        /*'slug' => str_slug('Quinuabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Recuay ====================================
              $province = Province::create([
                  'name' => 'Recuay',
                  /*'slug' => str_slug('Recuay'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Recuay
                    District::create([
                        'name' => 'Recuay',
                        /*'slug' => str_slug('Recuay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Catac
                    District::create([
                        'name' => 'Catac',
                        /*'slug' => str_slug('Catac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cotaparaco
                    District::create([
                        'name' => 'Cotaparaco',
                        /*'slug' => str_slug('Cotaparaco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllapampa
                    District::create([
                        'name' => 'Huayllapampa',
                        /*'slug' => str_slug('Huayllapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llacllin
                    District::create([
                        'name' => 'Llacllin',
                        /*'slug' => str_slug('Llacllin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marca
                    District::create([
                        'name' => 'Marca',
                        /*'slug' => str_slug('Marca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampas Chico
                    District::create([
                        'name' => 'Pampas Chico',
                        /*'slug' => str_slug('Pampas Chico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pararin
                    District::create([
                        'name' => 'Pararin',
                        /*'slug' => str_slug('Pararin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tapacocha
                    District::create([
                        'name' => 'Tapacocha',
                        /*'slug' => str_slug('Tapacocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ticapampa
                    District::create([
                        'name' => 'Ticapampa',
                        /*'slug' => str_slug('Ticapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Santa ====================================
              $province = Province::create([
                  'name' => 'Santa',
                  /*'slug' => str_slug('Santa'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chimbote
                    District::create([
                        'name' => 'Chimbote',
                        /*'slug' => str_slug('Chimbote'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cáceres del Perú
                    District::create([
                        'name' => 'Cáceres del Perú',
                        /*'slug' => str_slug('Cáceres del Perú'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coishco
                    District::create([
                        'name' => 'Coishco',
                        /*'slug' => str_slug('Coishco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Macate
                    District::create([
                        'name' => 'Macate',
                        /*'slug' => str_slug('Macate'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Moro
                    District::create([
                        'name' => 'Moro',
                        /*'slug' => str_slug('Moro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nepeña
                    District::create([
                        'name' => 'Nepeña',
                        /*'slug' => str_slug('Nepeña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Samanco
                    District::create([
                        'name' => 'Samanco',
                        /*'slug' => str_slug('Samanco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa
                    District::create([
                        'name' => 'Santa',
                        /*'slug' => str_slug('Santa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nuevo Chimbote
                    District::create([
                        'name' => 'Nuevo Chimbote',
                        /*'slug' => str_slug('Nuevo Chimbote'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Sihuas ====================================
              $province = Province::create([
                  'name' => 'Sihuas',
                  /*'slug' => str_slug('Sihuas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Sihuas
                    District::create([
                        'name' => 'Sihuas',
                        /*'slug' => str_slug('Sihuas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acobamba
                    District::create([
                        'name' => 'Acobamba',
                        /*'slug' => str_slug('Acobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alfonso Ugarte
                    District::create([
                        'name' => 'Alfonso Ugarte',
                        /*'slug' => str_slug('Alfonso Ugarte'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cashapampa
                    District::create([
                        'name' => 'Cashapampa',
                        /*'slug' => str_slug('Cashapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chingalpo
                    District::create([
                        'name' => 'Chingalpo',
                        /*'slug' => str_slug('Chingalpo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllabamba
                    District::create([
                        'name' => 'Huayllabamba',
                        /*'slug' => str_slug('Huayllabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quiches
                    District::create([
                        'name' => 'Quiches',
                        /*'slug' => str_slug('Quiches'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ragash
                    District::create([
                        'name' => 'Ragash',
                        /*'slug' => str_slug('Ragash'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan
                    District::create([
                        'name' => 'San Juan',
                        /*'slug' => str_slug('San Juan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sicsibamba
                    District::create([
                        'name' => 'Sicsibamba',
                        /*'slug' => str_slug('Sicsibamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
              //
              // Yungay ====================================
              $province = Province::create([
                  'name' => 'Yungay',
                  /*'slug' => str_slug('Yungay'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Yungay
                    District::create([
                        'name' => 'Yungay',
                        /*'slug' => str_slug('Yungay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cascapara
                    District::create([
                        'name' => 'Cascapara',
                        /*'slug' => str_slug('Cascapara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mancos
                    District::create([
                        'name' => 'Mancos',
                        /*'slug' => str_slug('Mancos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Matacoto
                    District::create([
                        'name' => 'Matacoto',
                        /*'slug' => str_slug('Matacoto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quillo
                    District::create([
                        'name' => 'Quillo',
                        /*'slug' => str_slug('Quillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ranrahirca
                    District::create([
                        'name' => 'Ranrahirca',
                        /*'slug' => str_slug('Ranrahirca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Shupluy
                    District::create([
                        'name' => 'Shupluy',
                        /*'slug' => str_slug('Shupluy'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanama
                    District::create([
                        'name' => 'Yanama',
                        /*'slug' => str_slug('Yanama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Apurímac //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Apurímac',
            /*'slug' => str_slug('Apurímac'),*/
            'country_id' => 1, //Peru
        ]);

              // Abancay ====================================
              $province = Province::create([
                  'name' => 'Abancay',
                  /*'slug' => str_slug('Abancay'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Abancay
                    District::create([
                        'name' => 'Abancay',
                        /*'slug' => str_slug('Abancay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chacoche
                    District::create([
                        'name' => 'Chacoche',
                        /*'slug' => str_slug('Chacoche'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Circa
                    District::create([
                        'name' => 'Circa',
                        /*'slug' => str_slug('Circa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Curahuasi
                    District::create([
                        'name' => 'Curahuasi',
                        /*'slug' => str_slug('Curahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanipaca
                    District::create([
                        'name' => 'Huanipaca',
                        /*'slug' => str_slug('Huanipaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lambrama
                    District::create([
                        'name' => 'Lambrama',
                        /*'slug' => str_slug('Lambrama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pichirhua
                    District::create([
                        'name' => 'Pichirhua',
                        /*'slug' => str_slug('Pichirhua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Cachora
                    District::create([
                        'name' => 'San Pedro de Cachora',
                        /*'slug' => str_slug('San Pedro de Cachora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tamburco
                    District::create([
                        'name' => 'Tamburco',
                        /*'slug' => str_slug('Tamburco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Andahuaylas ====================================
              $province = Province::create([
                  'name' => 'Andahuaylas',
                  /*'slug' => str_slug('Andahuaylas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Andahuaylas
                    District::create([
                        'name' => 'Andahuaylas',
                        /*'slug' => str_slug('Andahuaylas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andarapa
                    District::create([
                        'name' => 'Andarapa',
                        /*'slug' => str_slug('Andarapa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chiara
                    District::create([
                        'name' => 'Chiara',
                        /*'slug' => str_slug('Chiara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancarama
                    District::create([
                        'name' => 'Huancarama',
                        /*'slug' => str_slug('Huancarama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancaray
                    District::create([
                        'name' => 'Huancaray',
                        /*'slug' => str_slug('Huancaray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayana
                    District::create([
                        'name' => 'Huayana',
                        /*'slug' => str_slug('Huayana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Kishuara
                    District::create([
                        'name' => 'Kishuara',
                        /*'slug' => str_slug('Kishuara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pacobamba
                    District::create([
                        'name' => 'Pacobamba',
                        /*'slug' => str_slug('Pacobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pacucha
                    District::create([
                        'name' => 'Pacucha',
                        /*'slug' => str_slug('Pacucha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampachiri
                    District::create([
                        'name' => 'Pampachiri',
                        /*'slug' => str_slug('Pampachiri'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pomacocha
                    District::create([
                        'name' => 'Pomacocha',
                        /*'slug' => str_slug('Pomacocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Antonio de Cachi
                    District::create([
                        'name' => 'San Antonio de Cachi',
                        /*'slug' => str_slug('San Antonio de Cachi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Jerónimo
                    District::create([
                        'name' => 'San Jerónimo',
                        /*'slug' => str_slug('San Jerónimo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Miguel de Chaccrampa
                    District::create([
                        'name' => 'San Miguel de Chaccrampa',
                        /*'slug' => str_slug('San Miguel de Chaccrampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa María de Chicmo
                    District::create([
                        'name' => 'Santa María de Chicmo',
                        /*'slug' => str_slug('Santa María de Chicmo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Talavera
                    District::create([
                        'name' => 'Talavera',
                        /*'slug' => str_slug('Talavera'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tumay Huaraca
                    District::create([
                        'name' => 'Tumay Huaraca',
                        /*'slug' => str_slug('Tumay Huaraca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Turpo
                    District::create([
                        'name' => 'Turpo',
                        /*'slug' => str_slug('Turpo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Kaquiabamba
                    District::create([
                        'name' => 'Kaquiabamba',
                        /*'slug' => str_slug('Kaquiabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José María Arguedas
                    District::create([
                        'name' => 'José María Arguedas',
                        /*'slug' => str_slug('José María Arguedas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Antabamba ====================================
              $province = Province::create([
                  'name' => 'Antabamba',
                  /*'slug' => str_slug('Antabamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Antabamba
                    District::create([
                        'name' => 'Antabamba',
                        /*'slug' => str_slug('Antabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Oro
                    District::create([
                        'name' => 'El Oro',
                        /*'slug' => str_slug('El Oro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaquirca
                    District::create([
                        'name' => 'Huaquirca',
                        /*'slug' => str_slug('Huaquirca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Juan Espinoza Medrano
                    District::create([
                        'name' => 'Juan Espinoza Medrano',
                        /*'slug' => str_slug('Juan Espinoza Medrano'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Oropesa
                    District::create([
                        'name' => 'Oropesa',
                        /*'slug' => str_slug('Oropesa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pachaconas
                    District::create([
                        'name' => 'Pachaconas',
                        /*'slug' => str_slug('Pachaconas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sabaino
                    District::create([
                        'name' => 'Sabaino',
                        /*'slug' => str_slug('Sabaino'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Aymaraes ====================================
              $province = Province::create([
                  'name' => 'Aymaraes',
                  /*'slug' => str_slug('Aymaraes'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chalhuanca
                    District::create([
                        'name' => 'Chalhuanca',
                        /*'slug' => str_slug('Chalhuanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Capaya
                    District::create([
                        'name' => 'Capaya',
                        /*'slug' => str_slug('Capaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Caraybamba
                    District::create([
                        'name' => 'Caraybamba',
                        /*'slug' => str_slug('Caraybamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chapimarca
                    District::create([
                        'name' => 'Chapimarca',
                        /*'slug' => str_slug('Chapimarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colcabamba
                    District::create([
                        'name' => 'Colcabamba',
                        /*'slug' => str_slug('Colcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cotaruse
                    District::create([
                        'name' => 'Cotaruse',
                        /*'slug' => str_slug('Cotaruse'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ihuayllo
                    District::create([
                        'name' => 'Ihuayllo',
                        /*'slug' => str_slug('Ihuayllo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Justo Apu Sahuaraura
                    District::create([
                        'name' => 'Justo Apu Sahuaraura',
                        /*'slug' => str_slug('Justo Apu Sahuaraura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lucre
                    District::create([
                        'name' => 'Lucre',
                        /*'slug' => str_slug('Lucre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pocohuanca
                    District::create([
                        'name' => 'Pocohuanca',
                        /*'slug' => str_slug('Pocohuanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Chacña
                    District::create([
                        'name' => 'San Juan de Chacña',
                        /*'slug' => str_slug('San Juan de Chacña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sañayca
                    District::create([
                        'name' => 'Sañayca',
                        /*'slug' => str_slug('Sañayca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Soraya
                    District::create([
                        'name' => 'Soraya',
                        /*'slug' => str_slug('Soraya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tapairihua
                    District::create([
                        'name' => 'Tapairihua',
                        /*'slug' => str_slug('Tapairihua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tintay
                    District::create([
                        'name' => 'Tintay',
                        /*'slug' => str_slug('Tintay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Toraya
                    District::create([
                        'name' => 'Toraya',
                        /*'slug' => str_slug('Toraya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanaca
                    District::create([
                        'name' => 'Yanaca',
                        /*'slug' => str_slug('Yanaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Cotabambas ====================================
              $province = Province::create([
                  'name' => 'Cotabambas',
                  /*'slug' => str_slug('Cotabambas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Tambobamba
                    District::create([
                        'name' => 'Tambobamba',
                        /*'slug' => str_slug('Tambobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cotabambas
                    District::create([
                        'name' => 'Cotabambas',
                        /*'slug' => str_slug('Cotabambas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coyllurqui
                    District::create([
                        'name' => 'Coyllurqui',
                        /*'slug' => str_slug('Coyllurqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Haquira
                    District::create([
                        'name' => 'Haquira',
                        /*'slug' => str_slug('Haquira'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mara
                    District::create([
                        'name' => 'Mara',
                        /*'slug' => str_slug('Mara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Challhuahuacho
                    District::create([
                        'name' => 'Challhuahuacho',
                        /*'slug' => str_slug('Challhuahuacho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chincheros ====================================
              $province = Province::create([
                  'name' => 'Chincheros',
                  /*'slug' => str_slug('Chincheros'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chincheros
                    District::create([
                        'name' => 'Chincheros',
                        /*'slug' => str_slug('Chincheros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anco_Huallo
                    District::create([
                        'name' => 'Anco_Huallo',
                        /*'slug' => str_slug('Anco_Huallo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cocharcas
                    District::create([
                        'name' => 'Cocharcas',
                        /*'slug' => str_slug('Cocharcas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaccana
                    District::create([
                        'name' => 'Huaccana',
                        /*'slug' => str_slug('Huaccana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocobamba
                    District::create([
                        'name' => 'Ocobamba',
                        /*'slug' => str_slug('Ocobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ongoy
                    District::create([
                        'name' => 'Ongoy',
                        /*'slug' => str_slug('Ongoy'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uranmarca
                    District::create([
                        'name' => 'Uranmarca',
                        /*'slug' => str_slug('Uranmarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ranracancha
                    District::create([
                        'name' => 'Ranracancha',
                        /*'slug' => str_slug('Ranracancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rocchacc
                    District::create([
                        'name' => 'Rocchacc',
                        /*'slug' => str_slug('Rocchacc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Porvenir
                    District::create([
                        'name' => 'El Porvenir',
                        /*'slug' => str_slug('El Porvenir'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Los Chankas
                    District::create([
                        'name' => 'Los Chankas',
                        /*'slug' => str_slug('Los Chankas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Grau ====================================
              $province = Province::create([
                  'name' => 'Grau',
                  /*'slug' => str_slug('Grau'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chuquibambilla
                    District::create([
                        'name' => 'Chuquibambilla',
                        /*'slug' => str_slug('Chuquibambilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Curpahuasi
                    District::create([
                        'name' => 'Curpahuasi',
                        /*'slug' => str_slug('Curpahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Gamarra
                    District::create([
                        'name' => 'Gamarra',
                        /*'slug' => str_slug('Gamarra'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllati
                    District::create([
                        'name' => 'Huayllati',
                        /*'slug' => str_slug('Huayllati'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mamara
                    District::create([
                        'name' => 'Mamara',
                        /*'slug' => str_slug('Mamara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Micaela Bastidas
                    District::create([
                        'name' => 'Micaela Bastidas',
                        /*'slug' => str_slug('Micaela Bastidas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pataypampa
                    District::create([
                        'name' => 'Pataypampa',
                        /*'slug' => str_slug('Pataypampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Progreso
                    District::create([
                        'name' => 'Progreso',
                        /*'slug' => str_slug('Progreso'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Antonio
                    District::create([
                        'name' => 'San Antonio',
                        /*'slug' => str_slug('San Antonio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa
                    District::create([
                        'name' => 'Santa Rosa',
                        /*'slug' => str_slug('Santa Rosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Turpay
                    District::create([
                        'name' => 'Turpay',
                        /*'slug' => str_slug('Turpay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vilcabamba
                    District::create([
                        'name' => 'Vilcabamba',
                        /*'slug' => str_slug('Vilcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Virundo
                    District::create([
                        'name' => 'Virundo',
                        /*'slug' => str_slug('Virundo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Curasco
                    District::create([
                        'name' => 'Curasco',
                        /*'slug' => str_slug('Curasco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Arequipa //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Arequipa',
            /*'slug' => str_slug('Arequipa'),*/
            'country_id' => 1, //Peru
        ]);

              // Arequipa ====================================
              $province = Province::create([
                  'name' => 'Arequipa',
                  /*'slug' => str_slug('Arequipa'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Arequipa
                    District::create([
                        'name' => 'Arequipa',
                        /*'slug' => str_slug('Arequipa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alto Selva Alegre
                    District::create([
                        'name' => 'Alto Selva Alegre',
                        /*'slug' => str_slug('Alto Selva Alegre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cayma
                    District::create([
                        'name' => 'Cayma',
                        /*'slug' => str_slug('Cayma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cerro Colorado
                    District::create([
                        'name' => 'Cerro Colorado',
                        /*'slug' => str_slug('Cerro Colorado'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Characato
                    District::create([
                        'name' => 'Characato',
                        /*'slug' => str_slug('Characato'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chiguata
                    District::create([
                        'name' => 'Chiguata',
                        /*'slug' => str_slug('Chiguata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jacobo Hunter
                    District::create([
                        'name' => 'Jacobo Hunter',
                        /*'slug' => str_slug('Jacobo Hunter'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Joya
                    District::create([
                        'name' => 'La Joya',
                        /*'slug' => str_slug('La Joya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariano Melgar
                    District::create([
                        'name' => 'Mariano Melgar',
                        /*'slug' => str_slug('Mariano Melgar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Miraflores
                    District::create([
                        'name' => 'Miraflores',
                        /*'slug' => str_slug('Miraflores'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mollebaya
                    District::create([
                        'name' => 'Mollebaya',
                        /*'slug' => str_slug('Mollebaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paucarpata
                    District::create([
                        'name' => 'Paucarpata',
                        /*'slug' => str_slug('Paucarpata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pocsi
                    District::create([
                        'name' => 'Pocsi',
                        /*'slug' => str_slug('Pocsi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Polobaya
                    District::create([
                        'name' => 'Polobaya',
                        /*'slug' => str_slug('Polobaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quequeña
                    District::create([
                        'name' => 'Quequeña',
                        /*'slug' => str_slug('Quequeña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sabandia
                    District::create([
                        'name' => 'Sabandia',
                        /*'slug' => str_slug('Sabandia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sachaca
                    District::create([
                        'name' => 'Sachaca',
                        /*'slug' => str_slug('Sachaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Siguas
                    District::create([
                        'name' => 'San Juan de Siguas',
                        /*'slug' => str_slug('San Juan de Siguas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Tarucani
                    District::create([
                        'name' => 'San Juan de Tarucani',
                        /*'slug' => str_slug('San Juan de Tarucani'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Isabel de Siguas
                    District::create([
                        'name' => 'Santa Isabel de Siguas',
                        /*'slug' => str_slug('Santa Isabel de Siguas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rita de Siguas
                    District::create([
                        'name' => 'Santa Rita de Siguas',
                        /*'slug' => str_slug('Santa Rita de Siguas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Socabaya
                    District::create([
                        'name' => 'Socabaya',
                        /*'slug' => str_slug('Socabaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tiabaya
                    District::create([
                        'name' => 'Tiabaya',
                        /*'slug' => str_slug('Tiabaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uchumayo
                    District::create([
                        'name' => 'Uchumayo',
                        /*'slug' => str_slug('Uchumayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vitor
                    District::create([
                        'name' => 'Vitor',
                        /*'slug' => str_slug('Vitor'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanahuara
                    District::create([
                        'name' => 'Yanahuara',
                        /*'slug' => str_slug('Yanahuara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yarabamba
                    District::create([
                        'name' => 'Yarabamba',
                        /*'slug' => str_slug('Yarabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yura
                    District::create([
                        'name' => 'Yura',
                        /*'slug' => str_slug('Yura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José Luis Bustamante y Rivero
                    District::create([
                        'name' => 'José Luis Bustamante y Rivero',
                        /*'slug' => str_slug('José Luis Bustamante y Rivero'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Camaná ====================================
              $province = Province::create([
                  'name' => 'Camaná',
                  /*'slug' => str_slug('Camaná'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Camaná
                    District::create([
                        'name' => 'Camaná',
                        /*'slug' => str_slug('Camaná'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José María Quimper
                    District::create([
                        'name' => 'José María Quimper',
                        /*'slug' => str_slug('José María Quimper'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariano Nicolás Valcarcel
                    District::create([
                        'name' => 'Mariano Nicolás Valcarcel',
                        /*'slug' => str_slug('Mariano Nicolás Valcarcel'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariscal Cáceres
                    District::create([
                        'name' => 'Mariscal Cáceres',
                        /*'slug' => str_slug('Mariscal Cáceres'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nicolás de Piérola
                    District::create([
                        'name' => 'Nicolás de Piérola',
                        /*'slug' => str_slug('Nicolás de Piérola'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocoña
                    District::create([
                        'name' => 'Ocoña',
                        /*'slug' => str_slug('Ocoña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quilca
                    District::create([
                        'name' => 'Quilca',
                        /*'slug' => str_slug('Quilca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Samuel Pastor
                    District::create([
                        'name' => 'Samuel Pastor',
                        /*'slug' => str_slug('Samuel Pastor'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Caravelí ====================================
              $province = Province::create([
                  'name' => 'Caravelí',
                  /*'slug' => str_slug('Caravelí'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);
                    // Caravelí
                    District::create([
                        'name' => 'Caravelí',
                        /*'slug' => str_slug('Caravelí'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acarí
                    District::create([
                        'name' => 'Acarí',
                        /*'slug' => str_slug('Acarí'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Atico
                    District::create([
                        'name' => 'Atico',
                        /*'slug' => str_slug('Atico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Atiquipa
                    District::create([
                        'name' => 'Atiquipa',
                        /*'slug' => str_slug('Atiquipa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bella Unión
                    District::create([
                        'name' => 'Bella Unión',
                        /*'slug' => str_slug('Bella Unión'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chala
                    District::create([
                        'name' => 'Chala',
                        /*'slug' => str_slug('Chala'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chaparra
                    District::create([
                        'name' => 'Chaparra',
                        /*'slug' => str_slug('Chaparra'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanuhuanu
                    District::create([
                        'name' => 'Huanuhuanu',
                        /*'slug' => str_slug('Huanuhuanu'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jaqui
                    District::create([
                        'name' => 'Jaqui',
                        /*'slug' => str_slug('Jaqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lomas
                    District::create([
                        'name' => 'Lomas',
                        /*'slug' => str_slug('Lomas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quicacha
                    District::create([
                        'name' => 'Quicacha',
                        /*'slug' => str_slug('Quicacha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauca
                    District::create([
                        'name' => 'Yauca',
                        /*'slug' => str_slug('Yauca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Castilla ====================================
              $province = Province::create([
                  'name' => 'Castilla',
                  /*'slug' => str_slug('Castilla'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Aplao
                    District::create([
                        'name' => 'Aplao',
                        /*'slug' => str_slug('Aplao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andagua
                    District::create([
                        'name' => 'Andagua',
                        /*'slug' => str_slug('Andagua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ayo
                    District::create([
                        'name' => 'Ayo',
                        /*'slug' => str_slug('Ayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chachas
                    District::create([
                        'name' => 'Chachas',
                        /*'slug' => str_slug('Chachas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chilcaymarca
                    District::create([
                        'name' => 'Chilcaymarca',
                        /*'slug' => str_slug('Chilcaymarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Choco
                    District::create([
                        'name' => 'Choco',
                        /*'slug' => str_slug('Choco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancarqui
                    District::create([
                        'name' => 'Huancarqui',
                        /*'slug' => str_slug('Huancarqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Machaguay
                    District::create([
                        'name' => 'Machaguay',
                        /*'slug' => str_slug('Machaguay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Orcopampa
                    District::create([
                        'name' => 'Orcopampa',
                        /*'slug' => str_slug('Orcopampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampacolca
                    District::create([
                        'name' => 'Pampacolca',
                        /*'slug' => str_slug('Pampacolca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tipan
                    District::create([
                        'name' => 'Tipan',
                        /*'slug' => str_slug('Tipan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uñón
                    District::create([
                        'name' => 'Uñón',
                        /*'slug' => str_slug('Uñón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uraca
                    District::create([
                        'name' => 'Uraca',
                        /*'slug' => str_slug('Uraca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Viraco
                    District::create([
                        'name' => 'Viraco',
                        /*'slug' => str_slug('Viraco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Caylloma ====================================
              $province = Province::create([
                  'name' => 'Caylloma',
                  /*'slug' => str_slug('Caylloma'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chivay
                    District::create([
                        'name' => 'Chivay',
                        /*'slug' => str_slug('Chivay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Achoma
                    District::create([
                        'name' => 'Achoma',
                        /*'slug' => str_slug('Achoma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cabanaconde
                    District::create([
                        'name' => 'Cabanaconde',
                        /*'slug' => str_slug('Cabanaconde'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Callalli
                    District::create([
                        'name' => 'Callalli',
                        /*'slug' => str_slug('Callalli'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Caylloma
                    District::create([
                        'name' => 'Caylloma',
                        /*'slug' => str_slug('Caylloma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coporaque
                    District::create([
                        'name' => 'Coporaque',
                        /*'slug' => str_slug('Coporaque'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huambo
                    District::create([
                        'name' => 'Huambo',
                        /*'slug' => str_slug('Huambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanca
                    District::create([
                        'name' => 'Huanca',
                        /*'slug' => str_slug('Huanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ichupampa
                    District::create([
                        'name' => 'Ichupampa',
                        /*'slug' => str_slug('Ichupampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lari
                    District::create([
                        'name' => 'Lari',
                        /*'slug' => str_slug('Lari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lluta
                    District::create([
                        'name' => 'Lluta',
                        /*'slug' => str_slug('Lluta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Maca
                    District::create([
                        'name' => 'Maca',
                        /*'slug' => str_slug('Maca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Madrigal
                    District::create([
                        'name' => 'Madrigal',
                        /*'slug' => str_slug('Madrigal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // an Antonio de Chuca
                    District::create([
                        'name' => 'an Antonio de Chuca',
                        /*'slug' => str_slug('an Antonio de Chuca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sibayo
                    District::create([
                        'name' => 'Sibayo',
                        /*'slug' => str_slug('Sibayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tapay
                    District::create([
                        'name' => 'Tapay',
                        /*'slug' => str_slug('Tapay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tisco
                    District::create([
                        'name' => 'Tisco',
                        /*'slug' => str_slug('Tisco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tuti
                    District::create([
                        'name' => 'Tuti',
                        /*'slug' => str_slug('Tuti'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanque
                    District::create([
                        'name' => 'Yanque',
                        /*'slug' => str_slug('Yanque'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Majes
                    District::create([
                        'name' => 'Majes',
                        /*'slug' => str_slug('Majes'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Condesuyos ====================================
              $province = Province::create([
                  'name' => 'Condesuyos',
                  /*'slug' => str_slug('Condesuyos'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chuquibamba
                    District::create([
                        'name' => 'Chuquibamba',
                        /*'slug' => str_slug('Chuquibamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andaray
                    District::create([
                        'name' => 'Andaray',
                        /*'slug' => str_slug('Andaray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cayarani
                    District::create([
                        'name' => 'Cayarani',
                        /*'slug' => str_slug('Cayarani'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chichas
                    District::create([
                        'name' => 'Chichas',
                        /*'slug' => str_slug('Chichas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Iray
                    District::create([
                        'name' => 'Iray',
                        /*'slug' => str_slug('Iray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Río Grande
                    District::create([
                        'name' => 'Río Grande',
                        /*'slug' => str_slug('Río Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Salamanca
                    District::create([
                        'name' => 'Salamanca',
                        /*'slug' => str_slug('Salamanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanaquihua
                    District::create([
                        'name' => 'Yanaquihua',
                        /*'slug' => str_slug('Yanaquihua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Islay ====================================
              $province = Province::create([
                  'name' => 'Islay',
                  /*'slug' => str_slug('Islay'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Mollendo
                    District::create([
                        'name' => 'Mollendo',
                        /*'slug' => str_slug('Mollendo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cocachacra
                    District::create([
                        'name' => 'Cocachacra',
                        /*'slug' => str_slug('Cocachacra'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Dean Valdivia
                    District::create([
                        'name' => 'Dean Valdivia',
                        /*'slug' => str_slug('Dean Valdivia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Islay
                    District::create([
                        'name' => 'Islay',
                        /*'slug' => str_slug('Islay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mejia
                    District::create([
                        'name' => 'Mejia',
                        /*'slug' => str_slug('Mejia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Punta de Bombón
                    District::create([
                        'name' => 'Punta de Bombón',
                        /*'slug' => str_slug('Punta de Bombón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // La Unión ====================================
              $province = Province::create([
                  'name' => 'La Unión',
                  /*'slug' => str_slug('La Unión'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cotahuasi
                    District::create([
                        'name' => 'Cotahuasi',
                        /*'slug' => str_slug('Cotahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alca
                    District::create([
                        'name' => 'Alca',
                        /*'slug' => str_slug('Alca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Charcana
                    District::create([
                        'name' => 'Charcana',
                        /*'slug' => str_slug('Charcana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaynacotas
                    District::create([
                        'name' => 'Huaynacotas',
                        /*'slug' => str_slug('Huaynacotas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampamarca
                    District::create([
                        'name' => 'Pampamarca',
                        /*'slug' => str_slug('Pampamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Puyca
                    District::create([
                        'name' => 'Puyca',
                        /*'slug' => str_slug('Puyca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quechualla
                    District::create([
                        'name' => 'Quechualla',
                        /*'slug' => str_slug('Quechualla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sayla
                    District::create([
                        'name' => 'Sayla',
                        /*'slug' => str_slug('Sayla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tauria
                    District::create([
                        'name' => 'Tauria',
                        /*'slug' => str_slug('Tauria'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tomepampa
                    District::create([
                        'name' => 'Tomepampa',
                        /*'slug' => str_slug('Tomepampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Toro
                    District::create([
                        'name' => 'Toro',
                        /*'slug' => str_slug('Toro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Ayacucho //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Ayacucho',
            /*'slug' => str_slug('Ayacucho'),*/
            'country_id' => 1, //Peru
        ]);

              // Huamanga ====================================
              $province = Province::create([
                  'name' => 'Huamanga',
                  /*'slug' => str_slug('Huamanga'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);
                    // Ayacucho
                    District::create([
                        'name' => 'Ayacucho',
                        /*'slug' => str_slug('Ayacucho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acocro
                    District::create([
                        'name' => 'Acocro',
                        /*'slug' => str_slug('Acocro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acos Vinchos
                    District::create([
                        'name' => 'Acos Vinchos',
                        /*'slug' => str_slug('Acos Vinchos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carmen Alto
                    District::create([
                        'name' => 'Carmen Alto',
                        /*'slug' => str_slug('Carmen Alto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chiara
                    District::create([
                        'name' => 'Chiara',
                        /*'slug' => str_slug('Chiara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocros
                    District::create([
                        'name' => 'Ocros',
                        /*'slug' => str_slug('Ocros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pacaycasa
                    District::create([
                        'name' => 'Pacaycasa',
                        /*'slug' => str_slug('Pacaycasa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quinua
                    District::create([
                        'name' => 'Quinua',
                        /*'slug' => str_slug('Quinua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José de Ticllas
                    District::create([
                        'name' => 'San José de Ticllas',
                        /*'slug' => str_slug('San José de Ticllas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan Bautista
                    District::create([
                        'name' => 'San Juan Bautista',
                        /*'slug' => str_slug('San Juan Bautista'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Pischa
                    District::create([
                        'name' => 'Santiago de Pischa',
                        /*'slug' => str_slug('Santiago de Pischa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Socos
                    District::create([
                        'name' => 'Socos',
                        /*'slug' => str_slug('Socos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tambillo
                    District::create([
                        'name' => 'Tambillo',
                        /*'slug' => str_slug('Tambillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vinchos
                    District::create([
                        'name' => 'Vinchos',
                        /*'slug' => str_slug('Vinchos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jesús Nazareno
                    District::create([
                        'name' => 'Jesús Nazareno',
                        /*'slug' => str_slug('Jesús Nazareno'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andrés Avelino Cáceres Dorregaray
                    District::create([
                        'name' => 'Andrés Avelino Cáceres Dorregaray',
                        /*'slug' => str_slug('Andrés Avelino Cáceres Dorregaray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Cangallo ====================================
              $province = Province::create([
                  'name' => 'Cangallo',
                  /*'slug' => str_slug('Cangallo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cangallo
                    District::create([
                        'name' => 'Cangallo',
                        /*'slug' => str_slug('Cangallo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chuschi
                    District::create([
                        'name' => 'Chuschi',
                        /*'slug' => str_slug('Chuschi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Los Morochucos
                    District::create([
                        'name' => 'Los Morochucos',
                        /*'slug' => str_slug('Los Morochucos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // María Parado de Bellido
                    District::create([
                        'name' => 'María Parado de Bellido',
                        /*'slug' => str_slug('María Parado de Bellido'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paras
                    District::create([
                        'name' => 'Paras',
                        /*'slug' => str_slug('Paras'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Totos
                    District::create([
                        'name' => 'Totos',
                        /*'slug' => str_slug('Totos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huanca Sancos ====================================
              $province = Province::create([
                  'name' => 'Huanca Sancos',
                  /*'slug' => str_slug('Huanca Sancos'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Sancos
                    District::create([
                        'name' => 'Sancos',
                        /*'slug' => str_slug('Sancos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carapo
                    District::create([
                        'name' => 'Carapo',
                        /*'slug' => str_slug('Carapo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sacsamarca
                    District::create([
                        'name' => 'Sacsamarca',
                        /*'slug' => str_slug('Sacsamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Lucanamarca
                    District::create([
                        'name' => 'Santiago de Lucanamarca',
                        /*'slug' => str_slug('Santiago de Lucanamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huanta ====================================
              $province = Province::create([
                  'name' => 'Huanta',
                  /*'slug' => str_slug('Huanta'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huanta
                    District::create([
                        'name' => 'Huanta',
                        /*'slug' => str_slug('Huanta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ayahuanco
                    District::create([
                        'name' => 'Ayahuanco',
                        /*'slug' => str_slug('Ayahuanco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huamanguilla
                    District::create([
                        'name' => 'Huamanguilla',
                        /*'slug' => str_slug('Huamanguilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Iguain
                    District::create([
                        'name' => 'Iguain',
                        /*'slug' => str_slug('Iguain'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Luricocha
                    District::create([
                        'name' => 'Luricocha',
                        /*'slug' => str_slug('Luricocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santillana
                    District::create([
                        'name' => 'Santillana',
                        /*'slug' => str_slug('Santillana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sivia
                    District::create([
                        'name' => 'Sivia',
                        /*'slug' => str_slug('Sivia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llochegua
                    District::create([
                        'name' => 'Llochegua',
                        /*'slug' => str_slug('Llochegua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Canayre
                    District::create([
                        'name' => 'Canayre',
                        /*'slug' => str_slug('Canayre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uchuraccay
                    District::create([
                        'name' => 'Uchuraccay',
                        /*'slug' => str_slug('Uchuraccay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pucacolpa
                    District::create([
                        'name' => 'Pucacolpa',
                        /*'slug' => str_slug('Pucacolpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chaca
                    District::create([
                        'name' => 'Chaca',
                        /*'slug' => str_slug('Chaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // La Mar ====================================
              $province = Province::create([
                  'name' => 'La Mar',
                  /*'slug' => str_slug('La Mar'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Miguel
                    District::create([
                        'name' => 'San Miguel',
                        /*'slug' => str_slug('San Miguel'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anco
                    District::create([
                        'name' => 'Anco',
                        /*'slug' => str_slug('Anco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ayna
                    District::create([
                        'name' => 'Ayna',
                        /*'slug' => str_slug('Ayna'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chilcas
                    District::create([
                        'name' => 'Chilcas',
                        /*'slug' => str_slug('Chilcas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chungui
                    District::create([
                        'name' => 'Chungui',
                        /*'slug' => str_slug('Chungui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Luis Carranza
                    District::create([
                        'name' => 'Luis Carranza',
                        /*'slug' => str_slug('Luis Carranza'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa
                    District::create([
                        'name' => 'Santa Rosa',
                        /*'slug' => str_slug('Santa Rosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tambo
                    District::create([
                        'name' => 'Tambo',
                        /*'slug' => str_slug('Tambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Samugari
                    District::create([
                        'name' => 'Samugari',
                        /*'slug' => str_slug('Samugari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anchihuay
                    District::create([
                        'name' => 'Anchihuay',
                        /*'slug' => str_slug('Anchihuay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Oronccoy
                    District::create([
                        'name' => 'Oronccoy',
                        /*'slug' => str_slug('Oronccoy'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Lucanas ====================================
              $province = Province::create([
                  'name' => 'Lucanas',
                  /*'slug' => str_slug('Lucanas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Puquio
                    District::create([
                        'name' => 'Puquio',
                        /*'slug' => str_slug('Puquio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aucara
                    District::create([
                        'name' => 'Aucara',
                        /*'slug' => str_slug('Aucara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cabana
                    District::create([
                        'name' => 'Cabana',
                        /*'slug' => str_slug('Cabana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carmen Salcedo
                    District::create([
                        'name' => 'Carmen Salcedo',
                        /*'slug' => str_slug('Carmen Salcedo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chaviña
                    District::create([
                        'name' => 'Chaviña',
                        /*'slug' => str_slug('Chaviña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chipao
                    District::create([
                        'name' => 'Chipao',
                        /*'slug' => str_slug('Chipao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huac-Huas
                    District::create([
                        'name' => 'Huac-Huas',
                        /*'slug' => str_slug('Huac-Huas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Laramate
                    District::create([
                        'name' => 'Laramate',
                        /*'slug' => str_slug('Laramate'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Leoncio Prado
                    District::create([
                        'name' => 'Leoncio Prado',
                        /*'slug' => str_slug('Leoncio Prado'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llauta
                    District::create([
                        'name' => 'Llauta',
                        /*'slug' => str_slug('Llauta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lucanas
                    District::create([
                        'name' => 'Lucanas',
                        /*'slug' => str_slug('Lucanas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocaña
                    District::create([
                        'name' => 'Ocaña',
                        /*'slug' => str_slug('Ocaña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Otoca
                    District::create([
                        'name' => 'Otoca',
                        /*'slug' => str_slug('Otoca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Saisa
                    District::create([
                        'name' => 'Saisa',
                        /*'slug' => str_slug('Saisa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Cristóbal
                    District::create([
                        'name' => 'San Cristóbal',
                        /*'slug' => str_slug('San Cristóbal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan
                    District::create([
                        'name' => 'San Juan',
                        /*'slug' => str_slug('San Juan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro
                    District::create([
                        'name' => 'San Pedro',
                        /*'slug' => str_slug('San Pedro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Palco
                    District::create([
                        'name' => 'San Pedro de Palco',
                        /*'slug' => str_slug('San Pedro de Palco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sancos
                    District::create([
                        'name' => 'Sancos',
                        /*'slug' => str_slug('Sancos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Ana de Huaycahuacho
                    District::create([
                        'name' => 'Santa Ana de Huaycahuacho',
                        /*'slug' => str_slug('Santa Ana de Huaycahuacho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Lucia
                    District::create([
                        'name' => 'Santa Lucia',
                        /*'slug' => str_slug('Santa Lucia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Parinacochas ====================================
              $province = Province::create([
                  'name' => 'Parinacochas',
                  /*'slug' => str_slug('Parinacochas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Coracora
                    District::create([
                        'name' => 'Coracora',
                        /*'slug' => str_slug('Coracora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chumpi
                    District::create([
                        'name' => 'Chumpi',
                        /*'slug' => str_slug('Chumpi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coronel Castañeda
                    District::create([
                        'name' => 'Coronel Castañeda',
                        /*'slug' => str_slug('Coronel Castañeda'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pacapausa
                    District::create([
                        'name' => 'Pacapausa',
                        /*'slug' => str_slug('Pacapausa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pullo
                    District::create([
                        'name' => 'Pullo',
                        /*'slug' => str_slug('Pullo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Puyusca
                    District::create([
                        'name' => 'Puyusca',
                        /*'slug' => str_slug('Puyusca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Ravacayco
                    District::create([
                        'name' => 'San Francisco de Ravacayco',
                        /*'slug' => str_slug('San Francisco de Ravacayco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Upahuacho
                    District::create([
                        'name' => 'Upahuacho',
                        /*'slug' => str_slug('Upahuacho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Páucar del Sara Sara ====================================
              $province = Province::create([
                  'name' => 'Páucar del Sara Sara',
                  /*'slug' => str_slug('Páucar del Sara Sara'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Pausa
                    District::create([
                        'name' => 'Pausa',
                        /*'slug' => str_slug('Pausa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colta
                    District::create([
                        'name' => 'Colta',
                        /*'slug' => str_slug('Colta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Corculla
                    District::create([
                        'name' => 'Corculla',
                        /*'slug' => str_slug('Corculla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lampa
                    District::create([
                        'name' => 'Lampa',
                        /*'slug' => str_slug('Lampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcabamba
                    District::create([
                        'name' => 'Marcabamba',
                        /*'slug' => str_slug('Marcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Oyolo
                    District::create([
                        'name' => 'Oyolo',
                        /*'slug' => str_slug('Oyolo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pararca
                    District::create([
                        'name' => 'Pararca',
                        /*'slug' => str_slug('Pararca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Javier de Alpabamba
                    District::create([
                        'name' => 'San Javier de Alpabamba',
                        /*'slug' => str_slug('San Javier de Alpabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José de Ushua
                    District::create([
                        'name' => 'San José de Ushua',
                        /*'slug' => str_slug('San José de Ushua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sara Sara
                    District::create([
                        'name' => 'Sara Sara',
                        /*'slug' => str_slug('Sara Sara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Sucre ====================================
              $province = Province::create([
                  'name' => 'Sucre',
                  /*'slug' => str_slug('Sucre'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Belén
                    District::create([
                        'name' => 'Belén',
                        /*'slug' => str_slug('Belén'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chalcos
                    District::create([
                        'name' => 'Chalcos',
                        /*'slug' => str_slug('Chalcos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chilcayoc
                    District::create([
                        'name' => 'Chilcayoc',
                        /*'slug' => str_slug('Chilcayoc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacaña
                    District::create([
                        'name' => 'Huacaña',
                        /*'slug' => str_slug('Huacaña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Morcolla
                    District::create([
                        'name' => 'Morcolla',
                        /*'slug' => str_slug('Morcolla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paico
                    District::create([
                        'name' => 'Paico',
                        /*'slug' => str_slug('Paico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Larcay
                    District::create([
                        'name' => 'San Pedro de Larcay',
                        /*'slug' => str_slug('San Pedro de Larcay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Salvador de Quije
                    District::create([
                        'name' => 'San Salvador de Quije',
                        /*'slug' => str_slug('San Salvador de Quije'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Paucaray
                    District::create([
                        'name' => 'Santiago de Paucaray',
                        /*'slug' => str_slug('Santiago de Paucaray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Soras
                    District::create([
                        'name' => 'Soras',
                        /*'slug' => str_slug('Soras'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Víctor Fajardo ====================================
              $province = Province::create([
                  'name' => 'Víctor Fajardo',
                  /*'slug' => str_slug('Víctor Fajardo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huancapi
                    District::create([
                        'name' => 'Huancapi',
                        /*'slug' => str_slug('Huancapi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alcamenca
                    District::create([
                        'name' => 'Alcamenca',
                        /*'slug' => str_slug('Alcamenca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Apongo
                    District::create([
                        'name' => 'Apongo',
                        /*'slug' => str_slug('Apongo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Asquipata
                    District::create([
                        'name' => 'Asquipata',
                        /*'slug' => str_slug('Asquipata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Canaria
                    District::create([
                        'name' => 'Canaria',
                        /*'slug' => str_slug('Canaria'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cayara
                    District::create([
                        'name' => 'Cayara',
                        /*'slug' => str_slug('Cayara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colca
                    District::create([
                        'name' => 'Colca',
                        /*'slug' => str_slug('Colca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huamanquiquia
                    District::create([
                        'name' => 'Huamanquiquia',
                        /*'slug' => str_slug('Huamanquiquia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancaraylla
                    District::create([
                        'name' => 'Huancaraylla',
                        /*'slug' => str_slug('Huancaraylla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Hualla
                    District::create([
                        'name' => 'Hualla',
                        /*'slug' => str_slug('Hualla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sarhua
                    District::create([
                        'name' => 'Sarhua',
                        /*'slug' => str_slug('Sarhua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vilcanchos
                    District::create([
                        'name' => 'Vilcanchos',
                        /*'slug' => str_slug('Vilcanchos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Vilcas Huamán ====================================
              $province = Province::create([
                  'name' => 'Vilcas Huamán',
                  /*'slug' => str_slug('Vilcas Huamán'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Vilcas Huamán
                    District::create([
                        'name' => 'Vilcas Huamán',
                        /*'slug' => str_slug('Vilcas Huamán'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Accomarca
                    District::create([
                        'name' => 'Accomarca',
                        /*'slug' => str_slug('Accomarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carhuanca
                    District::create([
                        'name' => 'Carhuanca',
                        /*'slug' => str_slug('Carhuanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Concepción
                    District::create([
                        'name' => 'Concepción',
                        /*'slug' => str_slug('Concepción'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huambalpa
                    District::create([
                        'name' => 'Huambalpa',
                        /*'slug' => str_slug('Huambalpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Independencia
                    District::create([
                        'name' => 'Independencia',
                        /*'slug' => str_slug('Independencia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Saurama
                    District::create([
                        'name' => 'Saurama',
                        /*'slug' => str_slug('Saurama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vischongo
                    District::create([
                        'name' => 'Vischongo',
                        /*'slug' => str_slug('Vischongo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Cajamarca //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Cajamarca',
            /*'slug' => str_slug('Cajamarca'),*/
            'country_id' => 1, //Peru
        ]);

              // Cajamarca ====================================
              $province = Province::create([
                  'name' => 'Cajamarca',
                  /*'slug' => str_slug('Cajamarca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cajamarca
                    District::create([
                        'name' => 'Cajamarca',
                        /*'slug' => str_slug('Cajamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Asunción
                    District::create([
                        'name' => 'Asunción',
                        /*'slug' => str_slug('Asunción'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chetilla
                    District::create([
                        'name' => 'Chetilla',
                        /*'slug' => str_slug('Chetilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cospan
                    District::create([
                        'name' => 'Cospan',
                        /*'slug' => str_slug('Cospan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Encañada
                    District::create([
                        'name' => 'La Encañada',
                        /*'slug' => str_slug('La Encañada'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jesús
                    District::create([
                        'name' => 'Jesús',
                        /*'slug' => str_slug('Jesús'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llacanora
                    District::create([
                        'name' => 'Llacanora',
                        /*'slug' => str_slug('Llacanora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Los Baños del Inca
                    District::create([
                        'name' => 'Los Baños del Inca',
                        /*'slug' => str_slug('Los Baños del Inca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Magdalena
                    District::create([
                        'name' => 'Magdalena',
                        /*'slug' => str_slug('Magdalena'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Matara
                    District::create([
                        'name' => 'Matara',
                        /*'slug' => str_slug('Matara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Namora
                    District::create([
                        'name' => 'Namora',
                        /*'slug' => str_slug('Namora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan
                    District::create([
                        'name' => 'San Juan',
                        /*'slug' => str_slug('San Juan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Cajabamba ====================================
              $province = Province::create([
                  'name' => 'Cajabamba',
                  /*'slug' => str_slug('Cajabamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cajabamba
                    District::create([
                        'name' => 'Cajabamba',
                        /*'slug' => str_slug('Cajabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cachachi
                    District::create([
                        'name' => 'Cachachi',
                        /*'slug' => str_slug('Cachachi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Condebamba
                    District::create([
                        'name' => 'Condebamba',
                        /*'slug' => str_slug('Condebamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sitacocha
                    District::create([
                        'name' => 'Sitacocha',
                        /*'slug' => str_slug('Sitacocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Celendín ====================================
              $province = Province::create([
                  'name' => 'Celendín',
                  /*'slug' => str_slug('Celendín'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Celendín
                    District::create([
                        'name' => 'Celendín',
                        /*'slug' => str_slug('Celendín'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chumuch
                    District::create([
                        'name' => 'Chumuch',
                        /*'slug' => str_slug('Chumuch'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cortegana
                    District::create([
                        'name' => 'Cortegana',
                        /*'slug' => str_slug('Cortegana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huasmin
                    District::create([
                        'name' => 'Huasmin',
                        /*'slug' => str_slug('Huasmin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jorge Chávez
                    District::create([
                        'name' => 'Jorge Chávez',
                        /*'slug' => str_slug('Jorge Chávez'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José Gálvez
                    District::create([
                        'name' => 'José Gálvez',
                        /*'slug' => str_slug('José Gálvez'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Miguel Iglesias
                    District::create([
                        'name' => 'Miguel Iglesias',
                        /*'slug' => str_slug('Miguel Iglesias'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Oxamarca
                    District::create([
                        'name' => 'Oxamarca',
                        /*'slug' => str_slug('Oxamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sorochuco
                    District::create([
                        'name' => 'Sorochuco',
                        /*'slug' => str_slug('Sorochuco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sucre
                    District::create([
                        'name' => 'Sucre',
                        /*'slug' => str_slug('Sucre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Utco
                    District::create([
                        'name' => 'Utco',
                        /*'slug' => str_slug('Utco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Libertad de Pallan
                    District::create([
                        'name' => 'La Libertad de Pallan',
                        /*'slug' => str_slug('La Libertad de Pallan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chota ====================================
              $province = Province::create([
                  'name' => 'Chota',
                  /*'slug' => str_slug('Chota'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chota
                    District::create([
                        'name' => 'Chota',
                        /*'slug' => str_slug('Chota'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anguia
                    District::create([
                        'name' => 'Anguia',
                        /*'slug' => str_slug('Anguia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chadin
                    District::create([
                        'name' => 'Chadin',
                        /*'slug' => str_slug('Chadin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chiguirip
                    District::create([
                        'name' => 'Chiguirip',
                        /*'slug' => str_slug('Chiguirip'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chimban
                    District::create([
                        'name' => 'Chimban',
                        /*'slug' => str_slug('Chimban'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Choropampa
                    District::create([
                        'name' => 'Choropampa',
                        /*'slug' => str_slug('Choropampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochabamba
                    District::create([
                        'name' => 'Cochabamba',
                        /*'slug' => str_slug('Cochabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Conchan
                    District::create([
                        'name' => 'Conchan',
                        /*'slug' => str_slug('Conchan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huambos
                    District::create([
                        'name' => 'Huambos',
                        /*'slug' => str_slug('Huambos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lajas
                    District::create([
                        'name' => 'Lajas',
                        /*'slug' => str_slug('Lajas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llama
                    District::create([
                        'name' => 'Llama',
                        /*'slug' => str_slug('Llama'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Miracosta
                    District::create([
                        'name' => 'Miracosta',
                        /*'slug' => str_slug('Miracosta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paccha
                    District::create([
                        'name' => 'Paccha',
                        /*'slug' => str_slug('Paccha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pion
                    District::create([
                        'name' => 'Pion',
                        /*'slug' => str_slug('Pion'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Querocoto
                    District::create([
                        'name' => 'Querocoto',
                        /*'slug' => str_slug('Querocoto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Licupis
                    District::create([
                        'name' => 'San Juan de Licupis',
                        /*'slug' => str_slug('San Juan de Licupis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tacabamba
                    District::create([
                        'name' => 'Tacabamba',
                        /*'slug' => str_slug('Tacabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tocmoche
                    District::create([
                        'name' => 'Tocmoche',
                        /*'slug' => str_slug('Tocmoche'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chalamarca
                    District::create([
                        'name' => 'Chalamarca',
                        /*'slug' => str_slug('Chalamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Contumazá	 ====================================
              $province = Province::create([
                  'name' => 'Contumazá	',
                  /*'slug' => str_slug('Contumazá	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Contumazá
                    District::create([
                        'name' => 'Contumazá	',
                        /*'slug' => str_slug('Contumazá	'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chilete
                    District::create([
                        'name' => 'Chilete',
                        /*'slug' => str_slug('Chilete'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cupisnique
                    District::create([
                        'name' => 'Cupisnique',
                        /*'slug' => str_slug('Cupisnique'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Guzmango
                    District::create([
                        'name' => 'Guzmango',
                        /*'slug' => str_slug('Guzmango'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Benito
                    District::create([
                        'name' => 'San Benito',
                        /*'slug' => str_slug('San Benito'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Cruz de Toledo
                    District::create([
                        'name' => 'Santa Cruz de Toledo',
                        /*'slug' => str_slug('Santa Cruz de Toledo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tantarica
                    District::create([
                        'name' => 'Tantarica',
                        /*'slug' => str_slug('Tantarica'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yonan
                    District::create([
                        'name' => 'Yonan',
                        /*'slug' => str_slug('Yonan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Cutervo	 ====================================
              $province = Province::create([
                  'name' => 'Cutervo	',
                  /*'slug' => str_slug('Cutervo	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cutervo
                    District::create([
                        'name' => 'Cutervo',
                        /*'slug' => str_slug('Cutervo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Callayuc
                    District::create([
                        'name' => 'Callayuc',
                        /*'slug' => str_slug('Callayuc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Choros
                    District::create([
                        'name' => 'Choros',
                        /*'slug' => str_slug('Choros'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cujillo
                    District::create([
                        'name' => 'Cujillo',
                        /*'slug' => str_slug('Cujillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Ramada
                    District::create([
                        'name' => 'La Ramada',
                        /*'slug' => str_slug('La Ramada'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pimpingos
                    District::create([
                        'name' => 'Pimpingos',
                        /*'slug' => str_slug('Pimpingos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Querocotillo
                    District::create([
                        'name' => 'Querocotillo',
                        /*'slug' => str_slug('Querocotillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Andrés de Cutervo
                    District::create([
                        'name' => 'San Andrés de Cutervo',
                        /*'slug' => str_slug('San Andrés de Cutervo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Cutervo
                    District::create([
                        'name' => 'San Juan de Cutervo',
                        /*'slug' => str_slug('San Juan de Cutervo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Luis de Lucma
                    District::create([
                        'name' => 'San Luis de Lucma',
                        /*'slug' => str_slug('San Luis de Lucma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Cruz
                    District::create([
                        'name' => 'Santa Cruz',
                        /*'slug' => str_slug('Santa Cruz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Domingo de la Capilla
                    District::create([
                        'name' => 'Santo Domingo de la Capilla',
                        /*'slug' => str_slug('Santo Domingo de la Capilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Tomas
                    District::create([
                        'name' => 'Santo Tomas',
                        /*'slug' => str_slug('Santo Tomas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Socota
                    District::create([
                        'name' => 'Socota',
                        /*'slug' => str_slug('Socota'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Toribio Casanova
                    District::create([
                        'name' => 'Toribio Casanova',
                        /*'slug' => str_slug('Toribio Casanova'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Hualgayoc	 ====================================
              $province = Province::create([
                  'name' => 'Hualgayoc	',
                  /*'slug' => str_slug('Hualgayoc	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Bambamarca
                    District::create([
                        'name' => 'Bambamarca',
                        /*'slug' => str_slug('Bambamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chugur
                    District::create([
                        'name' => 'Chugur',
                        /*'slug' => str_slug('Chugur'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Hualgayoc
                    District::create([
                        'name' => 'Hualgayoc',
                        /*'slug' => str_slug('Hualgayoc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Jaén	 ====================================
              $province = Province::create([
                  'name' => 'Jaén	',
                  /*'slug' => str_slug('Jaén	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Jaén
                    District::create([
                        'name' => 'Jaén',
                        /*'slug' => str_slug('Jaén'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bellavista
                    District::create([
                        'name' => 'Bellavista',
                        /*'slug' => str_slug('Bellavista'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chontali
                    District::create([
                        'name' => 'Chontali',
                        /*'slug' => str_slug('Chontali'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colasay
                    District::create([
                        'name' => 'Colasay',
                        /*'slug' => str_slug('Colasay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huabal
                    District::create([
                        'name' => 'Huabal',
                        /*'slug' => str_slug('Huabal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Las Pirias
                    District::create([
                        'name' => 'Las Pirias',
                        /*'slug' => str_slug('Las Pirias'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pomahuaca
                    District::create([
                        'name' => 'Pomahuaca',
                        /*'slug' => str_slug('Pomahuaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pucara
                    District::create([
                        'name' => 'Pucara',
                        /*'slug' => str_slug('Pucara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sallique
                    District::create([
                        'name' => 'Sallique',
                        /*'slug' => str_slug('Sallique'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Felipe
                    District::create([
                        'name' => 'San Felipe',
                        /*'slug' => str_slug('San Felipe'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José del Alto
                    District::create([
                        'name' => 'San José del Alto',
                        /*'slug' => str_slug('San José del Alto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa
                    District::create([
                        'name' => 'Santa Rosa',
                        /*'slug' => str_slug('Santa Rosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // San Ignacio	 ====================================
              $province = Province::create([
                  'name' => 'San Ignacio	',
                  /*'slug' => str_slug('San Ignacio	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Ignacio
                    District::create([
                        'name' => 'San Ignacio',
                        /*'slug' => str_slug('San Ignacio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chirinos
                    District::create([
                        'name' => 'Chirinos',
                        /*'slug' => str_slug('Chirinos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huarango
                    District::create([
                        'name' => 'Huarango',
                        /*'slug' => str_slug('Huarango'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Coipa
                    District::create([
                        'name' => 'La Coipa',
                        /*'slug' => str_slug('La Coipa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Namballe
                    District::create([
                        'name' => 'Namballe',
                        /*'slug' => str_slug('Namballe'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José de Lourdes
                    District::create([
                        'name' => 'San José de Lourdes',
                        /*'slug' => str_slug('San José de Lourdes'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tabaconas
                    District::create([
                        'name' => 'Tabaconas',
                        /*'slug' => str_slug('Tabaconas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // San Marcos	 ====================================
              $province = Province::create([
                  'name' => 'San Marcos	',
                  /*'slug' => str_slug('San Marcos	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Pedro Gálvez
                    District::create([
                        'name' => 'Pedro Gálvez',
                        /*'slug' => str_slug('Pedro Gálvez'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chancay
                    District::create([
                        'name' => 'Chancay',
                        /*'slug' => str_slug('Chancay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Eduardo Villanueva
                    District::create([
                        'name' => 'Eduardo Villanueva',
                        /*'slug' => str_slug('Eduardo Villanueva'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Gregorio Pita
                    District::create([
                        'name' => 'Gregorio Pita',
                        /*'slug' => str_slug('Gregorio Pita'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ichocan
                    District::create([
                        'name' => 'Ichocan',
                        /*'slug' => str_slug('Ichocan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José Manuel Quiroz
                    District::create([
                        'name' => 'José Manuel Quiroz',
                        /*'slug' => str_slug('José Manuel Quiroz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José Sabogal
                    District::create([
                        'name' => 'José Sabogal',
                        /*'slug' => str_slug('José Sabogal'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // San Miguel	 ====================================
              $province = Province::create([
                  'name' => 'San Miguel	',
                  /*'slug' => str_slug('San Miguel	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Miguel
                    District::create([
                        'name' => 'San Miguel',
                        /*'slug' => str_slug('San Miguel'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bolívar
                    District::create([
                        'name' => 'Bolívar',
                        /*'slug' => str_slug('Bolívar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Calquis
                    District::create([
                        'name' => 'Calquis',
                        /*'slug' => str_slug('Calquis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Catilluc
                    District::create([
                        'name' => 'Catilluc',
                        /*'slug' => str_slug('Catilluc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Prado
                    District::create([
                        'name' => 'El Prado',
                        /*'slug' => str_slug('El Prado'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Florida
                    District::create([
                        'name' => 'La Florida',
                        /*'slug' => str_slug('La Florida'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llapa
                    District::create([
                        'name' => 'Llapa',
                        /*'slug' => str_slug('Llapa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nanchoc
                    District::create([
                        'name' => 'Nanchoc',
                        /*'slug' => str_slug('Nanchoc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Niepos
                    District::create([
                        'name' => 'Niepos',
                        /*'slug' => str_slug('Niepos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Gregorio
                    District::create([
                        'name' => 'San Gregorio',
                        /*'slug' => str_slug('San Gregorio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Silvestre de Cochan
                    District::create([
                        'name' => 'San Silvestre de Cochan',
                        /*'slug' => str_slug('San Silvestre de Cochan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tongod
                    District::create([
                        'name' => 'Tongod',
                        /*'slug' => str_slug('Tongod'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Unión Agua Blanca
                    District::create([
                        'name' => 'Unión Agua Blanca',
                        /*'slug' => str_slug('Unión Agua Blanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // San Pablo	 ====================================
              $province = Province::create([
                  'name' => 'San Pablo	',
                  /*'slug' => str_slug('San Pablo	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // San Pablo
                    District::create([
                        'name' => 'San Pablo',
                        /*'slug' => str_slug('San Pablo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Bernardino
                    District::create([
                        'name' => 'San Bernardino',
                        /*'slug' => str_slug('San Bernardino'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Luis
                    District::create([
                        'name' => 'San Luis',
                        /*'slug' => str_slug('San Luis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tumbaden
                    District::create([
                        'name' => 'Tumbaden',
                        /*'slug' => str_slug('Tumbaden'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Santa Cruz	 ====================================
              $province = Province::create([
                  'name' => 'Santa Cruz	',
                  /*'slug' => str_slug('Santa Cruz	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Santa Cruz
                    District::create([
                        'name' => 'Santa Cruz',
                        /*'slug' => str_slug('Santa Cruz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andabamba
                    District::create([
                        'name' => 'Andabamba',
                        /*'slug' => str_slug('Andabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Catache
                    District::create([
                        'name' => 'Catache',
                        /*'slug' => str_slug('Catache'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chancaybaños
                    District::create([
                        'name' => 'Chancaybaños',
                        /*'slug' => str_slug('Chancaybaños'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Esperanza
                    District::create([
                        'name' => 'La Esperanza',
                        /*'slug' => str_slug('La Esperanza'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ninabamba
                    District::create([
                        'name' => 'Ninabamba',
                        /*'slug' => str_slug('Ninabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pulan
                    District::create([
                        'name' => 'Pulan',
                        /*'slug' => str_slug('Pulan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Saucepampa
                    District::create([
                        'name' => 'Saucepampa',
                        /*'slug' => str_slug('Saucepampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sexi
                    District::create([
                        'name' => 'Sexi',
                        /*'slug' => str_slug('Sexi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Uticyacu
                    District::create([
                        'name' => 'Uticyacu',
                        /*'slug' => str_slug('Uticyacu'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauyucan
                    District::create([
                        'name' => 'Yauyucan',
                        /*'slug' => str_slug('Yauyucan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Callao //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Callao',
            /*'slug' => str_slug('Callao'),*/
            'country_id' => 1, //Peru
        ]);

              // Prov. Const. del Callao ====================================
              $province = Province::create([
                  'name' => 'Prov. Const. del Callao',
                  /*'slug' => str_slug('Prov. Const. del Callao'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Callao
                    District::create([
                        'name' => 'Callao',
                        /*'slug' => str_slug('Callao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Bellavista
                    District::create([
                        'name' => 'Bellavista',
                        /*'slug' => str_slug('Bellavista'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carmen de la Legua Reynoso
                    District::create([
                        'name' => 'Carmen de la Legua Reynoso',
                        /*'slug' => str_slug('Carmen de la Legua Reynoso'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Perla
                    District::create([
                        'name' => 'La Perla',
                        /*'slug' => str_slug('La Perla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Punta
                    District::create([
                        'name' => 'La Punta',
                        /*'slug' => str_slug('La Punta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ventanilla
                    District::create([
                        'name' => 'Ventanilla',
                        /*'slug' => str_slug('Ventanilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mi Perú
                    District::create([
                        'name' => 'Mi Perú',
                        /*'slug' => str_slug('Mi Perú'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Cusco //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Cusco',
            /*'slug' => str_slug('Cusco'),*/
            'country_id' => 1, //Peru
        ]);

              // Cusco ====================================
              $province = Province::create([
                  'name' => 'Cusco',
                  /*'slug' => str_slug('Cusco'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Cusco
                    District::create([
                        'name' => 'Cusco',
                        /*'slug' => str_slug('Cusco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ccorca
                    District::create([
                        'name' => 'Ccorca',
                        /*'slug' => str_slug('Ccorca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Poroy
                    District::create([
                        'name' => 'Poroy',
                        /*'slug' => str_slug('Poroy'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Jerónimo
                    District::create([
                        'name' => 'San Jerónimo',
                        /*'slug' => str_slug('San Jerónimo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Sebastian
                    District::create([
                        'name' => 'San Sebastian',
                        /*'slug' => str_slug('San Sebastian'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago
                    District::create([
                        'name' => 'Santiago',
                        /*'slug' => str_slug('Santiago'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Saylla
                    District::create([
                        'name' => 'Saylla',
                        /*'slug' => str_slug('Saylla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Wanchaq
                    District::create([
                        'name' => 'Wanchaq',
                        /*'slug' => str_slug('Wanchaq'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Acomayo ====================================
              $province = Province::create([
                  'name' => 'Acomayo',
                  /*'slug' => str_slug('Acomayo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Acomayo
                    District::create([
                        'name' => 'Acomayo',
                        /*'slug' => str_slug('Acomayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acopia
                    District::create([
                        'name' => 'Acopia',
                        /*'slug' => str_slug('Acopia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acos
                    District::create([
                        'name' => 'Acos',
                        /*'slug' => str_slug('Acos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mosoc Llacta
                    District::create([
                        'name' => 'Mosoc Llacta',
                        /*'slug' => str_slug('Mosoc Llacta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pomacanchi
                    District::create([
                        'name' => 'Pomacanchi',
                        /*'slug' => str_slug('Pomacanchi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rondocan
                    District::create([
                        'name' => 'Rondocan',
                        /*'slug' => str_slug('Rondocan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sangarara
                    District::create([
                        'name' => 'Sangarara',
                        /*'slug' => str_slug('Sangarara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Anta ====================================
              $province = Province::create([
                  'name' => 'Anta',
                  /*'slug' => str_slug('Anta'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Anta
                    District::create([
                        'name' => 'Anta',
                        /*'slug' => str_slug('Anta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ancahuasi
                    District::create([
                        'name' => 'Ancahuasi',
                        /*'slug' => str_slug('Ancahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cachimayo
                    District::create([
                        'name' => 'Cachimayo',
                        /*'slug' => str_slug('Cachimayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chinchaypujio
                    District::create([
                        'name' => 'Chinchaypujio',
                        /*'slug' => str_slug('Chinchaypujio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huarocondo
                    District::create([
                        'name' => 'Huarocondo',
                        /*'slug' => str_slug('Huarocondo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Limatambo
                    District::create([
                        'name' => 'Limatambo',
                        /*'slug' => str_slug('Limatambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mollepata
                    District::create([
                        'name' => 'Mollepata',
                        /*'slug' => str_slug('Mollepata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pucyura
                    District::create([
                        'name' => 'Pucyura',
                        /*'slug' => str_slug('Pucyura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Zurite
                    District::create([
                        'name' => 'Zurite',
                        /*'slug' => str_slug('Zurite'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Calca ====================================
              $province = Province::create([
                  'name' => 'Calca',
                  /*'slug' => str_slug('Calca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Calca
                    District::create([
                        'name' => 'Calca',
                        /*'slug' => str_slug('Calca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coya
                    District::create([
                        'name' => 'Coya',
                        /*'slug' => str_slug('Coya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lamay
                    District::create([
                        'name' => 'Lamay',
                        /*'slug' => str_slug('Lamay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lares
                    District::create([
                        'name' => 'Lares',
                        /*'slug' => str_slug('Lares'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pisac
                    District::create([
                        'name' => 'Pisac',
                        /*'slug' => str_slug('Pisac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Salvador
                    District::create([
                        'name' => 'San Salvador',
                        /*'slug' => str_slug('San Salvador'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Taray
                    District::create([
                        'name' => 'Taray',
                        /*'slug' => str_slug('Taray'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanatile
                    District::create([
                        'name' => 'Yanatile',
                        /*'slug' => str_slug('Yanatile'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Canas ====================================
              $province = Province::create([
                  'name' => 'Canas',
                  /*'slug' => str_slug('Canas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Yanaoca
                    District::create([
                        'name' => 'Yanaoca',
                        /*'slug' => str_slug('Yanaoca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Checca
                    District::create([
                        'name' => 'Checca',
                        /*'slug' => str_slug('Checca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Kunturkanki
                    District::create([
                        'name' => 'Kunturkanki',
                        /*'slug' => str_slug('Kunturkanki'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Langui
                    District::create([
                        'name' => 'Langui',
                        /*'slug' => str_slug('Langui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Layo
                    District::create([
                        'name' => 'Layo',
                        /*'slug' => str_slug('Layo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampamarca
                    District::create([
                        'name' => 'Pampamarca',
                        /*'slug' => str_slug('Pampamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quehue
                    District::create([
                        'name' => 'Quehue',
                        /*'slug' => str_slug('Quehue'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tupac Amaru
                    District::create([
                        'name' => 'Tupac Amaru',
                        /*'slug' => str_slug('Tupac Amaru'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Canchis ====================================
              $province = Province::create([
                  'name' => 'Canchis',
                  /*'slug' => str_slug('Canchis'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Sicuani
                    District::create([
                        'name' => 'Sicuani',
                        /*'slug' => str_slug('Sicuani'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Checacupe
                    District::create([
                        'name' => 'Checacupe',
                        /*'slug' => str_slug('Checacupe'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Combapata
                    District::create([
                        'name' => 'Combapata',
                        /*'slug' => str_slug('Combapata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marangani
                    District::create([
                        'name' => 'Marangani',
                        /*'slug' => str_slug('Marangani'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pitumarca
                    District::create([
                        'name' => 'Pitumarca',
                        /*'slug' => str_slug('Pitumarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pablo
                    District::create([
                        'name' => 'San Pablo',
                        /*'slug' => str_slug('San Pablo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro
                    District::create([
                        'name' => 'San Pedro',
                        /*'slug' => str_slug('San Pedro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tinta
                    District::create([
                        'name' => 'Tinta',
                        /*'slug' => str_slug('Tinta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chumbivilcas ====================================
              $province = Province::create([
                  'name' => 'Chumbivilcas',
                  /*'slug' => str_slug('Chumbivilcas'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Santo Tomas
                    District::create([
                        'name' => 'Santo Tomas',
                        /*'slug' => str_slug('Santo Tomas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Capacmarca
                    District::create([
                        'name' => 'Capacmarca',
                        /*'slug' => str_slug('Capacmarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chamaca
                    District::create([
                        'name' => 'Chamaca',
                        /*'slug' => str_slug('Chamaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colquemarca
                    District::create([
                        'name' => 'Colquemarca',
                        /*'slug' => str_slug('Colquemarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Livitaca
                    District::create([
                        'name' => 'Livitaca',
                        /*'slug' => str_slug('Livitaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llusco
                    District::create([
                        'name' => 'Llusco',
                        /*'slug' => str_slug('Llusco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quiñota
                    District::create([
                        'name' => 'Quiñota',
                        /*'slug' => str_slug('Quiñota'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Velille
                    District::create([
                        'name' => 'Velille',
                        /*'slug' => str_slug('Velille'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Espinar ====================================
              $province = Province::create([
                  'name' => 'Espinar',
                  /*'slug' => str_slug('Espinar'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Espinar
                    District::create([
                        'name' => 'Espinar',
                        /*'slug' => str_slug('Espinar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Condoroma
                    District::create([
                        'name' => 'Condoroma',
                        /*'slug' => str_slug('Condoroma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coporaque
                    District::create([
                        'name' => 'Coporaque',
                        /*'slug' => str_slug('Coporaque'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocoruro
                    District::create([
                        'name' => 'Ocoruro',
                        /*'slug' => str_slug('Ocoruro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pallpata
                    District::create([
                        'name' => 'Pallpata',
                        /*'slug' => str_slug('Pallpata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pichigua
                    District::create([
                        'name' => 'Pichigua',
                        /*'slug' => str_slug('Pichigua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Suyckutambo
                    District::create([
                        'name' => 'Suyckutambo',
                        /*'slug' => str_slug('Suyckutambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alto Pichigua
                    District::create([
                        'name' => 'Alto Pichigua',
                        /*'slug' => str_slug('Alto Pichigua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // La Convención	 ====================================
              $province = Province::create([
                  'name' => 'La Convención	',
                  /*'slug' => str_slug('La Convención	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Santa Ana
                    District::create([
                        'name' => 'Santa Ana',
                        /*'slug' => str_slug('Santa Ana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Echarate
                    District::create([
                        'name' => 'Echarate',
                        /*'slug' => str_slug('Echarate'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayopata
                    District::create([
                        'name' => 'Huayopata',
                        /*'slug' => str_slug('Huayopata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Maranura
                    District::create([
                        'name' => 'Maranura',
                        /*'slug' => str_slug('Maranura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocobamba
                    District::create([
                        'name' => 'Ocobamba',
                        /*'slug' => str_slug('Ocobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quellouno
                    District::create([
                        'name' => 'Quellouno',
                        /*'slug' => str_slug('Quellouno'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Kimbiri
                    District::create([
                        'name' => 'Kimbiri',
                        /*'slug' => str_slug('Kimbiri'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Teresa
                    District::create([
                        'name' => 'Santa Teresa',
                        /*'slug' => str_slug('Santa Teresa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vilcabamba
                    District::create([
                        'name' => 'Vilcabamba',
                        /*'slug' => str_slug('Vilcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pichari
                    District::create([
                        'name' => 'Pichari',
                        /*'slug' => str_slug('Pichari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Inkawasi
                    District::create([
                        'name' => 'Inkawasi',
                        /*'slug' => str_slug('Inkawasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Villa Virgen
                    District::create([
                        'name' => 'Villa Virgen',
                        /*'slug' => str_slug('Villa Virgen'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Villa Kintiarina
                    District::create([
                        'name' => 'Villa Kintiarina',
                        /*'slug' => str_slug('Villa Kintiarina'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Megantoni
                    District::create([
                        'name' => 'Megantoni',
                        /*'slug' => str_slug('Megantoni'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Paruro	 ====================================
              $province = Province::create([
                  'name' => 'Paruro	',
                  /*'slug' => str_slug('Paruro	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Paruro
                    District::create([
                        'name' => 'Paruro',
                        /*'slug' => str_slug('Paruro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Accha
                    District::create([
                        'name' => 'Accha',
                        /*'slug' => str_slug('Accha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ccapi
                    District::create([
                        'name' => 'Ccapi',
                        /*'slug' => str_slug('Ccapi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colcha
                    District::create([
                        'name' => 'Colcha',
                        /*'slug' => str_slug('Colcha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanoquite
                    District::create([
                        'name' => 'Huanoquite',
                        /*'slug' => str_slug('Huanoquite'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Omacha
                    District::create([
                        'name' => 'Omacha',
                        /*'slug' => str_slug('Omacha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paccaritambo
                    District::create([
                        'name' => 'Paccaritambo',
                        /*'slug' => str_slug('Paccaritambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pillpinto
                    District::create([
                        'name' => 'Pillpinto',
                        /*'slug' => str_slug('Pillpinto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yaurisque
                    District::create([
                        'name' => 'Yaurisque',
                        /*'slug' => str_slug('Yaurisque'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Paucartambo	 ====================================
              $province = Province::create([
                  'name' => 'Paucartambo	',
                  /*'slug' => str_slug('Paucartambo	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Paucartambo
                    District::create([
                        'name' => 'Paucartambo',
                        /*'slug' => str_slug('Paucartambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Caicay
                    District::create([
                        'name' => 'Caicay',
                        /*'slug' => str_slug('Caicay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Challabamba
                    District::create([
                        'name' => 'Challabamba',
                        /*'slug' => str_slug('Challabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colquepata
                    District::create([
                        'name' => 'Colquepata',
                        /*'slug' => str_slug('Colquepata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancarani
                    District::create([
                        'name' => 'Huancarani',
                        /*'slug' => str_slug('Huancarani'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Kosñipata
                    District::create([
                        'name' => 'Kosñipata',
                        /*'slug' => str_slug('Kosñipata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Quispicanchi	 ====================================
              $province = Province::create([
                  'name' => 'Quispicanchi	',
                  /*'slug' => str_slug('Quispicanchi	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Urcos
                    District::create([
                        'name' => 'Urcos',
                        /*'slug' => str_slug('Urcos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andahuaylillas
                    District::create([
                        'name' => 'Andahuaylillas',
                        /*'slug' => str_slug('Andahuaylillas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Camanti
                    District::create([
                        'name' => 'Camanti',
                        /*'slug' => str_slug('Camanti'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ccarhuayo
                    District::create([
                        'name' => 'Ccarhuayo',
                        /*'slug' => str_slug('Ccarhuayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ccatca
                    District::create([
                        'name' => 'Ccatca',
                        /*'slug' => str_slug('Ccatca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cusipata
                    District::create([
                        'name' => 'Cusipata',
                        /*'slug' => str_slug('Cusipata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaro
                    District::create([
                        'name' => 'Huaro',
                        /*'slug' => str_slug('Huaro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Lucre
                    District::create([
                        'name' => 'Lucre',
                        /*'slug' => str_slug('Lucre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcapata
                    District::create([
                        'name' => 'Marcapata',
                        /*'slug' => str_slug('Marcapata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocongate
                    District::create([
                        'name' => 'Ocongate',
                        /*'slug' => str_slug('Ocongate'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Oropesa
                    District::create([
                        'name' => 'Oropesa',
                        /*'slug' => str_slug('Oropesa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quiquijana
                    District::create([
                        'name' => 'Quiquijana',
                        /*'slug' => str_slug('Quiquijana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Urubamba	 ====================================
              $province = Province::create([
                  'name' => 'Urubamba	',
                  /*'slug' => str_slug('Urubamba	'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Urubamba
                    District::create([
                        'name' => 'Urubamba',
                        /*'slug' => str_slug('Urubamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chinchero
                    District::create([
                        'name' => 'Chinchero',
                        /*'slug' => str_slug('Chinchero'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllabamba
                    District::create([
                        'name' => 'Huayllabamba',
                        /*'slug' => str_slug('Huayllabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Machupicchu
                    District::create([
                        'name' => 'Machupicchu',
                        /*'slug' => str_slug('Machupicchu'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Maras
                    District::create([
                        'name' => 'Maras',
                        /*'slug' => str_slug('Maras'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ollantaytambo
                    District::create([
                        'name' => 'Ollantaytambo',
                        /*'slug' => str_slug('Ollantaytambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yucay
                    District::create([
                        'name' => 'Yucay',
                        /*'slug' => str_slug('Yucay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Huancavelica //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Huancavelica',
            /*'slug' => str_slug('Huancavelica'),*/
            'country_id' => 1, //Peru
        ]);

              // Huancavelica ====================================
              $province = Province::create([
                  'name' => 'Huancavelica',
                  /*'slug' => str_slug('Huancavelica'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huancavelica
                    District::create([
                        'name' => 'Huancavelica',
                        /*'slug' => str_slug('Huancavelica'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acobambilla
                    District::create([
                        'name' => 'Acobambilla',
                        /*'slug' => str_slug('Acobambilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acoria
                    District::create([
                        'name' => 'Acoria',
                        /*'slug' => str_slug('Acoria'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Conayca
                    District::create([
                        'name' => 'Conayca',
                        /*'slug' => str_slug('Conayca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cuenca
                    District::create([
                        'name' => 'Cuenca',
                        /*'slug' => str_slug('Cuenca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huachocolpa
                    District::create([
                        'name' => 'Huachocolpa',
                        /*'slug' => str_slug('Huachocolpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllahuara
                    District::create([
                        'name' => 'Huayllahuara',
                        /*'slug' => str_slug('Huayllahuara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Izcuchaca
                    District::create([
                        'name' => 'Izcuchaca',
                        /*'slug' => str_slug('Izcuchaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Laria
                    District::create([
                        'name' => 'Laria',
                        /*'slug' => str_slug('Laria'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Manta
                    District::create([
                        'name' => 'Manta',
                        /*'slug' => str_slug('Manta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariscal Cáceres
                    District::create([
                        'name' => 'Mariscal Cáceres',
                        /*'slug' => str_slug('Mariscal Cáceres'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Moya
                    District::create([
                        'name' => 'Moya',
                        /*'slug' => str_slug('Moya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nuevo Occoro
                    District::create([
                        'name' => 'Nuevo Occoro',
                        /*'slug' => str_slug('Nuevo Occoro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Palca
                    District::create([
                        'name' => 'Palca',
                        /*'slug' => str_slug('Palca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pilchaca
                    District::create([
                        'name' => 'Pilchaca',
                        /*'slug' => str_slug('Pilchaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vilca
                    District::create([
                        'name' => 'Vilca',
                        /*'slug' => str_slug('Vilca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauli
                    District::create([
                        'name' => 'Yauli',
                        /*'slug' => str_slug('Yauli'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ascensión
                    District::create([
                        'name' => 'Ascensión',
                        /*'slug' => str_slug('Ascensión'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huando
                    District::create([
                        'name' => 'Huando',
                        /*'slug' => str_slug('Huando'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Acobamba ====================================
              $province = Province::create([
                  'name' => 'Acobamba',
                  /*'slug' => str_slug('Acobamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Acobamba
                    District::create([
                        'name' => 'Acobamba',
                        /*'slug' => str_slug('Acobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andabamba
                    District::create([
                        'name' => 'Andabamba',
                        /*'slug' => str_slug('Andabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anta
                    District::create([
                        'name' => 'Anta',
                        /*'slug' => str_slug('Anta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Caja
                    District::create([
                        'name' => 'Caja',
                        /*'slug' => str_slug('Caja'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcas
                    District::create([
                        'name' => 'Marcas',
                        /*'slug' => str_slug('Marcas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paucara
                    District::create([
                        'name' => 'Paucara',
                        /*'slug' => str_slug('Paucara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pomacocha
                    District::create([
                        'name' => 'Pomacocha',
                        /*'slug' => str_slug('Pomacocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rosario
                    District::create([
                        'name' => 'Rosario',
                        /*'slug' => str_slug('Rosario'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Angaraes ====================================
              $province = Province::create([
                  'name' => 'Angaraes',
                  /*'slug' => str_slug('Angaraes'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Lircay
                    District::create([
                        'name' => 'Lircay',
                        /*'slug' => str_slug('Lircay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anchonga
                    District::create([
                        'name' => 'Anchonga',
                        /*'slug' => str_slug('Anchonga'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Callanmarca
                    District::create([
                        'name' => 'Callanmarca',
                        /*'slug' => str_slug('Callanmarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ccochaccasa
                    District::create([
                        'name' => 'Ccochaccasa',
                        /*'slug' => str_slug('Ccochaccasa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chincho
                    District::create([
                        'name' => 'Chincho',
                        /*'slug' => str_slug('Chincho'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Congalla
                    District::create([
                        'name' => 'Congalla',
                        /*'slug' => str_slug('Congalla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huanca-Huanca
                    District::create([
                        'name' => 'Huanca-Huanca',
                        /*'slug' => str_slug('Huanca-Huanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayllay Grande
                    District::create([
                        'name' => 'Huayllay Grande',
                        /*'slug' => str_slug('Huayllay Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Julcamarca
                    District::create([
                        'name' => 'Julcamarca',
                        /*'slug' => str_slug('Julcamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Antonio de Antaparco
                    District::create([
                        'name' => 'San Antonio de Antaparco',
                        /*'slug' => str_slug('San Antonio de Antaparco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Tomas de Pata
                    District::create([
                        'name' => 'Santo Tomas de Pata',
                        /*'slug' => str_slug('Santo Tomas de Pata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Secclla
                    District::create([
                        'name' => 'Secclla',
                        /*'slug' => str_slug('Secclla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Castrovirreyna ====================================
              $province = Province::create([
                  'name' => 'Castrovirreyna',
                  /*'slug' => str_slug('Castrovirreyna'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Castrovirreyna
                    District::create([
                        'name' => 'Castrovirreyna',
                        /*'slug' => str_slug('Castrovirreyna'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Arma
                    District::create([
                        'name' => 'Arma',
                        /*'slug' => str_slug('Arma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aurahua
                    District::create([
                        'name' => 'Aurahua',
                        /*'slug' => str_slug('Aurahua'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Capillas
                    District::create([
                        'name' => 'Capillas',
                        /*'slug' => str_slug('Capillas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chupamarca
                    District::create([
                        'name' => 'Chupamarca',
                        /*'slug' => str_slug('Chupamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cocas
                    District::create([
                        'name' => 'Cocas',
                        /*'slug' => str_slug('Cocas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huachos
                    District::create([
                        'name' => 'Huachos',
                        /*'slug' => str_slug('Huachos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huamatambo
                    District::create([
                        'name' => 'Huamatambo',
                        /*'slug' => str_slug('Huamatambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mollepampa
                    District::create([
                        'name' => 'Mollepampa',
                        /*'slug' => str_slug('Mollepampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan
                    District::create([
                        'name' => 'San Juan',
                        /*'slug' => str_slug('San Juan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Ana
                    District::create([
                        'name' => 'Santa Ana',
                        /*'slug' => str_slug('Santa Ana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tantara
                    District::create([
                        'name' => 'Tantara',
                        /*'slug' => str_slug('Tantara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ticrapo
                    District::create([
                        'name' => 'Ticrapo',
                        /*'slug' => str_slug('Ticrapo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Churcampa ====================================
              $province = Province::create([
                  'name' => 'Churcampa',
                  /*'slug' => str_slug('Churcampa'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Churcampa
                    District::create([
                        'name' => 'Churcampa',
                        /*'slug' => str_slug('Churcampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Anco
                    District::create([
                        'name' => 'Anco',
                        /*'slug' => str_slug('Anco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chinchihuasi
                    District::create([
                        'name' => 'Chinchihuasi',
                        /*'slug' => str_slug('Chinchihuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Carmen
                    District::create([
                        'name' => 'El Carmen',
                        /*'slug' => str_slug('El Carmen'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Merced
                    District::create([
                        'name' => 'La Merced',
                        /*'slug' => str_slug('La Merced'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Locroja
                    District::create([
                        'name' => 'Locroja',
                        /*'slug' => str_slug('Locroja'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paucarbamba
                    District::create([
                        'name' => 'Paucarbamba',
                        /*'slug' => str_slug('Paucarbamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Miguel de Mayocc
                    District::create([
                        'name' => 'San Miguel de Mayocc',
                        /*'slug' => str_slug('San Miguel de Mayocc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Coris
                    District::create([
                        'name' => 'San Pedro de Coris',
                        /*'slug' => str_slug('San Pedro de Coris'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pachamarca
                    District::create([
                        'name' => 'Pachamarca',
                        /*'slug' => str_slug('Pachamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cosme
                    District::create([
                        'name' => 'Cosme',
                        /*'slug' => str_slug('Cosme'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huaytará ====================================
              $province = Province::create([
                  'name' => 'Huaytará',
                  /*'slug' => str_slug('Huaytará'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huaytará
                    District::create([
                        'name' => 'Huaytará',
                        /*'slug' => str_slug('Huaytará'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ayavi
                    District::create([
                        'name' => 'Ayavi',
                        /*'slug' => str_slug('Ayavi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Córdova
                    District::create([
                        'name' => 'Córdova',
                        /*'slug' => str_slug('Córdova'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Laramarca
                    District::create([
                        'name' => 'Laramarca',
                        /*'slug' => str_slug('Laramarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocoyo
                    District::create([
                        'name' => 'Ocoyo',
                        /*'slug' => str_slug('Ocoyo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pilpichaca
                    District::create([
                        'name' => 'Pilpichaca',
                        /*'slug' => str_slug('Pilpichaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Querco
                    District::create([
                        'name' => 'Querco',
                        /*'slug' => str_slug('Querco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quito-Arma
                    District::create([
                        'name' => 'Quito-Arma',
                        /*'slug' => str_slug('Quito-Arma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Antonio de Cusicancha
                    District::create([
                        'name' => 'San Antonio de Cusicancha',
                        /*'slug' => str_slug('San Antonio de Cusicancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Sangayaico
                    District::create([
                        'name' => 'San Francisco de Sangayaico',
                        /*'slug' => str_slug('San Francisco de Sangayaico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Isidro
                    District::create([
                        'name' => 'San Isidro',
                        /*'slug' => str_slug('San Isidro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Chocorvos
                    District::create([
                        'name' => 'Santiago de Chocorvos',
                        /*'slug' => str_slug('Santiago de Chocorvos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Quirahuara
                    District::create([
                        'name' => 'Santiago de Quirahuara',
                        /*'slug' => str_slug('Santiago de Quirahuara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Domingo de Capillas
                    District::create([
                        'name' => 'Santo Domingo de Capillas',
                        /*'slug' => str_slug('Santo Domingo de Capillas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tambo
                    District::create([
                        'name' => 'Tambo',
                        /*'slug' => str_slug('Tambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Tayacaja ====================================
              $province = Province::create([
                  'name' => 'Tayacaja',
                  /*'slug' => str_slug('Tayacaja'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Pampas
                    District::create([
                        'name' => 'Pampas',
                        /*'slug' => str_slug('Pampas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acostambo
                    District::create([
                        'name' => 'Acostambo',
                        /*'slug' => str_slug('Acostambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acraquia
                    District::create([
                        'name' => 'Acraquia',
                        /*'slug' => str_slug('Acraquia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ahuaycha
                    District::create([
                        'name' => 'Ahuaycha',
                        /*'slug' => str_slug('Ahuaycha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colcabamba
                    District::create([
                        'name' => 'Colcabamba',
                        /*'slug' => str_slug('Colcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Daniel Hernández
                    District::create([
                        'name' => 'Daniel Hernández',
                        /*'slug' => str_slug('Daniel Hernández'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huachocolpa
                    District::create([
                        'name' => 'Huachocolpa',
                        /*'slug' => str_slug('Huachocolpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaribamba
                    District::create([
                        'name' => 'Huaribamba',
                        /*'slug' => str_slug('Huaribamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ñahuimpuquio
                    District::create([
                        'name' => 'Ñahuimpuquio',
                        /*'slug' => str_slug('Ñahuimpuquio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pazos
                    District::create([
                        'name' => 'Pazos',
                        /*'slug' => str_slug('Pazos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quishuar
                    District::create([
                        'name' => 'Quishuar',
                        /*'slug' => str_slug('Quishuar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Salcabamba
                    District::create([
                        'name' => 'Salcabamba',
                        /*'slug' => str_slug('Salcabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Salcahuasi
                    District::create([
                        'name' => 'Salcahuasi',
                        /*'slug' => str_slug('Salcahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Marcos de Rocchac
                    District::create([
                        'name' => 'San Marcos de Rocchac',
                        /*'slug' => str_slug('San Marcos de Rocchac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Surcubamba
                    District::create([
                        'name' => 'Surcubamba',
                        /*'slug' => str_slug('Surcubamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tintay Puncu
                    District::create([
                        'name' => 'Tintay Puncu',
                        /*'slug' => str_slug('Tintay Puncu'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quichuas
                    District::create([
                        'name' => 'Quichuas',
                        /*'slug' => str_slug('Quichuas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andaymarca
                    District::create([
                        'name' => 'Andaymarca',
                        /*'slug' => str_slug('Andaymarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Roble
                    District::create([
                        'name' => 'Roble',
                        /*'slug' => str_slug('Roble'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pichos
                    District::create([
                        'name' => 'Pichos',
                        /*'slug' => str_slug('Pichos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago de Tucuma
                    District::create([
                        'name' => 'Santiago de Tucuma',
                        /*'slug' => str_slug('Santiago de Tucuma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Huánuco //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Huánuco',
            /*'slug' => str_slug('Huánuco'),*/
            'country_id' => 1, //Peru
        ]);

              // Huánuco ====================================
              $province = Province::create([
                  'name' => 'Huánuco',
                  /*'slug' => str_slug('Huánuco'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huánuco
                    District::create([
                        'name' => 'Huánuco',
                        /*'slug' => str_slug('Huánuco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Amarilis
                    District::create([
                        'name' => 'Amarilis',
                        /*'slug' => str_slug('Amarilis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chinchao
                    District::create([
                        'name' => 'Chinchao',
                        /*'slug' => str_slug('Chinchao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Churubamba
                    District::create([
                        'name' => 'Churubamba',
                        /*'slug' => str_slug('Churubamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Margos
                    District::create([
                        'name' => 'Margos',
                        /*'slug' => str_slug('Margos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quisqui (Kichki)
                    District::create([
                        'name' => 'Quisqui (Kichki)',
                        /*'slug' => str_slug('Quisqui (Kichki)'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Cayran
                    District::create([
                        'name' => 'San Francisco de Cayran',
                        /*'slug' => str_slug('San Francisco de Cayran'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Chaulan
                    District::create([
                        'name' => 'San Pedro de Chaulan',
                        /*'slug' => str_slug('San Pedro de Chaulan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa María del Valle
                    District::create([
                        'name' => 'Santa María del Valle',
                        /*'slug' => str_slug('Santa María del Valle'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yarumayo
                    District::create([
                        'name' => 'Yarumayo',
                        /*'slug' => str_slug('Yarumayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pillco Marca
                    District::create([
                        'name' => 'Pillco Marca',
                        /*'slug' => str_slug('Pillco Marca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yacus
                    District::create([
                        'name' => 'Yacus',
                        /*'slug' => str_slug('Yacus'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pablo de Pillao
                    District::create([
                        'name' => 'San Pablo de Pillao',
                        /*'slug' => str_slug('San Pablo de Pillao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Ambo ====================================
              $province = Province::create([
                  'name' => 'Ambo',
                  /*'slug' => str_slug('Ambo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Ambo
                    District::create([
                        'name' => 'Ambo',
                        /*'slug' => str_slug('Ambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cayna
                    District::create([
                        'name' => 'Cayna',
                        /*'slug' => str_slug('Cayna'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colpas
                    District::create([
                        'name' => 'Colpas',
                        /*'slug' => str_slug('Colpas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Conchamarca
                    District::create([
                        'name' => 'Conchamarca',
                        /*'slug' => str_slug('Conchamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacar
                    District::create([
                        'name' => 'Huacar',
                        /*'slug' => str_slug('Huacar'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco
                    District::create([
                        'name' => 'San Francisco',
                        /*'slug' => str_slug('San Francisco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Rafael
                    District::create([
                        'name' => 'San Rafael',
                        /*'slug' => str_slug('San Rafael'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tomay Kichwa
                    District::create([
                        'name' => 'Tomay Kichwa',
                        /*'slug' => str_slug('Tomay Kichwa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Dos de Mayo ====================================
              $province = Province::create([
                  'name' => 'Dos de Mayo',
                  /*'slug' => str_slug('Dos de Mayo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // La Unión
                    District::create([
                        'name' => 'La Unión',
                        /*'slug' => str_slug('La Unión'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chuquis
                    District::create([
                        'name' => 'Chuquis',
                        /*'slug' => str_slug('Chuquis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marías
                    District::create([
                        'name' => 'Marías',
                        /*'slug' => str_slug('Marías'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pachas
                    District::create([
                        'name' => 'Pachas',
                        /*'slug' => str_slug('Pachas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quivilla
                    District::create([
                        'name' => 'Quivilla',
                        /*'slug' => str_slug('Quivilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ripan
                    District::create([
                        'name' => 'Ripan',
                        /*'slug' => str_slug('Ripan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Shunqui
                    District::create([
                        'name' => 'Shunqui',
                        /*'slug' => str_slug('Shunqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sillapata
                    District::create([
                        'name' => 'Sillapata',
                        /*'slug' => str_slug('Sillapata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanas
                    District::create([
                        'name' => 'Yanas',
                        /*'slug' => str_slug('Yanas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huacaybamba ====================================
              $province = Province::create([
                  'name' => 'Huacaybamba',
                  /*'slug' => str_slug('Huacaybamba'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huacaybamba
                    District::create([
                        'name' => 'Huacaybamba',
                        /*'slug' => str_slug('Huacaybamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Canchabamba
                    District::create([
                        'name' => 'Canchabamba',
                        /*'slug' => str_slug('Canchabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochabamba
                    District::create([
                        'name' => 'Cochabamba',
                        /*'slug' => str_slug('Cochabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pinra
                    District::create([
                        'name' => 'Pinra',
                        /*'slug' => str_slug('Pinra'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Huamalíes ====================================
              $province = Province::create([
                  'name' => 'Huamalíes',
                  /*'slug' => str_slug('Huamalíes'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Llata
                    District::create([
                        'name' => 'Llata',
                        /*'slug' => str_slug('Llata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Arancay
                    District::create([
                        'name' => 'Arancay',
                        /*'slug' => str_slug('Arancay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chavín de Pariarca
                    District::create([
                        'name' => 'Chavín de Pariarca',
                        /*'slug' => str_slug('Chavín de Pariarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jacas Grande
                    District::create([
                        'name' => 'Jacas Grande',
                        /*'slug' => str_slug('Jacas Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jircan
                    District::create([
                        'name' => 'Jircan',
                        /*'slug' => str_slug('Jircan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Miraflores
                    District::create([
                        'name' => 'Miraflores',
                        /*'slug' => str_slug('Miraflores'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Monzón
                    District::create([
                        'name' => 'Monzón',
                        /*'slug' => str_slug('Monzón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Punchao
                    District::create([
                        'name' => 'Punchao',
                        /*'slug' => str_slug('Punchao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Puños
                    District::create([
                        'name' => 'Puños',
                        /*'slug' => str_slug('Puños'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Singa
                    District::create([
                        'name' => 'Singa',
                        /*'slug' => str_slug('Singa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tantamayo
                    District::create([
                        'name' => 'Tantamayo',
                        /*'slug' => str_slug('Tantamayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Leoncio Prado ====================================
              $province = Province::create([
                  'name' => 'Leoncio Prado',
                  /*'slug' => str_slug('Leoncio Prado'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Rupa-Rupa
                    District::create([
                        'name' => 'Rupa-Rupa',
                        /*'slug' => str_slug('Rupa-Rupa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Daniel Alomía Robles
                    District::create([
                        'name' => 'Daniel Alomía Robles',
                        /*'slug' => str_slug('Daniel Alomía Robles'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Hermilio Valdizán
                    District::create([
                        'name' => 'Hermilio Valdizán',
                        /*'slug' => str_slug('Hermilio Valdizán'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // José Crespo y Castillo
                    District::create([
                        'name' => 'José Crespo y Castillo',
                        /*'slug' => str_slug('José Crespo y Castillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Luyando
                    District::create([
                        'name' => 'Luyando',
                        /*'slug' => str_slug('Luyando'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariano Dámaso Beraun
                    District::create([
                        'name' => 'Mariano Dámaso Beraun',
                        /*'slug' => str_slug('Mariano Dámaso Beraun'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pucayacu
                    District::create([
                        'name' => 'Pucayacu',
                        /*'slug' => str_slug('Pucayacu'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Castillo Grande
                    District::create([
                        'name' => 'Castillo Grande',
                        /*'slug' => str_slug('Castillo Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pueblo Nuevo
                    District::create([
                        'name' => 'Pueblo Nuevo',
                        /*'slug' => str_slug('Pueblo Nuevo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Domingo de Anda
                    District::create([
                        'name' => 'Santo Domingo de Anda',
                        /*'slug' => str_slug('Santo Domingo de Anda'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Marañón ====================================
              $province = Province::create([
                  'name' => 'Marañón',
                  /*'slug' => str_slug('Marañón'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huacrachuco
                    District::create([
                        'name' => 'Huacrachuco',
                        /*'slug' => str_slug('Huacrachuco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cholon
                    District::create([
                        'name' => 'Cholon',
                        /*'slug' => str_slug('Cholon'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Buenaventura
                    District::create([
                        'name' => 'San Buenaventura',
                        /*'slug' => str_slug('San Buenaventura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa de Alto Yanajanca
                    District::create([
                        'name' => 'Santa Rosa de Alto Yanajanca',
                        /*'slug' => str_slug('Santa Rosa de Alto Yanajanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Pachitea ====================================
              $province = Province::create([
                  'name' => 'Pachitea',
                  /*'slug' => str_slug('Pachitea'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Panao
                    District::create([
                        'name' => 'Panao',
                        /*'slug' => str_slug('Panao'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chaglla
                    District::create([
                        'name' => 'Chaglla',
                        /*'slug' => str_slug('Chaglla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Molino
                    District::create([
                        'name' => 'Molino',
                        /*'slug' => str_slug('Molino'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Umari
                    District::create([
                        'name' => 'Umari',
                        /*'slug' => str_slug('Umari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Puerto Inca ====================================
              $province = Province::create([
                  'name' => 'Puerto Inca',
                  /*'slug' => str_slug('Puerto Inca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Puerto Inca
                    District::create([
                        'name' => 'Puerto Inca',
                        /*'slug' => str_slug('Puerto Inca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Codo del Pozuzo
                    District::create([
                        'name' => 'Codo del Pozuzo',
                        /*'slug' => str_slug('Codo del Pozuzo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Honoria
                    District::create([
                        'name' => 'Honoria',
                        /*'slug' => str_slug('Honoria'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tournavista
                    District::create([
                        'name' => 'Tournavista',
                        /*'slug' => str_slug('Tournavista'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yuyapichis
                    District::create([
                        'name' => 'Yuyapichis',
                        /*'slug' => str_slug('Yuyapichis'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Lauricocha ====================================
              $province = Province::create([
                  'name' => 'Lauricocha',
                  /*'slug' => str_slug('Lauricocha'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Jesús
                    District::create([
                        'name' => 'Jesús',
                        /*'slug' => str_slug('Jesús'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Baños
                    District::create([
                        'name' => 'Baños',
                        /*'slug' => str_slug('Baños'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jivia
                    District::create([
                        'name' => 'Jivia',
                        /*'slug' => str_slug('Jivia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Queropalca
                    District::create([
                        'name' => 'Queropalca',
                        /*'slug' => str_slug('Queropalca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Rondos
                    District::create([
                        'name' => 'Rondos',
                        /*'slug' => str_slug('Rondos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Francisco de Asís
                    District::create([
                        'name' => 'San Francisco de Asís',
                        /*'slug' => str_slug('San Francisco de Asís'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Miguel de Cauri
                    District::create([
                        'name' => 'San Miguel de Cauri',
                        /*'slug' => str_slug('San Miguel de Cauri'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Yarowilca ====================================
              $province = Province::create([
                  'name' => 'Yarowilca',
                  /*'slug' => str_slug('Yarowilca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chavinillo
                    District::create([
                        'name' => 'Chavinillo',
                        /*'slug' => str_slug('Chavinillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cahuac
                    District::create([
                        'name' => 'Cahuac',
                        /*'slug' => str_slug('Cahuac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chacabamba
                    District::create([
                        'name' => 'Chacabamba',
                        /*'slug' => str_slug('Chacabamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Aparicio Pomares
                    District::create([
                        'name' => 'Aparicio Pomares',
                        /*'slug' => str_slug('Aparicio Pomares'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Jacas Chico
                    District::create([
                        'name' => 'Jacas Chico',
                        /*'slug' => str_slug('Jacas Chico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Obas
                    District::create([
                        'name' => 'Obas',
                        /*'slug' => str_slug('Obas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Choras
                    District::create([
                        'name' => 'Choras',
                        /*'slug' => str_slug('Choras'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Ica //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Ica',
            /*'slug' => str_slug('Ica'),*/
            'country_id' => 1, //Peru
        ]);

              // Ica ====================================
              $province = Province::create([
                  'name' => 'Ica',
                  /*'slug' => str_slug('Ica'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Ica
                    District::create([
                        'name' => 'Ica',
                        /*'slug' => str_slug('Ica'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Tinguiña
                    District::create([
                        'name' => 'La Tinguiña',
                        /*'slug' => str_slug('La Tinguiña'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Los Aquijes
                    District::create([
                        'name' => 'Los Aquijes',
                        /*'slug' => str_slug('Los Aquijes'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ocucaje
                    District::create([
                        'name' => 'Ocucaje',
                        /*'slug' => str_slug('Ocucaje'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pachacutec
                    District::create([
                        'name' => 'Pachacutec',
                        /*'slug' => str_slug('Pachacutec'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Parcona
                    District::create([
                        'name' => 'Parcona',
                        /*'slug' => str_slug('Parcona'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Salas
                    District::create([
                        'name' => 'Salas',
                        /*'slug' => str_slug('Salas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José de los Molinos
                    District::create([
                        'name' => 'San José de los Molinos',
                        /*'slug' => str_slug('San José de los Molinos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan Bautista
                    District::create([
                        'name' => 'San Juan Bautista',
                        /*'slug' => str_slug('San Juan Bautista'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santiago
                    District::create([
                        'name' => 'Santiago',
                        /*'slug' => str_slug('Santiago'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Subtanjalla
                    District::create([
                        'name' => 'Subtanjalla',
                        /*'slug' => str_slug('Subtanjalla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tate
                    District::create([
                        'name' => 'Tate',
                        /*'slug' => str_slug('Tate'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauca del Rosario
                    District::create([
                        'name' => 'Yauca del Rosario',
                        /*'slug' => str_slug('Yauca del Rosario'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chincha ====================================
              $province = Province::create([
                  'name' => 'Chincha',
                  /*'slug' => str_slug('Chincha'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chincha Alta
                    District::create([
                        'name' => 'Chincha Alta',
                        /*'slug' => str_slug('Chincha Alta'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Alto Laran
                    District::create([
                        'name' => 'Alto Laran',
                        /*'slug' => str_slug('Alto Laran'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chavin
                    District::create([
                        'name' => 'Chavin',
                        /*'slug' => str_slug('Chavin'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chincha Baja
                    District::create([
                        'name' => 'Chincha Baja',
                        /*'slug' => str_slug('Chincha Baja'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Carmen
                    District::create([
                        'name' => 'El Carmen',
                        /*'slug' => str_slug('El Carmen'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Grocio Prado
                    District::create([
                        'name' => 'Grocio Prado',
                        /*'slug' => str_slug('Grocio Prado'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pueblo Nuevo
                    District::create([
                        'name' => 'Pueblo Nuevo',
                        /*'slug' => str_slug('Pueblo Nuevo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Yanac
                    District::create([
                        'name' => 'San Juan de Yanac',
                        /*'slug' => str_slug('San Juan de Yanac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Huacarpana
                    District::create([
                        'name' => 'San Pedro de Huacarpana',
                        /*'slug' => str_slug('San Pedro de Huacarpana'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sunampe
                    District::create([
                        'name' => 'Sunampe',
                        /*'slug' => str_slug('Sunampe'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tambo de Mora
                    District::create([
                        'name' => 'Tambo de Mora',
                        /*'slug' => str_slug('Tambo de Mora'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Nasca ====================================
              $province = Province::create([
                  'name' => 'Nasca',
                  /*'slug' => str_slug('Nasca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Nasca
                    District::create([
                        'name' => 'Nasca',
                        /*'slug' => str_slug('Nasca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Changuillo
                    District::create([
                        'name' => 'Changuillo',
                        /*'slug' => str_slug('Changuillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Ingenio
                    District::create([
                        'name' => 'El Ingenio',
                        /*'slug' => str_slug('El Ingenio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcona
                    District::create([
                        'name' => 'Marcona',
                        /*'slug' => str_slug('Marcona'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vista Alegre
                    District::create([
                        'name' => 'Vista Alegre',
                        /*'slug' => str_slug('Vista Alegre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Palpa ====================================
              $province = Province::create([
                  'name' => 'Palpa',
                  /*'slug' => str_slug('Palpa'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Palpa
                    District::create([
                        'name' => 'Palpa',
                        /*'slug' => str_slug('Palpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llipata
                    District::create([
                        'name' => 'Llipata',
                        /*'slug' => str_slug('Llipata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Río Grande
                    District::create([
                        'name' => 'Río Grande',
                        /*'slug' => str_slug('Río Grande'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Cruz
                    District::create([
                        'name' => 'Santa Cruz',
                        /*'slug' => str_slug('Santa Cruz'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tibillo
                    District::create([
                        'name' => 'Tibillo',
                        /*'slug' => str_slug('Tibillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Pisco ====================================
              $province = Province::create([
                  'name' => 'Pisco',
                  /*'slug' => str_slug('Pisco'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Pisco
                    District::create([
                        'name' => 'Pisco',
                        /*'slug' => str_slug('Pisco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancano
                    District::create([
                        'name' => 'Huancano',
                        /*'slug' => str_slug('Huancano'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Humay
                    District::create([
                        'name' => 'Humay',
                        /*'slug' => str_slug('Humay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Independencia
                    District::create([
                        'name' => 'Independencia',
                        /*'slug' => str_slug('Independencia'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paracas
                    District::create([
                        'name' => 'Paracas',
                        /*'slug' => str_slug('Paracas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Andrés
                    District::create([
                        'name' => 'San Andrés',
                        /*'slug' => str_slug('San Andrés'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Clemente
                    District::create([
                        'name' => 'San Clemente',
                        /*'slug' => str_slug('San Clemente'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tupac Amaru Inca
                    District::create([
                        'name' => 'Tupac Amaru Inca',
                        /*'slug' => str_slug('Tupac Amaru Inca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        // Junín //////////////////////////////////////////////
        $department = City::create([
            'name' => 'Junín',
            /*'slug' => str_slug('Junín'),*/
            'country_id' => 1, //Peru
        ]);

              // Huancayo ====================================
              $province = Province::create([
                  'name' => 'Huancayo',
                  /*'slug' => str_slug('Huancayo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Huancayo
                    District::create([
                        'name' => 'Huancayo',
                        /*'slug' => str_slug('Huancayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carhuacallanga
                    District::create([
                        'name' => 'Carhuacallanga',
                        /*'slug' => str_slug('Carhuacallanga'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chacapampa
                    District::create([
                        'name' => 'Chacapampa',
                        /*'slug' => str_slug('Chacapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chicche
                    District::create([
                        'name' => 'Chicche',
                        /*'slug' => str_slug('Chicche'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chilca
                    District::create([
                        'name' => 'Chilca',
                        /*'slug' => str_slug('Chilca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chongos Alto
                    District::create([
                        'name' => 'Chongos Alto',
                        /*'slug' => str_slug('Chongos Alto'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chupuro
                    District::create([
                        'name' => 'Chupuro',
                        /*'slug' => str_slug('Chupuro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Colca
                    District::create([
                        'name' => 'Colca',
                        /*'slug' => str_slug('Colca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cullhuas
                    District::create([
                        'name' => 'Cullhuas',
                        /*'slug' => str_slug('Cullhuas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Tambo
                    District::create([
                        'name' => 'El Tambo',
                        /*'slug' => str_slug('El Tambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huacrapuquio
                    District::create([
                        'name' => 'Huacrapuquio',
                        /*'slug' => str_slug('Huacrapuquio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Hualhuas
                    District::create([
                        'name' => 'Hualhuas',
                        /*'slug' => str_slug('Hualhuas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huancan
                    District::create([
                        'name' => 'Huancan',
                        /*'slug' => str_slug('Huancan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huasicancha
                    District::create([
                        'name' => 'Huasicancha',
                        /*'slug' => str_slug('Huasicancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huayucachi
                    District::create([
                        'name' => 'Huayucachi',
                        /*'slug' => str_slug('Huayucachi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ingenio
                    District::create([
                        'name' => 'Ingenio',
                        /*'slug' => str_slug('Ingenio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pariahuanca
                    District::create([
                        'name' => 'Pariahuanca',
                        /*'slug' => str_slug('Pariahuanca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pilcomayo
                    District::create([
                        'name' => 'Pilcomayo',
                        /*'slug' => str_slug('Pilcomayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pucara
                    District::create([
                        'name' => 'Pucara',
                        /*'slug' => str_slug('Pucara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quichuay
                    District::create([
                        'name' => 'Quichuay',
                        /*'slug' => str_slug('Quichuay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Quilcas
                    District::create([
                        'name' => 'Quilcas',
                        /*'slug' => str_slug('Quilcas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Agustín de Cajas
                    District::create([
                        'name' => 'San Agustín de Cajas',
                        /*'slug' => str_slug('San Agustín de Cajas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Jerónimo de Tunán
                    District::create([
                        'name' => 'San Jerónimo de Tunán',
                        /*'slug' => str_slug('San Jerónimo de Tunán'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Saño
                    District::create([
                        'name' => 'San Pedro de Saño',
                        /*'slug' => str_slug('San Pedro de Saño'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sapallanga
                    District::create([
                        'name' => 'Sapallanga',
                        /*'slug' => str_slug('Sapallanga'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sicaya
                    District::create([
                        'name' => 'Sicaya',
                        /*'slug' => str_slug('Sicaya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santo Domingo de Acobamba
                    District::create([
                        'name' => 'Santo Domingo de Acobamba',
                        /*'slug' => str_slug('Santo Domingo de Acobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Viques
                    District::create([
                        'name' => 'Viques',
                        /*'slug' => str_slug('Viques'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Concepción ====================================
              $province = Province::create([
                  'name' => 'Concepción',
                  /*'slug' => str_slug('Concepción'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Aco
                    District::create([
                        'name' => 'Aco',
                        /*'slug' => str_slug('Aco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Andamarca
                    District::create([
                        'name' => 'Andamarca',
                        /*'slug' => str_slug('Andamarca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chambara
                    District::create([
                        'name' => 'Chambara',
                        /*'slug' => str_slug('Chambara'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Cochas
                    District::create([
                        'name' => 'Cochas',
                        /*'slug' => str_slug('Cochas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Comas
                    District::create([
                        'name' => 'Comas',
                        /*'slug' => str_slug('Comas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Heroínas Toledo
                    District::create([
                        'name' => 'Heroínas Toledo',
                        /*'slug' => str_slug('Heroínas Toledo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Manzanares
                    District::create([
                        'name' => 'Manzanares',
                        /*'slug' => str_slug('Manzanares'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mariscal Castilla
                    District::create([
                        'name' => 'Mariscal Castilla',
                        /*'slug' => str_slug('Mariscal Castilla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Matahuasi
                    District::create([
                        'name' => 'Matahuasi',
                        /*'slug' => str_slug('Matahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mito
                    District::create([
                        'name' => 'Mito',
                        /*'slug' => str_slug('Mito'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Nueve de Julio
                    District::create([
                        'name' => 'Nueve de Julio',
                        /*'slug' => str_slug('Nueve de Julio'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San José de Quero
                    District::create([
                        'name' => 'San José de Quero',
                        /*'slug' => str_slug('San José de Quero'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa de Ocopa
                    District::create([
                        'name' => 'Santa Rosa de Ocopa',
                        /*'slug' => str_slug('Santa Rosa de Ocopa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chanchamayo ====================================
              $province = Province::create([
                  'name' => 'Chanchamayo',
                  /*'slug' => str_slug('Chanchamayo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chanchamayo
                    District::create([
                        'name' => 'Chanchamayo',
                        /*'slug' => str_slug('Chanchamayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Perene
                    District::create([
                        'name' => 'Perene',
                        /*'slug' => str_slug('Perene'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pichanaqui
                    District::create([
                        'name' => 'Pichanaqui',
                        /*'slug' => str_slug('Pichanaqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Luis de Shuaro
                    District::create([
                        'name' => 'San Luis de Shuaro',
                        /*'slug' => str_slug('San Luis de Shuaro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Ramón
                    District::create([
                        'name' => 'San Ramón',
                        /*'slug' => str_slug('San Ramón'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vitoc
                    District::create([
                        'name' => 'Vitoc',
                        /*'slug' => str_slug('Vitoc'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Jauja ====================================
              $province = Province::create([
                  'name' => 'Jauja',
                  /*'slug' => str_slug('Jauja'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Jauja
                    District::create([
                        'name' => 'Jauja',
                        /*'slug' => str_slug('Jauja'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acolla
                    District::create([
                        'name' => 'Acolla',
                        /*'slug' => str_slug('Acolla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Apata
                    District::create([
                        'name' => 'Apata',
                        /*'slug' => str_slug('Apata'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ataura
                    District::create([
                        'name' => 'Ataura',
                        /*'slug' => str_slug('Ataura'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Canchayllo
                    District::create([
                        'name' => 'Canchayllo',
                        /*'slug' => str_slug('Canchayllo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Curicaca
                    District::create([
                        'name' => 'Curicaca',
                        /*'slug' => str_slug('Curicaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // El Mantaro
                    District::create([
                        'name' => 'El Mantaro',
                        /*'slug' => str_slug('El Mantaro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huamali
                    District::create([
                        'name' => 'Huamali',
                        /*'slug' => str_slug('Huamali'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaripampa
                    District::create([
                        'name' => 'Huaripampa',
                        /*'slug' => str_slug('Huaripampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huertas
                    District::create([
                        'name' => 'Huertas',
                        /*'slug' => str_slug('Huertas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Janjaillo
                    District::create([
                        'name' => 'Janjaillo',
                        /*'slug' => str_slug('Janjaillo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Julcán
                    District::create([
                        'name' => 'Julcán',
                        /*'slug' => str_slug('Julcán'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Leonor Ordóñez
                    District::create([
                        'name' => 'Leonor Ordóñez',
                        /*'slug' => str_slug('Leonor Ordóñez'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llocllapampa
                    District::create([
                        'name' => 'Llocllapampa',
                        /*'slug' => str_slug('Llocllapampa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marco
                    District::create([
                        'name' => 'Marco',
                        /*'slug' => str_slug('Marco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Masma
                    District::create([
                        'name' => 'Masma',
                        /*'slug' => str_slug('Masma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Masma Chicche
                    District::create([
                        'name' => 'Masma Chicche',
                        /*'slug' => str_slug('Masma Chicche'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Molinos
                    District::create([
                        'name' => 'Molinos',
                        /*'slug' => str_slug('Molinos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Monobamba
                    District::create([
                        'name' => 'Monobamba',
                        /*'slug' => str_slug('Monobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Muqui
                    District::create([
                        'name' => 'Muqui',
                        /*'slug' => str_slug('Muqui'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Muquiyauyo
                    District::create([
                        'name' => 'Muquiyauyo',
                        /*'slug' => str_slug('Muquiyauyo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paca
                    District::create([
                        'name' => 'Paca',
                        /*'slug' => str_slug('Paca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paccha
                    District::create([
                        'name' => 'Paccha',
                        /*'slug' => str_slug('Paccha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pancan
                    District::create([
                        'name' => 'Pancan',
                        /*'slug' => str_slug('Pancan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Parco
                    District::create([
                        'name' => 'Parco',
                        /*'slug' => str_slug('Parco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pomacancha
                    District::create([
                        'name' => 'Pomacancha',
                        /*'slug' => str_slug('Pomacancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ricran
                    District::create([
                        'name' => 'Ricran',
                        /*'slug' => str_slug('Ricran'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Lorenzo
                    District::create([
                        'name' => 'San Lorenzo',
                        /*'slug' => str_slug('San Lorenzo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Chunan
                    District::create([
                        'name' => 'San Pedro de Chunan',
                        /*'slug' => str_slug('San Pedro de Chunan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sausa
                    District::create([
                        'name' => 'Sausa',
                        /*'slug' => str_slug('Sausa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Sincos
                    District::create([
                        'name' => 'Sincos',
                        /*'slug' => str_slug('Sincos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tunan Marca
                    District::create([
                        'name' => 'Tunan Marca',
                        /*'slug' => str_slug('Tunan Marca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauli
                    District::create([
                        'name' => 'Yauli',
                        /*'slug' => str_slug('Yauli'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauyos
                    District::create([
                        'name' => 'Yauyos',
                        /*'slug' => str_slug('Yauyos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Junín ====================================
              $province = Province::create([
                  'name' => 'Junín',
                  /*'slug' => str_slug('Junín'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Junín
                    District::create([
                        'name' => 'Junín',
                        /*'slug' => str_slug('Junín'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Carhuamayo
                    District::create([
                        'name' => 'Carhuamayo',
                        /*'slug' => str_slug('Carhuamayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ondores
                    District::create([
                        'name' => 'Ondores',
                        /*'slug' => str_slug('Ondores'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ulcumayo
                    District::create([
                        'name' => 'Ulcumayo',
                        /*'slug' => str_slug('Ulcumayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Satipo ====================================
              $province = Province::create([
                  'name' => 'Satipo',
                  /*'slug' => str_slug('Satipo'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Satipo
                    District::create([
                        'name' => 'Satipo',
                        /*'slug' => str_slug('Satipo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Coviriali
                    District::create([
                        'name' => 'Coviriali',
                        /*'slug' => str_slug('Coviriali'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Llaylla
                    District::create([
                        'name' => 'Llaylla',
                        /*'slug' => str_slug('Llaylla'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Mazamari
                    District::create([
                        'name' => 'Mazamari',
                        /*'slug' => str_slug('Mazamari'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pampa Hermosa
                    District::create([
                        'name' => 'Pampa Hermosa',
                        /*'slug' => str_slug('Pampa Hermosa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Pangoa
                    District::create([
                        'name' => 'Pangoa',
                        /*'slug' => str_slug('Pangoa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Río Negro
                    District::create([
                        'name' => 'Río Negro',
                        /*'slug' => str_slug('Río Negro'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Río Tambo
                    District::create([
                        'name' => 'Río Tambo',
                        /*'slug' => str_slug('Río Tambo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Vizcatan del Ene
                    District::create([
                        'name' => 'Vizcatan del Ene',
                        /*'slug' => str_slug('Vizcatan del Ene'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Tarma ====================================
              $province = Province::create([
                  'name' => 'Tarma',
                  /*'slug' => str_slug('Tarma'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Tarma
                    District::create([
                        'name' => 'Tarma',
                        /*'slug' => str_slug('Tarma'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Acobamba
                    District::create([
                        'name' => 'Acobamba',
                        /*'slug' => str_slug('Acobamba'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huaricolca
                    District::create([
                        'name' => 'Huaricolca',
                        /*'slug' => str_slug('Huaricolca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huasahuasi
                    District::create([
                        'name' => 'Huasahuasi',
                        /*'slug' => str_slug('Huasahuasi'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // La Unión
                    District::create([
                        'name' => 'La Unión',
                        /*'slug' => str_slug('La Unión'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Palca
                    District::create([
                        'name' => 'Palca',
                        /*'slug' => str_slug('Palca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Palcamayo
                    District::create([
                        'name' => 'Palcamayo',
                        /*'slug' => str_slug('Palcamayo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Pedro de Cajas
                    District::create([
                        'name' => 'San Pedro de Cajas',
                        /*'slug' => str_slug('San Pedro de Cajas'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tapo
                    District::create([
                        'name' => 'Tapo',
                        /*'slug' => str_slug('Tapo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Yauli ====================================
              $province = Province::create([
                  'name' => 'Yauli',
                  /*'slug' => str_slug('Yauli'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // La Oroya
                    District::create([
                        'name' => 'La Oroya',
                        /*'slug' => str_slug('La Oroya'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chacapalpa
                    District::create([
                        'name' => 'Chacapalpa',
                        /*'slug' => str_slug('Chacapalpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huay-Huay
                    District::create([
                        'name' => 'Huay-Huay',
                        /*'slug' => str_slug('Huay-Huay'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Marcapomacocha
                    District::create([
                        'name' => 'Marcapomacocha',
                        /*'slug' => str_slug('Marcapomacocha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Morococha
                    District::create([
                        'name' => 'Morococha',
                        /*'slug' => str_slug('Morococha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Paccha
                    District::create([
                        'name' => 'Paccha',
                        /*'slug' => str_slug('Paccha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Barbara de Carhuacayan
                    District::create([
                        'name' => 'Santa Barbara de Carhuacayan',
                        /*'slug' => str_slug('Santa Barbara de Carhuacayan'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Santa Rosa de Sacco
                    District::create([
                        'name' => 'Santa Rosa de Sacco',
                        /*'slug' => str_slug('Santa Rosa de Sacco'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Suitucancha
                    District::create([
                        'name' => 'Suitucancha',
                        /*'slug' => str_slug('Suitucancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yauli
                    District::create([
                        'name' => 'Yauli',
                        /*'slug' => str_slug('Yauli'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

              // Chupaca ====================================
              $province = Province::create([
                  'name' => 'Chupaca',
                  /*'slug' => str_slug('Chupaca'),*/
                  'city_id' => $department->id,
                  'country_id' => 1, //Peru
              ]);

                    // Chupaca
                    District::create([
                        'name' => 'Chupaca',
                        /*'slug' => str_slug('Chupaca'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Ahuac
                    District::create([
                        'name' => 'Ahuac',
                        /*'slug' => str_slug('Ahuac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Chongos Bajo
                    District::create([
                        'name' => 'Chongos Bajo',
                        /*'slug' => str_slug('Chongos Bajo'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huachac
                    District::create([
                        'name' => 'Huachac',
                        /*'slug' => str_slug('Huachac'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Huamancaca Chico
                    District::create([
                        'name' => 'Huamancaca Chico',
                        /*'slug' => str_slug('Huamancaca Chico'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Iscos
                    District::create([
                        'name' => 'San Juan de Iscos',
                        /*'slug' => str_slug('San Juan de Iscos'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // San Juan de Jarpa
                    District::create([
                        'name' => 'San Juan de Jarpa',
                        /*'slug' => str_slug('San Juan de Jarpa'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Tres de Diciembre
                    District::create([
                        'name' => 'Tres de Diciembre',
                        /*'slug' => str_slug('Tres de Diciembre'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);
                    // Yanacancha
                    District::create([
                        'name' => 'Yanacancha',
                        /*'slug' => str_slug('Yanacancha'),*/
                        'province_id' => $province->id,
                        'city_id' => $department->id,
                    ]);

        $department = City::create([
          "name" => "La Libertad",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Trujillo",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Trujillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Porvenir",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Florencia de Mora",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huanchaco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Esperanza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Laredo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Moche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Poroto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Salaverry",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Simbal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Victor Larco Herrera",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Ascope",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Ascope",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Chicama",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Chocope",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Magdalena de Cao",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Paijan",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Rázuri",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Cao",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Casa Grande",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Bolívar",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Bolívar",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Bambamarca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Condormarca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Longotea",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Uchumarca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Ucuncha",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Chepén",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Chepen",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacanga",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Pueblo Nuevo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Julcán",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Julcan",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Calamarca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Carabamba",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Huaso",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Otuzco",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Otuzco",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Agallpampa",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Charat",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Huaranchal",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "La Cuesta",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Mache",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Paranday",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Salpo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sinsicap",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Usquil",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Pacasmayo",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "San Pedro de Lloc",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Guadalupe",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Jequetepeque",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacasmayo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "San José",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Pataz",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Tayabamba",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Buldibuyo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Chillia",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Huancaspata",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Huaylillas",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Huayo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Ongon",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Parcoy",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Pataz",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Pias",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Challas",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Taurija",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Urpay",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Sánchez Carrión",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Huamachuco",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Chugay",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Cochorco",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Curgos",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Marcabal",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sanagoran",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sarin",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sartimbamba",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Santiago de Chuco",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Santiago de Chuco",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Angasmarca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Cachicadan",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Mollebamba",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Mollepata",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Quiruvilca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Cruz de Chuca",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sitabamba",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Gran Chimú",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Cascas",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Lucma",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Marmot",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Sayapullo",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Virú",
                 "city_id" => $department->id,
                 "country_id" => 1,//Peru
              ]);
                    //
                    District::create([
                       "name" => "Viru",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Chao",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);
                    District::create([
                       "name" => "Guadalupito",
                       "province_id" => $province->id,
                       'city_id' => $department->id,
                    ]);

        $department = City::create([
          "name" => "Lambayeque",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Chiclayo",
                 'city_id' => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Chiclayo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chongoyape",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Eten",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Eten Puerto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "José Leonardo Ortiz",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Victoria",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lagunas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Monsefu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nueva Arica",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Oyotun",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Picsi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pimentel",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Reque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Saña",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cayalti",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Patapo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pomalca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pucala",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tuman",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Ferreñafe",
                 'city_id' => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ferreñafe",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cañaris",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Incahuasi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Manuel Antonio Mesones Muro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pitipo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pueblo Nuevo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Lambayeque",
                 'city_id' => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Lambayeque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chochope",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Illimo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jayanca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mochumi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Morrope",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Motupe",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Olmos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacora",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Salas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San José",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tucume",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
// ////////////////////////////////////////////////////
        $department = City::create([
          "name" => "Lima",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Lima",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Lima",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ancón",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ate",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Barranco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Breña",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Carabayllo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chaclacayo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chorrillos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cieneguilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Comas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Agustino",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Independencia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jesús María",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Molina",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Victoria",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lince",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Los Olivos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lurigancho",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lurin",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Magdalena del Mar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pueblo Libre",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Miraflores",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pachacamac",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pucusana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Puente Piedra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Punta Hermosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Punta Negra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Rímac",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Bartolo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Borja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Isidro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Lurigancho",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Miraflores",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Luis",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Martín de Porres",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Miguel",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Anita",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa María del Mar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Surco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Surquillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Villa El Salvador",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Villa María del Triunfo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Barranca",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Barranca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paramonga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pativilca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Supe",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Supe Puerto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Cajatambo",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Cajatambo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Copa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Gorgor",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huancapon",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Manas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Canta",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Canta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Arahuay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huamantanga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huaros",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lachaqui",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Buenaventura",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa de Quives",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Cañete",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "San Vicente de Cañete",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Asia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Calango",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cerro Azul",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chilca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Coayllo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Imperial",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lunahuana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mala",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nuevo Imperial",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacaran",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quilmana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Antonio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Luis",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Cruz de Flores",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Zúñiga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huaral",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Huaral",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Atavillos Alto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Atavillos Bajo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Aucallama",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chancay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ihuari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lampian",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacaraos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Miguel de Acos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Cruz de Andamarca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sumbilca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Veintisiete de Noviembre",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huarochirí",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Matucana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Antioquia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Callahuanca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Carampoma",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chicla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cuenca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huachupampa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huanza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huarochiri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lahuaytambo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Langa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Laraos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mariatana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ricardo Palma",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Andrés de Tupicocha",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Antonio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Bartolomé",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Damian",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Iris",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Tantaranche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Lorenzo de Quinti",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Mateo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Mateo de Otao",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pedro de Casta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pedro de Huancayre",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sangallaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Cruz de Cocachacra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Eulalia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Anchucaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Tuna",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santo Domingo de Los Olleros",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Surco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huaura",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Huacho",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ambar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caleta de Carquin",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Checras",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Hualmay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huaura",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Leoncio Prado",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paccho",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Leonor",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa María",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sayan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vegueta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Oyón",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Oyon",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Andajes",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caujul",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cochamarca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Navan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pachangara",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Yauyos",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Yauyos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alis",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Allauca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ayaviri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Azángaro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cacra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Carania",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Catahuasi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chocos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cochas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Colonia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Hongos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huampara",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huancaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huangascar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huantan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huañec",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Laraos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lincha",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Madean",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Miraflores",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Omas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Putinza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quinches",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quinocay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Joaquín",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pedro de Pilas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tanta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tauripampa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tomas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tupe",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Viñac",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vitis",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Loreto",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Maynas",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Iquitos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alto Nanay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Fernando Lores",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Indiana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Las Amazonas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mazan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Napo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Punchana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Torres Causana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Belén",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan Bautista",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Alto Amazonas",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Yurimaguas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Balsapuerto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jeberos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lagunas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Cruz",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Teniente Cesar López Rojas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Loreto",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Nauta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Parinari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tigre",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Trompeteros",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Urarinas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Mariscal Ramón Castilla",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ramón Castilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pebas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yavari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pablo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Requena",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Requena",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alto Tapiche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Capelo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Emilio San Martín",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Maquia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Puinahua",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Saquena",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Soplin",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tapiche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jenaro Herrera",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yaquerana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Ucayali",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Contamana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Inahuaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Padre Márquez",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pampa Hermosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sarayacu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vargas Guerra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Datem del Marañón",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Barranca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cahuapanas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Manseriche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Morona",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pastaza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Andoas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Putumayo",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Putumayo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Rosa Panduro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Teniente Manuel Clavero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yaguas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Madre de Dios",
          "country_id" => 1,//Peru
        ]);

              $province = Province::create([
                 "name" => "Tambopata",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Tambopata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Inambari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Las Piedras",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Laberinto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Manu",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Manu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Fitzcarrald",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Madre de Dios",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huepetuhe",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Tahuamanu",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Iñapari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Iberia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tahuamanu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Moquegua",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Mariscal Nieto",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Moquegua",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Carumas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cuchumbaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Samegua",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Cristóbal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Torata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "General Sánchez Cerro",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Omate",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chojata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Coalaque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ichuña",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Capilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lloque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Matalaque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Puquina",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quinistaquillas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ubinas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yunga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Ilo",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ilo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Algarrobal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacocha",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Pasco",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Pasco",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Chaupimarca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huachon",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huariaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huayllay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ninacaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pallanchacra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paucartambo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Francisco de Asís de Yarusyacan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Simon Bolívar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ticlacayan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tinyahuarco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vicco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yanacancha",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Daniel Alcides Carrión",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Yanahuanca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chacayan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Goyllarisquizga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paucar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pedro de Pillao",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Ana de Tusi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tapuc",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vilcabamba",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Oxapampa",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Oxapampa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chontabamba",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huancabamba",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Palcazu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pozuzo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Puerto Bermúdez",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Villa Rica",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Constitución",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Piura",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Piura",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Piura",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Castilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Catacaos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cura Mori",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Tallan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Arena",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Unión",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Las Lomas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tambo Grande",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Veintiseis de Octubre",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
              $province = Province::create([
                 "name" => "Ayabaca",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ayabaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Frias",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jilili",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lagunas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Montero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pacaipampa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paimas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sapillica",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sicchez",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Suyo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huancabamba",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Huancabamba",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Canchaque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Carmen de la Frontera",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huarmaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lalaquiz",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Miguel de El Faique",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sondor",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sondorillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Morropón",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Chulucanas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Buenos Aires",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chalaco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Matanza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Morropon",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Salitral",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Bigote",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Catalina de Mossa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santo Domingo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yamango",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Paita",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Paita",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Amotape",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Arenal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Colan",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Huaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tamarindo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vichayal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Sullana",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Sullana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Bellavista",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ignacio Escudero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lancones",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Marcavelica",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Miguel Checa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Querecotillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Salitral",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Talara",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Pariñas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Alto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Brea",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Lobitos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Los Organos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mancora",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Sechura",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Sechura",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Bellavista de la Unión",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Bernal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cristo Nos Valga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vice",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Rinconada Llicuar",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Puno",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Puno",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Puno",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Acora",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Amantani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Atuncolla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Capachica",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chucuito",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Coata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Mañazo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paucarcolla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pichacani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Plateria",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Antonio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tiquillaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vilque",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Azángaro",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Azángaro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Achaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Arapa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Asillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caminaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chupa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "José Domingo Choquehuanca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Muñani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Potoni",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Saman",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Anton",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San José",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de Salinas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santiago de Pupuja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tirapata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Carabaya",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Macusani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ajoyani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ayapata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Coasa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Corani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Crucero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ituata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ollachea",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Gaban",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Usicayos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Chucuito",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Juli",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Desaguadero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huacullani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Kelluyo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pisacoma",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pomata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Zepita",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "El Collao",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ilave",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Capazo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pilcuyo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Conduriri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huancané",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Huancane",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cojata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huatasani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Inchupalla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pusi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Rosaspata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Taraco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vilque Chico",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Lampa",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Lampa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cabanilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Calapuja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nicasio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ocuviri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Palca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Paratia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pucara",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Lucia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Vilavila",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Melgar",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Ayaviri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Antauta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cupi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Llalli",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Macari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nuñoa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Orurillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Umachiri",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Moho",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Moho",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Conima",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huayrapata",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tilali",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "San Antonio de Putina",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Putina",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ananea",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pedro Vilca Apaza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quilcapuncu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sina",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "San Román",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Juliaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cabana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cabanillas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caracoto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Miguel",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Sandia",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Sandia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cuyocuyo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Limbani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Patambuco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Phara",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Quiaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan del Oro",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yanahuaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alto Inambari",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pedro de Putina Punco",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Yunguyo",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Yunguyo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Anapia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Copani",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cuturapi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Ollaraya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tinicachi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Unicachi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "San Martín",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Moyobamba",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Moyobamba",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Calzada",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Habana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Jepelacio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Soritor",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yantalo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Bellavista",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Bellavista",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alto Biavo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Bajo Biavo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huallaga",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Pablo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Rafael",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "El Dorado",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "San José de Sisa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Agua Blanca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Martín",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Santa Rosa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Shatoja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Huallaga",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Saposoa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alto Saposoa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Eslabón",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Piscoyacu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sacanche",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tingo de Saposoa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Lamas",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Lamas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alonso de Alvarado",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Barranquita",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caynarachi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cuñumbuqui",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pinto Recodo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Rumisapa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Roque de Cumbaza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Shanao",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tabalosos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Zapatero",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Mariscal Cáceres",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Juanjuí",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Campanilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huicungo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pachiza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pajarillo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Picota",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Picota",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Buenos Aires",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Caspisapa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pilluana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pucacaca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Cristóbal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Hilarión",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Shamboyacu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tingo de Ponasa",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tres Unidos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Rioja",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Rioja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Awajun",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Elías Soplin Vargas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nueva Cajamarca",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pardo Miguel",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Posic",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Fernando",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yorongos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yuracyacu",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "San Martín",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Tarapoto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alberto Leveau",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Cacatachi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chazuta",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Chipurana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "El Porvenir",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Huimbayoc",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Juan Guerra",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Banda de Shilcayo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Morales",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Papaplaya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Antonio",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sauce",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Shapaja",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Tocache",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Tocache",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nuevo Progreso",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Polvora",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Shunte",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Uchiza",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Tumbes",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Tumbes",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Tumbes",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Corrales",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "La Cruz",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Pampas de Hospital",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Jacinto",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "San Juan de la Virgen",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Contralmirante Villar",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Zorritos",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Casitas",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Canoas de Punta Sal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Zarumilla",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Zarumilla",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Aguas Verdes",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Matapalo",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Papayal",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

        $department = City::create([
          "name" => "Ucayali",
          "country_id" => 1,//Peru
        ]);
              //
              $province = Province::create([
                 "name" => "Coronel Portillo",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Calleria",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Campoverde",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Iparia",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Masisea",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yarinacocha",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Nueva Requena",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Manantay",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Atalaya",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Raymondi",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Sepahua",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Tahuania",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Yurua",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Padre Abad",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Padre Abad",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Irazola",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Curimana",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Neshuya",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
                    District::create([
                       "name" => "Alexander Von Humboldt",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);

              $province = Province::create([
                 "name" => "Purús",
                 "city_id" => $department->id,
                 'country_id' => 1, //Peru
              ]);
                    //
                    District::create([
                       "name" => "Purus",
                       "province_id" => $province->id,
                       "city_id" => $department->id,
                    ]);
    }
}
