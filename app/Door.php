<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    protected $guarded = [];
    /*
    * Get the details of of a Dor product
    * */
    public function product_details(){

        return $this->hasMany(Product_Detail::class,'door_id');

    }

    /*
   * Get the product that own those specification
   * */
    public function product(){

        return $this->belongsTo(Product::class);

    }
}
