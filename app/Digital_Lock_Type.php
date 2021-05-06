<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital_Lock_Type extends Model
{
    protected $table = "digital_locks_type";
    protected $fillable = [
        'name',
    ];

    /*
     * Get the digital_locks of the lock type
     * */
    public function digital_lock(){

        return $this->hasMany(Digital_Lock::class,'digital_lock_type_id');

    }
}
