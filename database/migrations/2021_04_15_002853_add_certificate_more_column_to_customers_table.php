<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCertificateMoreColumnToCustomersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('certificate_five')->nullable();
            $table->string('certificate_five_path')->nullable();

            $table->string('certificate_six')->nullable();
            $table->string('certificate_six_path')->nullable();

            $table->string('certificate_seven')->nullable();
            $table->string('certificate_seven_path')->nullable();

            $table->string('certificate_eight')->nullable();
            $table->string('certificate_eight_path')->nullable();

            $table->string('certificate_nine')->nullable();
            $table->string('certificate_nine_path')->nullable();

            $table->string('certificate_ten')->nullable();
            $table->string('certificate_ten_path')->nullable();

            $table->text('message')->nullable();
            $table->string('speciality')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('certificate_five');
            $table->dropColumn('certificate_five_path');

            $table->dropColumn('certificate_six');
            $table->dropColumn('certificate_six_path');

            $table->dropColumn('certificate_seven');
            $table->dropColumn('certificate_seven_path');

            $table->dropColumn('certificate_eight');
            $table->dropColumn('certificate_eight_path');

            $table->dropColumn('certificate_nine');
            $table->dropColumn('certificate_nine_path');

            $table->dropColumn('certificate_ten');
            $table->dropColumn('certificate_ten_path');
        });
    }
}
