<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJualhdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jualhdr', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('noTransaksiJual', 6)->primary();
            $table->date('tanggalTransaksiJual');
            $table->string('periodeTransaksiJual',10);
            $table->char('kodeCustomer', 6);
            $table->integer('subtotal');
            $table->integer('discount');
            $table->integer('grandtotal');

            $table->foreign('kodeCustomer')->references('kodeCustomer')->on('mastercustomer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jualhdr');
    }
}
