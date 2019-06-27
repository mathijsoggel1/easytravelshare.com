<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //essentials
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');

            //profile details
            $table->string('trip_name')->default('Add your trip name');
            $table->text('bio')->nullable();
            $table->date('trip_start')->nullable();
            $table->date('trip_end')->nullable();
            $table->string('avatar')->default('empty');
            $table->string('instagram');
            $table->integer('is_private')->default(1);
            $table->integer('is_premium')->default(0);

            //other
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
