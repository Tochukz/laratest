<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function phone()
    {       
        /*Following convetion*/
        return $this->hasOne('App\Models\Phone');

        /*If not folloing convention then foreign_key will ne foreign key feild name (user_id) on child table 
         and local key will be the primary key field name (id) on the parent table*/
         //return $this->hasOne('App\Models\Phone', 'foreign_key', 'localkey');
    }

    public function roles()
    {
        //Using laravel convention
        return $this->belongsToMany('App\Models\Role');
        
        /* 
          when not using laravel convention. role_user which is the default pivot table name
          is  foormed by merging the table names in alphabetical order.
         */
        //return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }
}

