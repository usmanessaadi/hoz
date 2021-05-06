<?php

namespace App\Http\Middleware;

use App\User_Address;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfUserOwnAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $selected_address = User_Address::where([
           'id' => $request->id,
           'user_id'=> Auth::user()->id
        ])->get();
        if (count($selected_address) <= 0){
           return abort(404);
           // echo 'no address';
        }else{
            return $next($request);
        }
        //echo $selected_address;

    }
}
