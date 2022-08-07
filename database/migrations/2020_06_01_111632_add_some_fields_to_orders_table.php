<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function (Blueprint $table) {
			$table->unsignedInteger('cost_id')->after('order_type');
			$table->decimal('shipping_cost', 20, 2)->after('cost_id');
			$table->unsignedInteger('coupon_id')->after('shipping_cost');
			$table->decimal('discount', 20, 2)->after('coupon_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function (Blueprint $table) {
			$table->dropColumn('cost_id');
			$table->dropColumn('shipping_cost');
			$table->dropColumn('coupon_id');
			$table->dropColumn('discount');
		});
	}
}
