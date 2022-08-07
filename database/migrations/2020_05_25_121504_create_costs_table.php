<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('costs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->unsignedInteger('logistic_id');
			$table->unsignedInteger('country_id');
			$table->unsignedInteger('transport_company_id');
			$table->decimal('cost', 20, 2);
			$table->boolean('all_cities')->default(false);
			$table->boolean('all_provinces')->default(false);
			$table->boolean('all_districts')->default(false);
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
		Schema::dropIfExists('costs');
	}
}
