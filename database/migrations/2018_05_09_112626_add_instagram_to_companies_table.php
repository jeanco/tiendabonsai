<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddInstagramToCompaniesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('companies', function ($table) {
      $table->string('instagram')->nullable()->after('google');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('companies', function ($table) {
      $table->dropColumn('instagram');
    });
  }
}
