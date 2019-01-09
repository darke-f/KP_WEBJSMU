<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMastersupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastersupplier', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('kodeSupplier', 6)->primary();
            $table->string('namaSupplier', 40);
            $table->string('alamatSupplier', 100);
            $table->string('kotaSupplier', 30);
            $table->string('noteSupplier', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mastersupplier');
    }
}
