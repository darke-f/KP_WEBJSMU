<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliHdr extends Model
{
    protected $table = 'belihdr';

    public $primaryKey = 'noTransaksiBeli';

    public $incrementing = false;

    public $fillable = [
        'noTransaksiBeli',
        'noPPB',
        'tanggalTransaksiBeli',
        'tanggalKirim',
        'kodeSupplier',
        'periodeTransaksiBeli',
        'subtotal',
        'discount',
        'total',
        'ppn',
        'grandtotal',
    ];

    public $timestamps = false;

    public function dtl()
    {
        return $this->hasMany('App\BeliDtl', 'noTransaksiBeli');
    }
    public function supplier()
    {
        return $this->belongsTo('App\MasterSupplier', 'kodeSupplier');
    } 
}
