<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ='tags';
    protected $fillable=['name','status'];

    function products1(){
        return $this->belongsToMany('App\Product');
    }
}
