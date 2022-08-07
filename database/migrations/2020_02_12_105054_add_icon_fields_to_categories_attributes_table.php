<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconFieldsToCategoriesAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('categories_attributes', function ($table) {
			$table->string('icon')->nullable()->after('slug');
			$table->string('icon_path')->nullable()->after('icon');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('categories_attributes', function ($table) {
			$table->dropColumn('icon');
			$table->dropColumn('icon_path');
		});
    }
}
