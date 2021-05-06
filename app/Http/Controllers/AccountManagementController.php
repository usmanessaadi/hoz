<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Detail;
use App\User;
use App\User_Address;
use App\User_Saved_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class AccountManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function test()
    {


        echo 'for test';
    }

    public function account_controller_test(Request $request)
    {
        echo 'hi';
        echo request('phone_number');
    }

    public function myOrders(Request $request){
        return view('account.orders');
    }

    //saved products functions

    public function get_saved_products(Request $request)
    {
        $saved_products = Product_Detail::whereHas('user_saved_products', function ($query) {
            $query->where('user_id', '=', Auth::user()->id); // to add some conditions on the user :)
        })->get('*');

        if ($request->ajax()) {
            $returnHTML = view('templates.saved-products.all-products')->with('saved_products', $saved_products)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            return view('account.saved-products', compact('saved_products'));
        }
    }

    public function filter_saved_product(Request $request)
    {

        $product_type = $request->product_type;

        if ($request->product_type == 'all_types') {

            return $this->get_saved_products($request);
        } else {
            //            $product_type_id="door_id";
            if ($product_type == 'digital_locks') {
                $product_type_id = 'digital_lock_id';
            } else if ($product_type == 'doors') {
                $product_type_id = 'door_id';
            } else if ($product_type == 'gates') {
                $product_type_id = 'gate_id';
            } else if ($product_type == 'accessories') {
                $product_type_id = 'accessory_id';
            }

            // $saved_products = DB::table('product_details')
            //     ->join('user_saved_products', 'product_details.id', '=', 'user_saved_products.product_detail_id')
            //     ->join('users', 'users.id', '=', 'user_saved_products.user_id')
            //     ->where('users.id', '=', Auth::user()->id)
            //     ->join($product_type, 'product_details.' . $product_type_id, '=', $product_type . '.id')

            //     ->get();

            $saved_products = Product_Detail::whereHas('user_saved_products', function ($query) {
                    $query->where('user_id', '=', Auth::user()->id); // to add some conditions on the user :)
                })->join($product_type, 'product_details.' . $product_type_id, '=', $product_type . '.id')->get('product_details.*');

            // return  $saved_products;
            if ($request->ajax()) {
                $returnHTML = view('templates.saved-products.filter-products')->with('saved_products', $saved_products)->render();
                return response()->json(array('success' => true, 'html' => $returnHTML));
            }
        }
        //return
    }

    public function add_to_savedProducts(Request $request, $id)
    {


        $saved_prd =  DB::table('user_saved_products')
            ->where('user_id', "=", Auth::user()->id)
            ->where('product_detail_id', "=", $id)
            ->get();
        //  echo $saved_prd;
        if (count($saved_prd) > 0) {
            //Return product already exist in saved products pocket
            //            if($request->ajax())
            //            {
            return response()->json(array('product_added' => false));
            // }
        } else {

            $user_saved_products = new User_Saved_Product();
            $user_saved_products->user_id = Auth::user()->id;
            $user_saved_products->product_detail_id = $id;
            $user_saved_products->save();
            //            if($request->ajax())
            //            {
            return response()->json(array('product_added' => true));
            //  }
        }
    }

    public function remove_from_savedProducts(Request $request, $id)
    {

        $saved_prd =  DB::table('user_saved_products')
            ->where('user_id', Auth::user()->id)
            ->where('product_detail_id',  $id)
            ->get();
         //   return response()->json(array('product_removed' =>  $id ));
        if (count($saved_prd) > 0) {
            User_Saved_Product::where('product_detail_id', '=', $id)->delete();
            return response()->json(array('product_removed' => true));
        } else {
            return response()->json(array('product_removed' => false));
        }
    }

    //End Saved Products functions

    //Personal Information functions

    public function update_personal_info(Request $request)
    {
        $user =   User::where('id', Auth::user()->id)->first();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'email_verified_at' => ($request->email != $user->email) ? null : $user->email_verified_at
        ]);
        $user->save();
        return redirect()->back();

        /*    $user =   User::where('id', Auth::user()->id)->get();
        if($request->isDirty('email')){
            // price has changed
            echo 'h';
        }*/
        //            ->update(array(
        //                "default_address" => '0',
        //            ));
    }

    //End Personal Information Functions

    //manage user addresses functions

    public function add_new_user_address(Request $request)
    {

        $validatedData = $request->validate([

            'default_address' => 'in:0,1',
            //   'address' => 'required',
            'full_name' => 'required',
            'phone_number' => 'required',
            'street' => 'required',
            'apartment_unit_etc' => 'required',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required',

        ]);

        $user_address = new User_Address();
        $user_address->user_id = Auth::user()->id;
        $user_address->address = request('street') . request('apartment_unit_etc');
        $user_address->full_name = request('full_name');
        $user_address->phone_number = request('phone_number');
        $user_address->street = request('street');
        $user_address->apartment_unit_etc = request('apartment_unit_etc');
        $user_address->country = request('country');
        $user_address->state = request('state');
        $user_address->city = request('city');
        $user_address->zip_code = request('zip_code');

        $user_address->save();
        //Check if user select the new address as the default address
        if (request('default_address')) {
            return $this->set_as_default_address($request, $user_address->id);
        } else {
            return Redirect::back();
        }
    }

    public  function set_as_default_address(Request $request, $id)
    {


        $default_address_id = User_Address::where('default_address', '1')->value('id');
        $get_selected_address = User_Address::find($id);

        //Check if the selected address the default address itself
        if ($default_address_id == $id) {
            return Redirect::back();
        } else {
            //reset old default as an not default
            User_Address::where('default_address', '1')
                ->update(array(
                    "default_address" => '0',
                ));
            $get_selected_address->update(array(
                "default_address" => '1',
            ));

            return Redirect::back();
        }
    }

    public  function delete_user_address(Request $request, $id)
    {
        $get_address = User_Address::find($id);
        $get_address->delete();
        return Redirect::back();
    }

    public function update_user_address(Request $request, $id)
    {
        //not working yet
        echo 'function not working yet';
    }

    //End User address functions


    //Change Password
    public function change_user_password(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            echo 'new pass same as old one no match';
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }


}
