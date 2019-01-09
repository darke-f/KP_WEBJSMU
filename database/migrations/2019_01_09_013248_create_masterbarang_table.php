<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterbarang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('kodeBarang', 6)->primary();
            $table->string('namaBarang', 40);
            $table->string('satuanBarang', 10);
            $table->string('noteBarang', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterbarang');
    }
}
