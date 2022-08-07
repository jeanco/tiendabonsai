<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeOtherColumnsToProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('products', function (Blueprint $table) {
			$table->date('promotion_end_at')->nullable()->after('type_id');
			$table->integer('promotion_discount_type')->nullable()->after('promotion_end_at'); //1 by amount, 2 by percentage
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('products', function (Blueprint $table) {
			$table->dropColumn('promotion_end_at');
			$table->dropColumn('promotion_type');
		});
	}
}
