<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('customers', function (Blueprint $table) {
			$table->increments('id');
			$table->string('identity_document');
			$table->string('legal_name')->nullable(); //empresa
			$table->string('first_name')->nullable(); //persona
			$table->string('last_name')->nullable(); //persona
			$table->string('email')->nullable();
			$table->string('cel_whatsapp')->nullable();
			$table->string('facebook')->nullable();
			$table->integer('customer_type')->default(1); //1 = persona, 2 = empresa
			$table->string('address')->nullable();
			$table->integer('city_id')->unsigned();
			$table->integer('country_id')->unsigned();
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
		Schema::dropIfExists('customers');

	}
}
