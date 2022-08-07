<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeToIntegerSomeColumnsOnCompanies extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('companies', function (Blueprint $table) {
			// $table->renameColumn('city', 'city_id');
			$table->unsignedInteger('city_id')->default(1)->change();
			// $table->renameColumn('country', 'country_id');
			$table->unsignedInteger('country_id')->default(1)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('companies', function (Blueprint $table) {
			$table->string('city_id')->nullable()->change();
			$table->string('country_id')->nullable()->change();
		});
	}
}
