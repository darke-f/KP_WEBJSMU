<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliDtl extends Model
{
    protected $table = 'belidtl';

    public $fillable = [
        'noTransaksiBeli',
        'kodeBarang',
        'namaBarang',
        'satuanBarang',
        'quantity',
        'hargaSatuan',
        'hargaTotal',
    ];

    public $timestamps = false;

    public function hdr()
    {
        return $this->belongsTo('App\BeliHdr', 'noTransaksiBeli');
    }
    public function barang()
    {
        return $this->belongsTo('App\MasterBarang', 'kodeBarang');
    }
}
