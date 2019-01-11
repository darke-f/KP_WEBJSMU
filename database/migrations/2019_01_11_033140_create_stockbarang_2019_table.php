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
            $table->char('kodeBarang', 6);
            $table->string('namaBarang', 40);
            $table->string('satuanBarang', 10);
            $table->integer('saldoAwal_Jan');
            $table->integer('pemasukan_Jan');
            $table->integer('pengeluaran_Jan');
            $table->integer('saldoAkhir_Jan');
            $table->integer('saldoAwal_Feb');
            $table->integer('pemasukan_Feb');
            $table->integer('pengeluaran_Feb');
            $table->integer('saldoAkhir_Feb');
            $table->integer('saldoAwal_Mar');
            $table->integer('pemasukan_Mar');
            $table->integer('pengeluaran_Mar');
            $table->integer('saldoAkhir_Mar');
            $table->integer('saldoAwal_Apr');
            $table->integer('pemasukan_Apr');
            $table->integer('pengeluaran_Apr');
            $table->integer('saldoAkhir_Apr');
            $table->integer('saldoAwal_May');
            $table->integer('pemasukan_May');
            $table->integer('pengeluaran_May');
            $table->integer('saldoAkhir_May');
            $table->integer('saldoAwal_Jun');
            $table->integer('pemasukan_Jun');
            $table->integer('pengeluaran_Jun');
            $table->integer('saldoAkhir_Jun');
            $table->integer('saldoAwal_Jul');
            $table->integer('pemasukan_Jul');
            $table->integer('pengeluaran_Jul');
            $table->integer('saldoAkhir_Jul');
            $table->integer('saldoAwal_Aug');
            $table->integer('pemasukan_Aug');
            $table->integer('pengeluaran_Aug');
            $table->integer('saldoAkhir_Aug');
            $table->integer('saldoAwal_Sep');
            $table->integer('pemasukan_Sep');
            $table->integer('pengeluaran_Sep');
            $table->integer('saldoAkhir_Sep');
            $table->integer('saldoAwal_Oct');
            $table->integer('pemasukan_Oct');
            $table->integer('pengeluaran_Oct');
            $table->integer('saldoAkhir_Oct');
            $table->integer('saldoAwal_Nov');
            $table->integer('pemasukan_Nov');
            $table->integer('pengeluaran_Nov');
            $table->integer('saldoAkhir_Nov');
            $table->integer('saldoAwal_Dec');
            $table->integer('pemasukan_Dec');
            $table->integer('pengeluaran_Dec');
            $table->integer('saldoAkhir_Dec');


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
