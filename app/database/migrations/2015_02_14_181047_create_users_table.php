<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('username', 45);
            $table->string('fullname', 45);
            $table->string('phonenumber', 20);
            $table->string('password');
            $table->enum('user_type', array('admin', 'accountant'));
            $table->enum('status', array('active', 'inactive'));
            $table->string('email');
            $table->string('remember_token', 100)->nullable();
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
        Schema::drop('users');
    }

}
