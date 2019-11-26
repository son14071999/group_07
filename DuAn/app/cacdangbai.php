<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cacdangbai extends Model
{
    //
    protected $table = "cacdangbai";
    public function noidungchinhthuc()
    {
    	return $this->belongsTo('App\noidungkienthuc');
	}

	public function cauhoi(){
		return $this->hasMany('App\cauhoi');
	}
}
