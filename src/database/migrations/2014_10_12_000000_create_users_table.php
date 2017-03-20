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
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('sex')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('handicap')->nullable();
            $table->integer('verified')->default(false);
            $table->string('lang')->default('en');
            $table->boolean('terms_accepted')->default(false);
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
