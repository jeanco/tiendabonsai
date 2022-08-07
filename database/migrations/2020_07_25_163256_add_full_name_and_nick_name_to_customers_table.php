<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFullNameAndNickNameToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('last_name');
            $table->string('nick_name')->nullable()->after('full_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('nick_name');
        });
    }
}
