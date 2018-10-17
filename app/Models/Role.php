<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        //using laravel convention
        //return $this->belongsToMany('App\Models\User');

        return $this->belongsToMany('App\Models\User')->withPivot('created_at');
        //when not using laravel convention. role_user is the name of the pivot/intermediate table
        //return $this->belongsToMany('App\Models\User', 'role_user', 'role_id', 'user_id');

    }
}
