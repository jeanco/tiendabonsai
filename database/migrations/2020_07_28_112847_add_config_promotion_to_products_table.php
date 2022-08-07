<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfigPromotionToProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('products', function (Blueprint $table) {
			$table->boolean('show_promotion_timer')->default(true);
			$table->integer('promotion_config')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('products', function (Blueprint $table) {
			$table->dropColumn('show_promotion_timer');
			$table->dropColumn('promotion_config');
		});
	}
}
