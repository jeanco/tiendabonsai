<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingCardsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('billing_cards', function (Blueprint $table) {
			$table->increments('id');
			$table->string('account_currency');
			$table->string('account_type');
			$table->string('account_number');
			$table->string('account_cci');
			$table->string('bank_image')->nullable();
			$table->string('bank_image_path')->nullable();
			$table->string('bank_image_thumb')->nullable();
			$table->string('bank_image_thumb_path')->nullable();
			$table->string('account_holder');
			$table->boolean('published');
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
		Schema::dropIfExists('billing_cards');

	}
}
