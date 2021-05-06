<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{

    protected $guarded = [];
    /*
    * Get the details of of a Gate product
    * */
    public function product_details(){

        return $this->hasMany(Product_Detail::class,'gate_id');

    }

    /*
   * Get the product that own those specification
   * */
    public function product(){

        return $this->belongsTo(Product::class);

    }

}
