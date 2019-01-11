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
    public $timestamp = false;

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

    public function pembelian()
    {
        return $this->hasMany('App\BeliHdr', 'kodeBarang');
    }

    public function penjualan()
    {
        return $this->hasMany('App\JualHdr', 'kodeBarang');
    }

   
}