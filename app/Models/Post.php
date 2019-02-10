<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'userId', 'title', 'body'];

    public function comments(){
        return $this->hasMany('\App\Models\Comment','postId','id');
    }
}
