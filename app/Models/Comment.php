<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        //Following laravel convention
        return $this->belongsTo('App\Models\Post');

        //Not following laravell convention
        //return $this->belongsTo('App\Models\Post', 'foreign_key', 'local_key');
    }
}
