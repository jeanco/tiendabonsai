<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsConfigToCompanies extends Migration
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
            $table->string('icon_car_color')->nullable()->after('icon_car');
            $table->boolean('checkout_with_places')->default(true)->after('checkout_message');
            $table->boolean('online_payment')->default(true)->after('checkout_with_places');
            $table->string('online_payment_button_text')->default('la Compra')->after('online_payment');
            $table->string('social_reason')->nullable()->after('business_name');
            $table->string('address_social_reason')->nullable()->after('social_reason');
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
            $table->dropColumn('icon_car_color');
            $table->dropColumn('checkout_with_places');
            $table->dropColumn('online_payment');
            $table->dropColumn('online_payment_button_text');
        });
    }
}
