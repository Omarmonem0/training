<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
    protected $fillable = [
        'user_id', 'post_id','type'
    ];
    public function user(){
        return $this->belongsTo('App\User');

    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
