<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function place_order(Request $request){

       // return session('cart');
        // Session::forget('cart');

        // return session('cart');
        if(Auth::check()){
        
        }else{

        }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_number = strtoupper(substr(uniqid(sha1(time())),0,10));
        $order->save();
        $orderID =  $order->id;

        foreach(session('cart') as $item){
            $orderItem = new OrderItem();
            $orderItem->name = $item['name'];
            $orderItem->brand = $item['brand'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->product_id = $item['product_id'];
            $orderItem->order_id = $orderID;
            $orderItem->save();
        }
        Session::forget('cart');
        return redirect()->route('account-orders');

    }


    //
    public function generate_order(){
        $order = new Order();
        $order->user_id = 2;
        $order->deleted_at = date('12/12/12');
        $order->save();

        $orderItem = new OrderItem();
        $orderItem->product_id = 5;
        $orderItem->quantity = 1;
        $orderItem->price = 100;
        $orderItem->submitted = date('12/2/12');
        $order->orderItems()->save($orderItem);

        $orderItem_2 = new OrderItem();
        $orderItem_2->product_id = 6;
        $orderItem_2->quantity = 1;
        $orderItem_2->price = 200;
        $orderItem_2->submitted = date('12/2/12');
        $order->orderItems()->save($orderItem_2);


    }
}
