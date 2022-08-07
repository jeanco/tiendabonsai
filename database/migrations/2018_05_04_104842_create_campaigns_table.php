<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('campaigns', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title')->nullable();
      $table->string('subtitle')->nullable();
      $table->text('content')->nullable();
      $table->string('image')->nullable();
      $table->string('image_path')->nullable();
      $table->string('image_thumb')->nullable();
      $table->string('image_thumb_path')->nullable();
      $table->string('link_text')->nullable();
      $table->string('link')->nullable();
      $table->boolean('is_blank')->default(false);
      $table->boolean('published');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('campaigns');
  }
}
