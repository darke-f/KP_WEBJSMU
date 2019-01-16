<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutupBulan extends Model
{
    //table name
    protected $table = 'tutup_bulan';
    //Primary key
    public $primaryKey = 'periode';
    //timestamp
    public $timestamps = false;

    public $incrementing = false;
   
}
