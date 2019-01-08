<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';
    //Primary key
    public $primaryKey = 'id';
    //timestamp
    public $timestamp = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

   
}
