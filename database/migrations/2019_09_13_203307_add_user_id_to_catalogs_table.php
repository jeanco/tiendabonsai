<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUserIdToCatalogsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('catalogs', function ($table) {
			$table->unsignedInteger('user_id')->default(1)->after('published');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('catalogs', function ($table) {
			$table->dropColumn('user_id');
		});
	}
}
