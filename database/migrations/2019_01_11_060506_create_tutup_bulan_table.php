<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutupBulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutup_bulan', function (Blueprint $table) {
            $table->string('periode',10)->primary();
            $table->boolean('istutup')->default('0');
        });

        $data = array(
            array('periode'=>'Jan2019', 'istutup'=>'0'),
            array('periode'=>'Feb2019', 'istutup'=>'0'),
            array('periode'=>'Mar2019', 'istutup'=>'0'),
            array('periode'=>'Apr2019', 'istutup'=>'0'),
            array('periode'=>'May2019', 'istutup'=>'0'),
            array('periode'=>'Jun2019', 'istutup'=>'0'),
            array('periode'=>'Jul2019', 'istutup'=>'0'),
            array('periode'=>'Aug2019', 'istutup'=>'0'),
            array('periode'=>'Sep2019', 'istutup'=>'0'),
            array('periode'=>'Okt2019', 'istutup'=>'0'),
            array('periode'=>'Nov2019', 'istutup'=>'0'),
            array('periode'=>'Dec2019', 'istutup'=>'0')
        );
        
        DB::table('tutup_bulan')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutup_bulan');
    }
}
