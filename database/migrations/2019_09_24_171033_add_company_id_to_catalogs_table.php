<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdToCatalogsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('catalogs', function ($table) {
			$table->unsignedInteger('company_id')->after('user_id')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('catalogs', function ($table) {
			$table->dropColumn('company_id');
		});
	}
}
