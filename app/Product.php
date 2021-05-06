<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
     * Get the the product specifications of type "Gate"
     * */
    public function gate(){

        return $this->hasOne(Gate::Class);

    }

    /*
      * Get the the product specifications of type "Door"
      * */
    public function door(){

        return $this->hasOne(Door::class);

    }

    /*
      * Get the the product specifications of type "accessories"
    * */
    public function accessory(){

        return $this->hasOne(Accessory::class);

    }

    /*
     * Get the the product specifications of type "Digital Locks"
   * */
    public function digital_lock(){

        return $this->hasOne(Digital_Lock::class);

    }


    ///Order functions
    public function orders()
    {
        return $this->belongsToMany(Order::class, OrderItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user_saved_products()
    {
        return $this->belongsToMany(User::class,'user_saved_products')->withTimestamps();
    }


}
