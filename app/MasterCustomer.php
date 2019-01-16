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
    public $timestamps = false;

    public $incrementing = false;

    public function jual(){
        return $this->hasMany('App\JualDtl', 'kodeCustomer');
    }

   
}