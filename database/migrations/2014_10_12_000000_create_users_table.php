<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->boolean('activated');
			$table->string('cel');
			$table->string('address')->nullable();
			$table->string('user_image')->nullable();
			$table->string('user_image_path')->nullable();
			$table->string('user_image_thumb')->nullable();
			$table->string('user_image_thumb_path')->nullable();
			$table->integer('user_type');
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');
			$table->rememberToken();
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
		Schema::drop('users');
	}
}
