<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketqua extends Model
{
    //
    protected $table = "ketqua";
    public function dethi(){
    	return $this->belongTo('App/dethi');
    }
    public function user(){
    	return $this->belongTo('App/User');
    }
}
