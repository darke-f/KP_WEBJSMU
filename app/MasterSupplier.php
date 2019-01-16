<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSupplier extends Model
{
    
    //table name
    protected $table = 'mastersupplier';
    //Primary key
    public $primaryKey = 'kodeSupplier';
    //timestamp
    public $timestamps = false;

    public $incrementing = false;

    public function beli(){
        return $this->hasMany('App\BeliHdr', 'kodeSupplier');
    }

   
}