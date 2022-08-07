<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddAddressToProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('products', function ($table) {
			$table->string('address')->nullable()->after('longitude');
			$table->unsignedInteger('city_id')->after('address');
			$table->unsignedInteger('country_id')->after('city_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('products', function ($table) {
			$table->dropColumn('address');
			$table->dropColumn('city_id');
			$table->dropColumn('country_id');
		});
	}
}
