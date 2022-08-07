<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckoutActiveOnCompaniesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('checkout_active')->default(true)->after('main');
            $table->string('checkout_message')->nullable()->after('checkout_active');

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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('checkout_active');
            $table->dropColumn('checkout_message');

        });
    }
}
