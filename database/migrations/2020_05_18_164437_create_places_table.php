<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('places', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('address')->nullable();
			$table->string('cel')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->string('schedule')->nullable();
			$table->string('geolocalization')->nullable();
			$table->unsignedInteger('company_id');
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
		Schema::dropIfExists('places');
	}
}
