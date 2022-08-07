<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddTermsAndConditionsToCompanies extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('companies', function ($table) {
			$table->text('terms_and_conditions')->after('proposal_value');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('companies', function ($table) {
			$table->dropColumn('terms_and_conditions');
		});
	}
}
