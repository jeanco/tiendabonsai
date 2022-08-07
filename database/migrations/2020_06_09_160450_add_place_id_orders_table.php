<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceIdOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function (Blueprint $table) {
			$table->unsignedInteger('place_id')->after('discount');
			$table->integer('type_recommendation')->after('place_id');
			$table->text('address')->after('type_recommendation');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function (Blueprint $table) {
			$table->dropColumn('place_id');
			$table->dropColumn('type_recommendation');
			$table->dropColumn('address');
		});
	}
}
