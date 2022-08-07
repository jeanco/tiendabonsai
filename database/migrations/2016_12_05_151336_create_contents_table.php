<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contents', function (Blueprint $table) {
			$table->increments('id');
			$table->text('content');
			$table->string('resource');
			$table->string('resource_path');
			$table->string('resource_thumb');
			$table->string('resource_thumb_path');
			$table->integer('model_id');
			$table->integer('model_type'); //1 company--- 2 product-- 3 post // 4 products in promotion // 5 services
			$table->integer('type'); //1 foto 2 video // 3 archivo
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
		Schema::dropIfExists('contents');

	}
}
