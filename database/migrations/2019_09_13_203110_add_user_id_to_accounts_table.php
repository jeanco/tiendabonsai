<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAccountsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('accounts', function ($table) {
			$table->unsignedInteger('user_id')->default(1)->after('published');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('accounts', function ($table) {
			$table->dropColumn('user_id');
		});
	}
}
