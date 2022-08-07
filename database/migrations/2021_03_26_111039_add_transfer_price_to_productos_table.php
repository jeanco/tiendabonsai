<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferPriceToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('transfer_title')->nullable();
            $table->decimal('transfer_price', 20, 2)->nullable();
            $table->boolean('transfer_available')->default(0);
            $table->datetime('transfer_end_at')->nullable();
            $table->string('transfer_label_image')->nullable();
            $table->string('transfer_label_image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('transfer_title');
            $table->dropColumn('transfer_price');
            $table->dropColumn('transfer_available');
            $table->dropColumn('transfer_end_at');
            $table->dropColumn('transfer_label_image');
            $table->dropColumn('transfer_label_image_path');

        });
    }
}
