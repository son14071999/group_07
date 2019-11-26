<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dethi extends Model
{
    //
    protected $table = "dethi";
    public function theloaide(){
    	return $this->belongTo('App/theloaide');
    }
    public function comment(){
    	return $this->hasMany('App/comment');
    }
    public function cauhoi(){
    	return $this->hasMany('App/cauhoi');
    }
    public function ketqua(){
    	return $this->hasMany('App/ketqua');
    }
}
