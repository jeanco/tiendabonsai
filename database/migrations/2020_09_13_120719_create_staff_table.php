<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('staff', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('cellphone')->nullable();
			$table->string('whatsapp')->nullable();
			$table->string('email')->nullable();
			$table->integer('type')->default(1);
			$table->string('image')->nullable();
			$table->string('image_path')->nullable();
			$table->boolean('published')->default(true);
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
		Schema::dropIfExists('staff');
	}
}
