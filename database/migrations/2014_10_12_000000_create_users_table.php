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
            $table->string('username')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('level');
            $table->string('bagian');
            $table->boolean('masterperm')->default('0');
            $table->boolean('stockperm')->default('0');
            $table->boolean('pembelianperm')->default('0');
            $table->boolean('penjualanperm')->default('0');
            $table->boolean('reportbeliperm')->default('0');
            $table->boolean('reportjualperm')->default('0');
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
