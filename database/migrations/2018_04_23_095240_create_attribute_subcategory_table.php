<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeSubcategoryTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('attribute_category_subcategory', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
			$table->integer('attribute_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('attribute_category_subcategory');
	}
}
