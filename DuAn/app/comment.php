<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //

    protected $table = "comment";
    public function user(){
    	return $this->belongTo('App/User');
    }

    public function dethi(){
    	return $this->belongTo('App/dethi');
    }

    
}
