<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('coupons', function (Blueprint $table) {
			$table->increments('id');
			$table->string('code');
			$table->unsignedInteger('coupon_type_id');
			$table->text('description')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->decimal('maximum', 20, 2);
			$table->decimal('minimum', 20, 2);
			$table->integer('limit');
			$table->integer('status');
			$table->text('conditions_policy')->nullable();
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
		Schema::dropIfExists('coupons');
	}
}
