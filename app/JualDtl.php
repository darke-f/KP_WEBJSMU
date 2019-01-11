<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliHdr extends Model
{
    protected $table = 'jualdtl';

    public $timestamps = false;

    public function hdr()
    {
        return $this->belongsTo('App\JualHdr', 'noTransaksiJual');
    }
}
