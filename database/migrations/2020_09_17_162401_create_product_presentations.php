<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPresentations extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_presentations', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->unsignedInteger('main_product_id');
			$table->unsignedInteger('size_id');
			$table->unsignedInteger('color_id');
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
		Schema::dropIfExists('product_presentationso');
	}
}
