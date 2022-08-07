<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->string('code');
			$table->string('description');
			$table->text('message');
			$table->decimal('total', 20, 2);
			$table->integer('customer_id')->unsigned();
			$table->integer('status'); //1 pendiente, 2 confirmado // 3 cancelado
			$table->boolean('is_separated')->default(false);
			$table->integer('account_id')->unsigned();
			$table->integer('currency_id')->unsigned();
			$table->integer('user_id')->unsigned();
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
		Schema::dropIfExists('orders');

	}
}
