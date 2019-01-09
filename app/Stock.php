<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\BindsDynamically;

class Stock extends Model
{
    //use BindsDynamically;

    public $timestamps = false;

    protected $table = 'stokbarang_jan2019';

    public $primaryKey = "kodeBarang";

    /*public function __construct($type = null) {

        parent::__construct();

        $this->setTable($type);
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

   
}
