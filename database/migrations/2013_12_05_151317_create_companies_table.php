<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('companies', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name_company');
			$table->string('title_slogan')->nullable;
			$table->string('subtitle_slogan')->nullable;
			$table->string('representative');
			$table->string('slug_company');
			$table->string('logotype')->nullable();
			$table->string('logotype_path')->nullable();
			$table->string('logotype_thumb')->nullable();
			$table->string('logotype_thumb_path')->nullable();
			$table->string('logotype_white')->nullable();
			$table->string('logotype_white_path')->nullable();
			$table->string('logotype_white_thumb')->nullable();
			$table->string('logotype_white_thumb_path')->nullable();
			$table->text('description_company');
			$table->string('email')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('cel')->nullable();
			$table->text('vision')->nullable();
			$table->text('mission')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->text('work_description_company');

			$table->string('meta_keywords')->nullable();
			$table->string('ga_code')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
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
		Schema::dropIfExists('companies');

	}
}
