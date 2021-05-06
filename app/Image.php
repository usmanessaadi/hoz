<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'image_url',
        'product_detail_id'
    ];

    public  function  product_detail(){
        return $this->belongsTo(Product_Detail::class);
    }
}
