<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToCompaniesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('companies', function ($table) {
			$table->unsignedInteger('category_id')->after('latitude');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('companies', function ($table) {
			$table->dropColumn('category_id');
		});
	}
}
