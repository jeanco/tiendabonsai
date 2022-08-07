<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {


		$this->call('CompaniesTableSeeder');
		//$this->call('CountriesTableSeeder');
		// Sembrado de Ciudad/Departamento solo Tacna (provincias y distritos)
		$this->call('CitiesTableSeeder');
		$this->call('tramsportCompaniesTableSeeder');
		$this->call('UsersTableSeeder');

		$this->call('CategoriesTableSeeder');
		$this->call('SubcategoriesTableSeeder');
		//$this->call('AttributesTableSeeder');
		//$this->call('ProductsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		//$this->call('PricesRangeTableSeeder');
		$this->call('PaymentEntitiesTableSeeder');

		$this->call('ProjectsTableSeeder');
		$this->call('CampaingCategoryTableSeeder');
		//Rubros económicos
		//$this->call('CompanyCategoriesTableSeeder');

		$this->call('GalleryTypesTableSeeder');
		$this->call('ShippingStatusTableSeeder');
		$this->call('CouponTypesTableSeeder');

		//Nuevas Regiones provicias y distritos del Perú excepto Tacna
		$this->call('RegionsTableSeeder');
		//Regiones de Chile y comunas
		//$this->call('RegionsChileTableSeeder');

		$this->call('CurrenciesTableSeeder');
		$this->call('ExchangeRatesTableSeeder');
		$this->call('UserDocumentsTableSeeder');

		// Tipos de sedes
		$this->call('TypePlaceTableSeeder');

	}
}
