<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesToSubcategoriesTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('subcategories', function (Blueprint $table) {

            $table->string('icon')->nullable()->after('content');
            $table->string('icon_path')->nullable()->after('icon');
            $table->string('icon_white')->nullable()->after('icon_path');
            $table->string('icon_white_path')->nullable()->after('icon_white');
            $table->string('image')->nullable()->after('icon_white_path');
            $table->string('image_path')->nullable()->after('image');
            $table->string('image_thumb')->nullable()->after('image_path');
            $table->string('image_thumb_path')->nullable()->after('image_thumb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('icon');
            $table->dropColumn('icon_path');
            $table->dropColumn('icon_white');
            $table->dropColumn('icon_white_path');
            $table->dropColumn('image');
            $table->dropColumn('image_path');
            $table->dropColumn('image_thumb');
            $table->dropColumn('image_thumb_path');

        });
    }
           
            
}
