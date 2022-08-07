<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceFieldsToOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('orders', function (Blueprint $table) {
			$table->string('business_name')->nullable()->after('with_invoice');
			$table->string('business_address')->nullable()->after('business_name');
			$table->string('business_document')->nullable()->after('business_address');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('orders', function (Blueprint $table) {
			$table->dropColumn('business_name');
			$table->dropColumn('business_address');
			$table->dropColumn('business_document');
		});
	}
}
