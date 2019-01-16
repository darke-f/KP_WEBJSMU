<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    
    //table name
    protected $table = 'masterbarang';
    //Primary key
    public $primaryKey = 'kodeBarang';
    //timestamp
    public $timestamps = false;

    public $incrementing = false;

    public function pembelian()
    {
        return $this->hasMany('App\BeliDtl', 'kodeBarang');
    }

    public function penjualan()
    {
        return $this->hasMany('App\JualDtl', 'kodeBarang');
    }

   
}