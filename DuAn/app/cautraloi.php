<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cautraloi extends Model
{
    //
    protected $table = "cautraloi";
    public function cauhoi(){
    	return $this->belongTo('App/cauhoi');
    }
}
