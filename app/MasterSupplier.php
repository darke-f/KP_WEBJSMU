<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSupplier extends Model
{
    
    //table name
    protected $table = 'mastersupplier';
    //Primary key
    //Primary key
    public $primaryKey = 'kodeSupplier';
    //timestamp
    public $timestamp = false;

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

   
}