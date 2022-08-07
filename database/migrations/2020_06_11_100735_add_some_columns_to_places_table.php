<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToPlacesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('coupons', function (Blueprint $table) {
			$table->unsignedInteger('company_id')->after('status');
			$table->unsignedInteger('place_id')->after('company_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('coupons', function (Blueprint $table) {
			$table->dropColumn('company_id');
			$table->dropColumn('place_id');
		});
	}
}
