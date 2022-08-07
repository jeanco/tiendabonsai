<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToCompaniesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('companies', function (Blueprint $table) {
			$table->string('business_name')->nullable()->after('name_company');
			$table->date('membership_date')->nullable()->after('business_name');
			$table->boolean('status')->after('main');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('companies', function (Blueprint $table) {
			$table->dropColumn('business_name');
			$table->dropColumn('membership_date');
			$table->dropColumn('status');
		});
	}
}
