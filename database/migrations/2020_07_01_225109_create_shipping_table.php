<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('shipping', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('shipping_status_id');
			$table->date('date');
			$table->text('description');
			$table->unsignedInteger('order_id');
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('shipping');
	}
}
