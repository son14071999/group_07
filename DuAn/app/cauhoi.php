<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cauhoi extends Model
{
    //
    protected $table = "cauhoi";
    public function dethi(){
    	return $this->belongTo('App\dethi','id_de');
    }

    public function cautraloi(){
    	return $this->hasMany('App\cautraloi','id_cauHoi');
    }

    public function noidungkienthuc(){
    	return $this->belongTo('App\noidungkienthuc');
    }
    public function cacdangbai(){
    	return $this->belongTo('App\cacdangbai');
    }
}
