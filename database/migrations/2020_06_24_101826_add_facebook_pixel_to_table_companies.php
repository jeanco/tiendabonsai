<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacebookPixelToTableCompanies extends Migration
{
 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            //  
                $table->string('linkedin')->nullable()->after('youtube'); //
                $table->string('whatsapp')->nullable()->after('linkedin'); //
                $table->text('mail_message')->nullable()->after('whatsapp');//
                $table->string('facebook_id')->nullable()->after('mail_message');//
                $table->text('facebook_pixel')->nullable()->after('facebook_id');//
                //$table->text('terms_conditions')->nullable()->after('facebook_pixel');
                $table->text('google_analytics')->nullable()->after('facebook_pixel');//
                $table->integer('type_header')->nullable()->after('google_analytics');//
                $table->string('color_primary')->nullable()->after('type_header');
                $table->string('color_secondary')->nullable()->after('color_primary');
                $table->string('color_tertiary')->nullable()->after('color_secondary');
                $table->string('color_font')->nullable()->after('color_tertiary');
                $table->string('color_font_hover')->nullable()->after('color_font');
                $table->string('color_header_promotion')->nullable()->after('color_font_hover');
                $table->string('color_header_menu')->nullable()->after('color_header_promotion');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('linkedin');
            $table->dropColumn('whatsapp');
            $table->dropColumn('mail_message');
            $table->dropColumn('facebook_id');
            $table->dropColumn('facebook_pixel');
            $table->dropColumn('terms_conditions');
            $table->dropColumn('google_analytics');
            $table->dropColumn('type_header');
            $table->dropColumn('color_primary');
            $table->dropColumn('color_secondary');
            $table->dropColumn('color_tertiary');
            $table->dropColumn('color_font');
            $table->dropColumn('color_font_hover');
            $table->dropColumn('color_header_promotion');
            $table->dropColumn('color_header_menu');
        });
    }
}
