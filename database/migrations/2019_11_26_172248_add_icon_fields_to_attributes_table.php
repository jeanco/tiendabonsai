<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddIconFieldsToAttributesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('attributes', function ($table) {
			$table->string('icon')->nullable()->after('slug');
			$table->string('icon_path')->nullable()->after('icon');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('attributes', function ($table) {
			$table->dropColumn('icon');
			$table->dropColumn('icon_path');
		});
	}
}
