<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToCampaignsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('campaigns', function ($table) {
			$table->unsignedInteger('category_id')->after('published');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('campaigns', function ($table) {
			$table->dropColumn('category_id');
		});
	}
}
