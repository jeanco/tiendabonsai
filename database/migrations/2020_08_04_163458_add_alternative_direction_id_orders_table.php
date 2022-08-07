<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlternativeDirectionIdOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function (Blueprint $table) {
			$table->unsignedInteger('alternative_direction_id')->default(0);
			$table->string('cash_payment_code')->default('-')->after('alternative_direction_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function (Blueprint $table) {
			$table->dropColumn('alternative_direction_id');
		});
	}
}
