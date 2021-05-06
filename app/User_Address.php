<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    //
    protected $table = "user_addresses";
    protected $guarded  = [];

    function users(){
         return $this->belongsTo(User::class);
    }
}
