<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliDtl extends Model
{
    protected $table = 'belidtl';

    public $timestamps = false;

    public function hdr()
    {
        return $this->belongsTo('App\BeliHdr', 'noTransaksiBeli');
    }
}
