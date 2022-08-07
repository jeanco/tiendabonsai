<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsForTheGoogleMapsToProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('products', function (Blueprint $table) {
			$table->string('latitude')->nullable()->after('outstanding');
			$table->string('longitude')->nullable()->after('latitude');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('products', function ($table) {
			$table->dropColumn('latitude');
			$table->dropColumn('longitude');

		});
	}
}
