<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
   
     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Binhluan', 'commentable');
    }

    public function lk_fr_comment()// lien ket 1 nhieu
    {
        return $this->hasMany('App\view', 'post_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
