<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToAlternativeDirectionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('alternative_directions', function (Blueprint $table) {
			$table->unsignedInteger('province_id')->after('country_id');
			$table->unsignedInteger('district_id')->after('province_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('alternative_directions', function (Blueprint $table) {
			$table->dropColumn('province_id');
			$table->dropColumn('district_id');
		});
	}
}
