<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplate8FieldsToOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function (Blueprint $table) {
			$table->integer('when_purchased')->default(0);
			$table->integer('guarantee')->default(0);
			$table->integer('simulate_financing')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function (Blueprint $table) {
			$table->dropColumn('when_purchased');
			$table->dropColumn('guarantee');
			$table->dropColumn('simulate_financing');
		});
	}
}
