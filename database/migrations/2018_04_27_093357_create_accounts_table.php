<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_document')->nullable();
            $table->integer('currency_id')->unsigned()->default(1);
            $table->integer('payment_way_id')->unsigned()->default(1);
            $table->integer('payment_entity_id')->unsigned()->default(1);
            $table->text('instructions')->nullable();
            $table->boolean('published')->default(true);
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
        Schema::dropIfExists('accounts');
    }
}
