<?php

use Illuminate\Database\Migrations\Migration;

class AddAmountToCouponsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('coupons', function ($table) {
			$table->decimal('amount', 20, 2)->after('limit');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('coupons', function ($table) {
			$table->dropColumn('amount');
		});
	}
}
