<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Order extends Model
{
    use SoftDeletes;
    protected $table = "orders";
    protected $guarded = ["id"];
   // protected $softDelete = true;

    CONST  STATUS = ['waiting_payment'=>0, 'payment_approved'=>1, 'delivered'=>2, 'canceled'=>3, 'deleted'=>5];
    CONST  STATUS_NAME = ['waiting payment', 'in progress', 'delivered', 'canceled', 'deleted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, OrderItem::class);
    }

    public function orderStatus($by_name = true){

       return ($by_name) ? self::STATUS_NAME[$this->status] : array_search ($this->status, self::STATUS) ;
    }

    public function getCreatedAtAttribute(){
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d-m-Y H:i');
    }

    public function getUpdatedAtAttribute(){

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d-m-Y');
}
}
