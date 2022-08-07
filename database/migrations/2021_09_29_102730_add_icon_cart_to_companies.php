<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconCartToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companies', function ($table) {
            $table->string('icon_car')->nullable()->after('status');
            $table->string('icon_car_title')->nullable()->after('icon_car');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('companies', function ($table) {
            $table->dropColumn('icon_car');
            $table->dropColumn('icon_car_title');
        });
    }
}
