<?php

use Illuminate\Database\Migrations\Migration;

class AddYoutubeToCompaniesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('companies', function ($table) {
      $table->string('youtube')->nullable()->after('instagram');
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
      $table->dropColumn('youtube');
    });
  }
}
