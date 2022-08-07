<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('image')->nullable();
			$table->string('image_path')->nullable();
			$table->string('image_thumb')->nullable();
			$table->string('image_thumb_path')->nullable();

			$table->string('pdf')->nullable();
			$table->string('pdf_path')->nullable();

			$table->text('description')->nullable();
			$table->text('features')->nullable();
			$table->text('specifications')->nullable();

			$table->integer('category_id')->unsigned();
			$table->integer('subcategory_id')->unsigned();
			$table->integer('stock')->default(0);
			$table->decimal('price', 20, 2);
			$table->decimal('price_promotion', 20, 2)->nullable();
			$table->string('promotion_title')->nullable();
			$table->integer('promotion_percentage')->default(0); // porcentaje de descuento de la promoción
			$table->boolean('promotion_available')->default(0); // estado de la promoción (disponible,no disponible)
			$table->string('promotion_image')->nullable();
			$table->string('promotion_image_path')->nullable();
			$table->string('promotion_image_thumb')->nullable();
			$table->string('promotion_image_thumb_path')->nullable();
			$table->string('promotion_label_image')->nullable(); //imagen etiqueta de la promoción
			$table->string('promotion_label_image_path')->nullable();
			$table->boolean('outstanding_promotion')->default(false); // promoción destacada para mostrar en la pagina de inicio

			$table->string('video')->nullable();
			$table->integer('user_id')->unsigned();
			$table->boolean('published')->default(false);
			$table->boolean('outstanding')->default(false);
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
		Schema::dropIfExists('products');

	}
}
