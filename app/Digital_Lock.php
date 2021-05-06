<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digital_Lock extends Model
{
    protected $table = 'digital_locks';

    /*
     * Get the details of of a digital lock product
     * */
    public function product_details(){

        return $this->hasMany(Product_Detail::class,'digital_lock_id');

    }

    /*
     * Get the product that own those specification
     * */
    public function product(){

        return $this->belongsTo(Product::class);

    }

    /*
     * Get the lock type that owns the digital_lock
     * */
    public function digital_lock_type(){

        return $this->belongsTo(Digital_Lock_Type::class);

    }

    /*
     * Get the door type that owns the digital_lock
     * */
    public function digital_door_type(){

        return $this->belongsTo(Digital_Door_Type::class);

    }

    /*
     *Get the handle type that owns the digital_lock
     * */
    public function digital_handle_type(){

        return $this->belongsTo(Digital_Handle_Type::class);

    }
}
