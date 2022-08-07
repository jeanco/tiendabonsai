<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToOrderHistoryTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('order_history', function ($table) {
			$table->text('description')->nullable()->after('total');
			$table->unsignedInteger('customer_id')->after('description');
			$table->unsignedInteger('account_id')->after('customer_id');
			$table->unsignedInteger('currency_id')->after('account_id');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('order_history', function ($table) {
			$table->dropColumn('description');
			$table->dropColumn('customer_id');
			$table->dropColumn('account_id');
			$table->dropColumn('currency_id');
		});
	}
}
