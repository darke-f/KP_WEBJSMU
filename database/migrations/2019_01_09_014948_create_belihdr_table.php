<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelihdrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belihdr', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('noTransaksiBeli', 6)->primary();
            $table->string('noPPB');
            $table->date('tanggalTransaksiBeli');
            $table->string('periodeTransaksiBeli',10);
            $table->date('tanggalKirim');
            $table->char('kodeSupplier', 6);
            $table->integer('subtotal');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('ppn');
            $table->integer('grandtotal');

            $table->foreign('kodeSupplier')->references('kodeSupplier')->on('mastersupplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belihdr');
    }
}
