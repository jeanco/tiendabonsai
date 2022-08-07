<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCreditCardComissionAmountToOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function ($table) {
			$table->decimal('credit_card_comission_amount', 20, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function ($table) {
			$table->dropColumn('credit_card_comission_amount');
		});
	}
}
