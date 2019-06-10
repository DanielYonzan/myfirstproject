<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = ['category','name','description','feature_image','status','created_by'];

    public function categorydata(){
        return $this->belongsTo('App\Category','category');
    }
    public function user(){
        return $this->hasOne('App\User','id');
    }
}
