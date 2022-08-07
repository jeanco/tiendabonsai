<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceAndNoteToAlternativeDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('alternative_directions', function (Blueprint $table) {
            $table->string('reference')->nullable()->after('address');
            $table->text('note')->nullable()->after('reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('alternative_directions', function (Blueprint $table) {
            $table->dropColumn('reference');
            $table->dropColumn('note');
        });
    }
}
