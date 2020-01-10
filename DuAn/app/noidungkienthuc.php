<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noidungkienthuc extends Model
{
    //
    protected $table = "noidungkienthuc";
    public function cacdangbai(){
    	return $this->hasMany('App/cacdangbai');
    }

    public function cauhoi(){
    	return $this->hasMany('App/cauhoi');
    }
}
