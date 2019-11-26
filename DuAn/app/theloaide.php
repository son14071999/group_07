<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloaide extends Model
{
    //
    protected $table = "theloaide";
    public function dethi(){
    	return $this->hasMany('App/dethi');
    }
}
