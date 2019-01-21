<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelidtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belidtl', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('noTransaksiBeli', 6);
            $table->char('kodeBarang', 6);
            $table->string('namaBarang', 40);
            $table->string('satuanBarang', 10);
            $table->integer('quantity');
            $table->integer('hargaSatuan');
            $table->integer('hargaTotal');

            $table->foreign('noTransaksiBeli')->references('noTransaksiBeli')->on('belihdr');
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
        Schema::dropIfExists('belidtl');
    }
}
