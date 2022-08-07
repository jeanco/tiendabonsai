<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('companies')->delete();

		Company::create([
			'name_company' => 'Company',
			'title_slogan' => 'Eslogan de la Empresa',
			'subtitle_slogan' => 'Bienvenidos a nuestra Empresa',
			'representative' => 'Representante Legal',
			'slug_company' => 'Company',
			'logotype' => '',
			'logotype_path' => '',
			'logotype_thumb' => '',
			'logotype_thumb_path' => '',
			'description_company' => 'Nuestra empresa es una unidad económico-social, integrada por elementos humanos, materiales y técnicos, que tiene el objetivo de obtener utilidades a través de su participación en el mercado de bienes y servicios. Para esto, hace uso de los factores productivos (trabajo, tierra y capital), además de brindar una atención de calidad a nuestros clientes.',
			'terms_and_conditions' => 'Terminos y condiciones de la empresa, descripcion que detalla la politica y reglas de negocio.',
			'email' => 'email@dominio.com',
			'address' => 'Perú',
			'phone' => '052 ',
			'cel' => '+51',
			'facebook' => 'Mypagina',
			'twitter' => 'mypagina',
			'work_description_company' => 'Descripción del perfil de profesionales que requiere la Empresa.',
			'meta_keywords' => '',
			'ga_code' => '',
			'city_id' => '1',
			'country_id' => '1',
			'category_id' => '1',
			'main' => '1',
			'status' => '1',
		]);
	}
}
