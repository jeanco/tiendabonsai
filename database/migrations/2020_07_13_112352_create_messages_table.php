<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('module_type_id')->unsigned();
			$table->integer('categories_id')->unsigned();
			$table->text('title')->nullable();
			$table->text('message')->nullable();
			$table->string('slug')->nullable();
			$table->integer('response')->nullable(); // esto sirve para responder  a un usuario en
			$table->integer('point')->nullable();
			$table->integer('status')->nullable();
			$table->date('date');
			$table->time('hour');
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
		Schema::dropIfExists('messages');
	}
}
