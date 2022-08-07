<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function ($table) {
			$table->integer('gender')->default(0);
			$table->string('cel_holder')->nullable();
			$table->unsignedInteger('country_id');
			$table->unsignedInteger('city_id');
			$table->date('birthday')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function ($table) {
			$table->dropColumn('gender');
			$table->dropColumn('cel_holder');
			$table->dropColumn('country_id');
			$table->dropColumn('city_id');
			$table->dropColumn('birthday');
		});
	}
}
