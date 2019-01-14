<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockbarang2019Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockbarang_2019', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('kodeBarang', 6)->primary();
            $table->string('namaBarang', 40);
            $table->string('satuanBarang', 10);
            $table->integer('saldoAwal_Jan')->default('0');
            $table->integer('pemasukan_Jan')->default('0');
            $table->integer('pengeluaran_Jan')->default('0');
            $table->integer('saldoAkhir_Jan')->default('0');
            $table->integer('saldoAwal_Feb')->default('0');
            $table->integer('pemasukan_Feb')->default('0');
            $table->integer('pengeluaran_Feb')->default('0');
            $table->integer('saldoAkhir_Feb')->default('0');
            $table->integer('saldoAwal_Mar')->default('0');
            $table->integer('pemasukan_Mar')->default('0');
            $table->integer('pengeluaran_Mar')->default('0');
            $table->integer('saldoAkhir_Mar')->default('0');
            $table->integer('saldoAwal_Apr')->default('0');
            $table->integer('pemasukan_Apr')->default('0');
            $table->integer('pengeluaran_Apr')->default('0');
            $table->integer('saldoAkhir_Apr')->default('0');
            $table->integer('saldoAwal_May')->default('0');
            $table->integer('pemasukan_May')->default('0');
            $table->integer('pengeluaran_May')->default('0');
            $table->integer('saldoAkhir_May')->default('0');
            $table->integer('saldoAwal_Jun')->default('0');
            $table->integer('pemasukan_Jun')->default('0');
            $table->integer('pengeluaran_Jun')->default('0');
            $table->integer('saldoAkhir_Jun')->default('0');
            $table->integer('saldoAwal_Jul')->default('0');
            $table->integer('pemasukan_Jul')->default('0');
            $table->integer('pengeluaran_Jul')->default('0');
            $table->integer('saldoAkhir_Jul')->default('0');
            $table->integer('saldoAwal_Aug')->default('0');
            $table->integer('pemasukan_Aug')->default('0');
            $table->integer('pengeluaran_Aug')->default('0');
            $table->integer('saldoAkhir_Aug')->default('0');
            $table->integer('saldoAwal_Sep')->default('0');
            $table->integer('pemasukan_Sep')->default('0');
            $table->integer('pengeluaran_Sep')->default('0');
            $table->integer('saldoAkhir_Sep')->default('0');
            $table->integer('saldoAwal_Oct')->default('0');
            $table->integer('pemasukan_Oct')->default('0');
            $table->integer('pengeluaran_Oct')->default('0');
            $table->integer('saldoAkhir_Oct')->default('0');
            $table->integer('saldoAwal_Nov')->default('0');
            $table->integer('pemasukan_Nov')->default('0');
            $table->integer('pengeluaran_Nov')->default('0');
            $table->integer('saldoAkhir_Nov')->default('0');
            $table->integer('saldoAwal_Dec')->default('0');
            $table->integer('pemasukan_Dec')->default('0');
            $table->integer('pengeluaran_Dec')->default('0');
            $table->integer('saldoAkhir_Dec')->default('0');


            $table->foreign('kodeBarang')->references('kodeBarang')->on('masterbarang');


            // $table->int('saldoAwal_');
            // $table->int('pemasukan_');
            // $table->int('pengeluaran_');
            // $table->int('saldoAwal_');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockbarang_2019');
    }
}
