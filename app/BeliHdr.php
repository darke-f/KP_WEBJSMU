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
        'tanggalTransaksiBeli',
        'kodeSupplier',
        'periodeTransaksiBeli',
        'subtotal',
        'discount',
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
