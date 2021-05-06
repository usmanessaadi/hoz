<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{

    /*
    * Get the details of of an Accessory product
    * */
    public function product_details(){

        return $this->hasMany(Product_Detail::class,'accessory_id');

    }

    /*
     * Get the product that own those specification
     * */
    public function product(){

        return $this->belongsTo(Product::class);

    }
}
