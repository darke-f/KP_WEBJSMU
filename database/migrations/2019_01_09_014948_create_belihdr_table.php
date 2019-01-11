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
            $table->date('tanggalTransaksiBeli');
            $table->string('periodeTransaksiBeli',10);
            $table->char('kodeSupplier', 6);

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
