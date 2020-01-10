<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Binhluan', 'commentable');
    }
}
