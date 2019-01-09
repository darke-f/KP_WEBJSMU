<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastercustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastercustomer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('kodeCustomer', 6)->primary();
            $table->string('namaCustomer', 40);
            $table->string('alamatCustomer', 100);
            $table->string('keteranganCustomer', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastercustomer');
    }
}
