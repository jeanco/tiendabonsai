<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToStaffTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('staff', function (Blueprint $table) {
			$table->text('description')->nullable();
			$table->string('role')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('linkedin')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('staff', function (Blueprint $table) {
			$table->dropColumn('description');
			$table->dropColumn('role');
			$table->dropColumn('facebook');
			$table->dropColumn('twitter');
			$table->dropColumn('linkedin');

		});
	}
}
