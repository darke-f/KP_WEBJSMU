<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliHdr extends Model
{
    protected $table = 'belihdr';
    public $fillable = [
        'noTransaksiBeli',
        'tanggalTransaksiBeli',
        'kodeSupplier',
        'periodeTransaksiBeli'
    ];

    public $timestamps = false;

    public function dtl()
    {
        return $this->hasMany('App\BeliDtl', 'noTransaksiBeli');
    }

    public function barang()
    {
        return $this->belongsTo('App\MasterBarang', 'kodeBarang');
    }

}
