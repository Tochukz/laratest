<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        //Following laravel convention
        return $this->hasMany('App\Models\Comment');

        //Not following laravel convention
        //return $this->hasMany('App\Models\Comment', 'foreign_key', 'local_key');

    }
}
