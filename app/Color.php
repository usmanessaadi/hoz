<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    public function product_details(){
        return $this->hasMany(Product_Detail::class);
    }
}

