<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $softDelete = true;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','phone_number', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_addresses(){

       return $this->hasMany(User_Address::class);

    }

    public function user_default_address(){
//        $default_address = $this->user_addresses()->where('default_address','=','1')->get();
        $default_address = $this->user_addresses()->where('default_address','=','1')->first();

        return $default_address;
    }

    public function user_saved_products(){

        return $this->belongsToMany(Product_Detail::class,'user_saved_products','user_id','product_detail_id')->withTimestamps();

    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

}
