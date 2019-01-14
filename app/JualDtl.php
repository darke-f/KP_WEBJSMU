<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JualDtl extends Model
{
    protected $table = 'jualdtl';

    public $fillable = [
        'noTransaksiJual',
        'kodeBarang',
        'namaBarang',
        'satuanBarang',
        'quantity'
    ];

    public $timestamps = false;

    public function hdr()
    {
        return $this->belongsTo('App\JualHdr', 'noTransaksiJual');
    }
}
