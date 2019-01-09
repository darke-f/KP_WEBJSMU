<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokbarangJan2019Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stokbarang_jan2019', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('kodeBarang', 6);
            $table->string('namaBarang', 40);
            $table->string('satuanBarang', 10);
            $table->integer('saldoAwal');
            $table->integer('pemasukan');
            $table->integer('pengeluaran');
            $table->integer('saldoAkhir');

            $table->foreign('kodeBarang')->references('kodeBarang')->on('masterbarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stokbarang_jan2019');
    }
}
