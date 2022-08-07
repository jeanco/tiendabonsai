<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreetmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreetments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('website');
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_thumb')->nullable();
            $table->string('image_thumb_path')->nullable();
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
        Schema::dropIfExists('agreetments');
    }
}
