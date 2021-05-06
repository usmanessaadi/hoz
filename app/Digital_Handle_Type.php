<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital_Handle_Type extends Model
{
    protected $table = "digital_handles_type";
    protected $fillable = [
        'name',
    ];

    /*
      * Get the digital_locks of the handle type
      * */
    public function digital_lock(){

        return $this->hasMany(Digital_Lock::class,'digital_handle_type_id');

    }
}
