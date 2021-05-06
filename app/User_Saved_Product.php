<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class User_Saved_Product extends Pivot
{
    protected $table = "user_saved_products";



    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product_Detail::class);
    }
}
