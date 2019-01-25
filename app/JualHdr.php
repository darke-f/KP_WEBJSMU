<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JualHdr extends Model
{
    protected $table = 'jualhdr';

    public $primaryKey = 'noTransaksiJual';

    public $incrementing = false;

    public $fillable = [
        'noTransaksiJual',
        'noPPB',
        'tanggalTransaksiJual',
        'tanggalKirim',
        'kodeCustomer',
        'periodeTransaksiJual',
        'subtotal',
        'discount',
        'total',
        'ppn',
        'grandtotal',
    ];

    public $timestamps = false;

    public function dtl()
    {
        return $this->hasMany('App\JualDtl', 'noTransaksiJual');
    }
    public function customer()
    {
        return $this->belongsTo('App\MasterCustomer', 'kodeCustomer');
    }
}
