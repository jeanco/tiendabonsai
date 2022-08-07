<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddOrderTypeToOrdesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function ($table) {
			$table->integer('order_type')->default(1)->after('order_history_id'); //1 compra, 2 cotizacion
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function ($table) {
			$table->dropColumn('order_type');
		});
	}
}
