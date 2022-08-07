<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIncludeToCouponProductTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('coupon_product', function (Blueprint $table) {
			$table->boolean('include')->default(true)->after('coupon_id');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('coupon_product', function (Blueprint $table) {
			$table->dropColumn('include');
		});
	}
}
