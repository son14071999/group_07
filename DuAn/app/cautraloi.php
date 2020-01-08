<?php

namespace App;
//use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class cautraloi extends Model
{
    //
//    use Sluggable;
    protected $table = "cautraloi";
    public function cauhoi(){
    	return $this->belongTo('App/cauhoi');
    }
}
