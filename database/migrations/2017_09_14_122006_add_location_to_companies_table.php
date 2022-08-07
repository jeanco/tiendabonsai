<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies',function(Blueprint $table){
            $table->string('longitude')->default('0')->after('country');
            $table->string('latitude')->default('0')->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies',function(Blueprint $table){
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
        });
    }
}
