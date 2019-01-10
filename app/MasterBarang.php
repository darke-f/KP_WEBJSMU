<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    
    //table name
    protected $table = 'masterbarang';
    //Primary key
    public $primaryKey = 'kodeBarang';
    //timestamp
    public $timestamp = false;

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

   
}