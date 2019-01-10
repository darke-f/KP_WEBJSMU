<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCustomer extends Model
{
    
    //table name
    protected $table = 'mastercustomer';
    //Primary key
    public $primaryKey = 'kodeCustomer';
    //timestamp
    public $timestamp = false;

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

   
}