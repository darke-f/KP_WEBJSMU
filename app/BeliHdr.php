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
}
