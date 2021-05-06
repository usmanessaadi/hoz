<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital_Door_Type extends Model
{
    protected $table = "digital_doors_type";

    protected $fillable = [
        'name',
    ];

    /*
  * Get the digital_locks of the door type
  * */
    public function digital_lock(){

        return $this->hasMany(Digital_Lock::class,'digital_door_type_id');

    }
}
