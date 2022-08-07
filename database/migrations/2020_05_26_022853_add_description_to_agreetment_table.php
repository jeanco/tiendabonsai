<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToAgreetmentTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('agreetments', function (Blueprint $table) {
      $table->text('description')->nullable()->after('title');
      $table->unsignedInteger('company_id')->after('published');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('agreetments', function (Blueprint $table) {
      $table->dropColumn('description');
      $table->dropColumn('company_id');
    });
  }
}
