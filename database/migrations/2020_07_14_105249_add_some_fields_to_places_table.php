<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToPlacesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('places', function (Blueprint $table) {
			$table->unsignedInteger('city_id');
			$table->unsignedInteger('province_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('places', function (Blueprint $table) {
			$table->dropColumn('city_id');
			$table->dropColumn('province_id');
		});
	}
}
