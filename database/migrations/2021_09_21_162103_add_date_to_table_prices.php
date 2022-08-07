<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateToTablePrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->date('promotion_end_at')->after('place_id')->nullable();
            $table->string('etiquette')->after('promotion_end_at');
            $table->string('etiquette_path')->after('etiquette');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->dropColumn('promotion_end_at');
            $table->dropColumn('etiquette');
            $table->dropColumn('etiquette_path');
        });
    }
}
