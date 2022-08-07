<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetteProductTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('etiquette_product', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('etiquette_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
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
		Schema::dropIfExists('etiquette_product');
	}
}
