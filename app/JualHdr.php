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
        'tanggalTransaksiJual',
        'kodeCustomer',
        'periodeTransaksiJual'
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
