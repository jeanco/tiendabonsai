<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaratrustSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		// Create table for storing roles
		Schema::create('roles', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('display_name')->nullable();
			$table->string('description')->nullable();
			$table->boolean('activated')->default(1);
            $table->timestamps();
            $table->softDeletes();
		});

		Schema::create('permission_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		// Create table for storing permissions
		Schema::create('permissions', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('display_name')->nullable();
			$table->string('description')->nullable();
            $table->boolean('activated')->default(1);
            $table->integer('permission_category_id')->unsigned();
            $table->softDeletes();
			$table->timestamps();
		});

		// Create table for associating roles to users and teams (Many To Many Polymorphic)
		Schema::create('role_user', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('role_id');
			$table->unsignedInteger('user_id');
			$table->timestamps();
		});

		// Create table for associating permissions to users (Many To Many Polymorphic)
		Schema::create('permission_user', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('permission_id');
            $table->unsignedInteger('user_id');
            $table->boolean('additional')->default(1);
            $table->boolean('activated')->default(1);
			$table->timestamps();
		});

		// Create table for associating permissions to roles (Many-to-Many)
		Schema::create('permission_role', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('permission_id');
			$table->unsignedInteger('role_id');
			$table->boolean('activated')->default(1); #refers if is active or inactive
			$table->timestamps();
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('permission_user');
		Schema::dropIfExists('permission_role');
		Schema::dropIfExists('permissions');
		Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
		Schema::dropIfExists('permission_categories');

    }
}
