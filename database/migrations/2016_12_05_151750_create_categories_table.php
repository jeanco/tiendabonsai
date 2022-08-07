<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('slug');
			$table->text('content');
			$table->string('icon')->nullable();
			$table->string('icon_path')->nullable();
			$table->string('icon_white')->nullable();
			$table->string('icon_white_path')->nullable();
			$table->string('image')->nullable();
			$table->string('image_path')->nullable();
			$table->string('image_thumb')->nullable();
			$table->string('image_thumb_path')->nullable();
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
		Schema::dropIfExists('categories');

	}
}
