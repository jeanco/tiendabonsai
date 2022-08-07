<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativeDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_directions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
			$table->string('identity_document')->nullable();
			$table->string('first_name')->nullable(); //persona
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('country_id');
            $table->string('phone')->nullable();
            $table->string('cel')->nullable();
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
        Schema::dropIfExists('alternative_directions');
    }
}
