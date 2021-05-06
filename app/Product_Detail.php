<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product_Detail extends Model
{
    //
    protected $guarded = [];
    protected $table = 'product_details';
    const STATUS = ['active'=>1, 'paused'=>0,'deleted'=>-1];
    const TYPES = ['door_id'=>'doors','gate_id'=>'gates','digital_lock_id'=>'digital_locks', 'accessory_id'=>'accessory'];
    const TYPES_SINGULAR = ['door_id'=>'door','gate_id'=>'gate','digital_lock_id'=>'digital_lock', 'accessory_id'=>'accessory'];
    public function digital_lock(){

        return $this->belongsTo(Digital_Lock::class,'digital_lock_id');

    }

    public function door(){

        return $this->belongsTo(Door::class,'door_id');

    }

    public function gate(){

        return $this->belongsTo(Gate::class,'gate_id');

    }

    public function Accessory(){

        return $this->belongsTo(Accessory::class,'accessory_id');
    }

    public function images(){

        return $this->hasMany(Image::class,'product_detail_id');

    }

    public function color(){

        return $this->belongsTo(Color::class);

    }

    public function getAllProductColor(){


        return $this->where(['door_id'=>1])->pluck('color_id');
        return $this->color->whereIn('id',$this->where(['door_id'=>1])->pluck('color_id'))->get('id');
       // return \App\Color::whereIn('id' ,$this->color->pluck('id')->toArray())->get() ;
       // return $this->color->where(['door_id'=>1]);
        //return $this->where(['door_id'=>1])->get()->this.color();

    }

    public function getFirstImageAttribute(){
        return $this->images->first();
    }

    public function user_saved_products()
    {
        return $this->belongsToMany(User::class,'user_saved_products', 'product_detail_id')->withTimestamps();
    }

    public function type(){
        $types = self::TYPES;
        foreach($types as $key => $value){
            if(!is_null($this->$key)){
                return $value;
            }
        }

        return 'all';
    }

    public function get_product($name = null){

        if(!is_null($name)){
            $types = self::TYPES_SINGULAR;
            foreach($types as $key => $value){
                if(!is_null($this->$key)){
                    return $this->$value[$name];
                }
            }
        }

    }

    public function is_savedProduct(){
        $product_savedByAuthUser = false;

        if(Auth::check()){
            $check_if_product_saved_by_user =  DB::table('user_saved_products')
                ->where('user_id',"=",Auth::user()->id)
                ->where('product_detail_id',"=",$this->id)
                ->get();

            if(count($check_if_product_saved_by_user)>0){
                $product_savedByAuthUser = true;
            }else{
                $product_savedByAuthUser = false;
            }
        }

        return $product_savedByAuthUser;
    }

    public function getSellingPriceAttribute() {
        return  $this->price - ($this->discount/100 * $this->price) ;
    }

    // public function getDiscountAttribute() {
    //     $discount =  $this->attributes['discount'] ;
    //     $price = $this->price;
    //     return  $price - ($discount/100 * $price) ;
    // }

}
