<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function user(){
        //return $this->belongTo('App]\Models\User', 'foreign_key', 'local_key');

        /* Following convention where foreign key is user_id and local key is id */
        return $this->belongsTo('App\Models\User');
    }
}
