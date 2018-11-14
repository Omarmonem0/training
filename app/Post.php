<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'body','user_id','likes_counter','dislikes_counter'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->hasMany('App\Likes');
    }
}
