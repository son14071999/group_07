<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cacdangbai extends Model
{
    //
    protected $table = "cacdangbai";

	public function cauhoi(){
		return $this->hasMany('App\cauhoi','id_cdb');
	}
	public function theloaide(){
	    return $this->belongsTo('App\theloaide');
    }
}
