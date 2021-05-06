<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = "order_items";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function product()
    {
        return $this->belongsTo(Product_Detail::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
