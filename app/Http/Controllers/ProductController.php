<?php

namespace App\Http\Controllers;

use App\Color as AppColor;
use App\Digital_Door_Type;
use App\Digital_Handle_Type;
use App\Digital_Lock;
use App\Digital_Lock_Type;
use App\Door;
use App\Gate;
use App\Product;
use App\Product_Detail;
use App\Color;
use App\User_Saved_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SearchController;
class ProductController extends Controller
{

    //
    public function shop(Request $request, $category = null)
    {
        if((!in_array($category, SHOPS_TYPES)))
            abort(404);

        $filter = [];
        if ($category == "doors_gates") {

            //GET & merge doors and gates records
            $products_doors = Product_Detail::where(['digital_lock_id' => null, ['door_id', '!=', null]])->get()->unique(['door_id']);
            $products_gates = Product_Detail::where(['digital_lock_id' => null, ['gate_id', '!=', null]])->get()->unique(['gate_id']);
            $products  = collect($products_doors)->merge($products_gates);

            $brands     = (new SearchController)->doors_gates_filter_details('brands');
            $dimensions = (new SearchController)->doors_gates_filter_details('dimensions');

            $shop_type = 'doors_gates';
            $compact =  compact('products', 'brands', 'dimensions', 'shop_type');

        } else if ($category == "digital_locks") {

            $products = Product_Detail::where(['door_id' => null, 'gate_id' => null, ['digital_lock_id', '!=', null]])->get()->unique(['digital_lock_id']);
            $shop_type = 'digital_locks';

            $brands             = (new SearchController)->digital_locks_filter_details('brands');
            $unlock_methods     = (new SearchController)->digital_locks_filter_details('unlock_methods');

            $doors_types        = (new SearchController)->digital_locks_filter_details('doors_types');
            $locks_types        = (new SearchController)->digital_locks_filter_details('locks_types');
            $handles_types      = (new SearchController)->digital_locks_filter_details('handles_types');
            $colors             = (new SearchController)->digital_locks_filter_details('colors');



            $compact =  compact(
                        'products', 'shop_type',
                        'brands','unlock_methods',
                        'doors_types','locks_types','handles_types','colors'
                        );

        } else if ($category == "accessories") {
            $products = Product_Detail::where(['door_id' => null, 'gate_id' => null, 'digital_lock_id' => null, ['accessory_id', '!=', null]])->get()->unique(['accessory_id']);
            $shop_type = 'accessories';
            $brands             = (new SearchController)->accessories_filter_details('brands');
            $colors             = (new SearchController)->accessories_filter_details('colors');
            $compact =  compact(
                'products', 'shop_type',
                'brands','colors'
                );
        } else {
            $products = Product_Detail::all();
        }


        // return($brand);
        return view('shop', $compact);
    }

    public function getProduct(Request $request, $slug)
    {
        //return session('cart');

        $product = Product_Detail::where('slug', $slug)->first();
        // dd($slug);
        if (!is_null($product['door_id'])) {
            $product_type_id = 'door_id';
        } else if (!is_null($product['gate_id'])) {
            $product_type_id = 'gate_id';
        } else if (!is_null($product['digital_lock'])) {
            $product_type_id =  'digital_lock_id';
        } else if (!is_null($product['accessory'])) {
            $product_type_id =  'accessory_id';
        } else {
            return abort(404);
        }

        $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id]]);
        $colors = Color::whereIn('id', $get_prduct_siblings->get('color_id')->toArray())->get();



        //$product_savedByAuthUser = false;

        // if(Auth::check()){
        //     $check_if_product_saved_by_user =  DB::table('user_saved_products')
        //         ->where('user_id',"=",Auth::user()->id)
        //         ->where('product_detail_id',"=",$product->id)
        //         ->get();

        //     if(count($check_if_product_saved_by_user)>0){
        //         $product_savedByAuthUser = true;
        //     }else{
        //         $product_savedByAuthUser = false;
        //     }
        // }

        if (!empty($product->digital_lock)) {
            $unlock_methodos = ['fingerprint', 'physical_key', 'bluetooth', 'pin', 'rfid_card', 'wifi', 'nfc', 'smasung_smart_things'];

            $avialable_unlock_methodos = collect([]);

            for ($i = 0; $i < count($unlock_methodos); $i++) {

                $unlock_method_query = Digital_Lock::where(['id' => $product->digital_lock['id']])
                    ->where('digital_locks.' . $unlock_methodos[$i], '!=', '0')
                    ->select('digital_locks.' . $unlock_methodos[$i])
                    ->get();

                if (count($unlock_method_query) > 0) {
                    //fill array with available unlock methods
                    $avialable_unlock_methodos->push($unlock_methodos[$i]);
                }
            }

            if ($request->ajax()) {

                //  $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id], 'id'=>$request->color_picker])->get('*');
                $get_sibling_by_color =  $get_prduct_siblings->where(['color_id' => $request->color_picker])->first();

                // $returnImages = view('templates.product-page.product-images')->with('product', $get_sibling_by_color)->render();
                $returnproduct_details = view('templates.product-page.product-details')->with(['product' => $get_sibling_by_color, 'colors' => $colors, 'avialable_unlock_methodos' => $avialable_unlock_methodos])->render();
                return response()->json(array('success' => true, 'details' => $returnproduct_details));
            }

            return view('product-page', compact('product', 'colors', 'avialable_unlock_methodos'));
        } else {
            if ($request->ajax()) {

                //  $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id], 'id'=>$request->color_picker])->get('*');
                $get_sibling_by_color =  $get_prduct_siblings->where(['color_id' => $request->color_picker])->first();

                // $returnImages = view('templates.product-page.product-images')->with('product', $get_sibling_by_color)->render();
                $returnproduct_details = view('templates.product-page.product-details')->with(['product' => $get_sibling_by_color, 'colors' => $colors])->render();
                return response()->json(array('success' => true, 'details' => $returnproduct_details));
            }
            // return $product;
            return view('product-page', compact('product', 'colors'));
        }
    }


    public function getProduct_old(Request $request, $id)
    {
        //return session('cart');

        $product = Product_Detail::find($id);

        if (!is_null($product['door_id'])) {
            $product_type_id = 'door_id';
        } else if (!is_null($product['gate_id'])) {
            $product_type_id = 'gate_id';
        } else if (!is_null($product['digital_lock'])) {
            $product_type_id =  'digital_lock_id';
        } else if (!is_null($product['accessory'])) {
            $product_type_id =  'accessory_id';
        }

        $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id]]);
        $colors = Color::whereIn('id', $get_prduct_siblings->get('color_id')->toArray())->get();



        $product_savedByAuthUser = false;

        // if(Auth::check()){
        //     $check_if_product_saved_by_user =  DB::table('user_saved_products')
        //         ->where('user_id',"=",Auth::user()->id)
        //         ->where('product_detail_id',"=",$id)
        //         ->get();

        //     if(count($check_if_product_saved_by_user)>0){
        //         $product_savedByAuthUser = true;
        //     }else{
        //         $product_savedByAuthUser = false;
        //     }
        // }

        if (!empty($product->digital_lock)) {
            $unlock_methodos = ['fingerprint', 'physical_key', 'bluetooth', 'pin', 'rfid_card', 'wifi', 'nfc', 'smasung_smart_things'];

            $avialable_unlock_methodos = collect([]);

            for ($i = 0; $i < count($unlock_methodos); $i++) {

                $unlock_method_query = Digital_Lock::where(['id' => $product->digital_lock['id']])
                    ->where('digital_locks.' . $unlock_methodos[$i], '!=', '0')
                    ->select('digital_locks.' . $unlock_methodos[$i])
                    ->get();

                if (count($unlock_method_query) > 0) {
                    //fill array with available unlock methods
                    $avialable_unlock_methodos->push($unlock_methodos[$i]);
                }
            }

            if ($request->ajax()) {

                //  $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id], 'id'=>$request->color_picker])->get('*');
                $get_sibling_by_color =  $get_prduct_siblings->where(['color_id' => $request->color_picker])->first();

                // $returnImages = view('templates.product-page.product-images')->with('product', $get_sibling_by_color)->render();
                $returnproduct_details = view('templates.product-page.product-details')->with(['product' => $get_sibling_by_color, 'colors' => $colors, 'avialable_unlock_methodos' => $avialable_unlock_methodos])->render();
                return response()->json(array('success' => true, 'details' => $returnproduct_details));
            }

            return view('product-page', compact('product', 'colors', 'avialable_unlock_methodos'));
        } else {
            if ($request->ajax()) {

                //  $get_prduct_siblings = Product_Detail::where([$product_type_id => $product[$product_type_id], 'id'=>$request->color_picker])->get('*');
                $get_sibling_by_color =  $get_prduct_siblings->where(['color_id' => $request->color_picker])->first();

                // $returnImages = view('templates.product-page.product-images')->with('product', $get_sibling_by_color)->render();
                $returnproduct_details = view('templates.product-page.product-details')->with(['product' => $get_sibling_by_color, 'colors' => $colors])->render();
                return response()->json(array('success' => true, 'details' => $returnproduct_details));
            }
            return view('product-page', compact('product', 'colors'));
        }
    }

    public function addToCart($id)
    {

        $product_name = Product_Detail::find($id)->door()->value('product_name')
            . Product_Detail::find($id)->gate()->value('product_name')
            . Product_Detail::find($id)->digital_lock()->value('product_name')
            . Product_Detail::find($id)->Accessory()->value('product_name');

        $brand = Product_Detail::find($id)->door()->value('brand')
            . Product_Detail::find($id)->gate()->value('brand')
            . Product_Detail::find($id)->digital_lock()->value('brand')
            . Product_Detail::find($id)->Accessory()->value('brand');

        // return( $product_name );
        $product = Product_Detail::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "id"=>$id,
                    "product_id" => $product->id,
                    "name" => $product_name,
                    "brand" => $brand,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->first_image->image_url
                    // "image" => $product->main_image
                ]
            ];
            session()->put('cart', $cart);
            $html = view('elements.cart')->with([session('cart')])->render();
            return response()->json(array('success' => true, 'html'=>$html));
            //return response()->json(array('success' => 'Product added to cart successfully!'));
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $html = view('elements.cart')->with([session('cart')])->render();
            return response()->json(array('success' => true, 'html'=>$html));
           // return response()->json(array('success' => 'Product added to cart successfully!'));
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"=>$id,
            "product_id" => $product->id,
            "name" => $product_name,
            "brand" => $brand,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->first_image->image_url
            // "image" => $product->main_image
        ];
        session()->put('cart', $cart);
        $html = view('elements.cart')->with([session('cart')])->render();
        return response()->json(array('success' => true, 'html'=>$html));
        //return response()->json(array('success' => 'Product added to cart successfully!'));
    }

    public function plus_minus_cart(Request $request){

        if($request->ajax()){
            $cart = session('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            $html = view('elements.cart')->with([session('cart')])->render();
            return response()->json(array('success' => true, 'html'=>$html));
        }
    }

    public function cleanCart(Request $request, $id = null){


        if(is_null($id)){
         session()->forget('cart');
           session('cart');
        }else{
            $cart = session('cart');
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        if(!$request->ajax()){
            return redirect()->back();
        }else{
            $cart = view('elements.cart')->with([session('cart')])->render();
        return response()->json(array('success' => true, 'html'=>$cart));
        }


    }

    public function test()
    {
        $product = Product_Detail::all();
        return view('test-veiw', ['products' => $product]);
    }

    public function generate_addNewProduct()
    {


        /// gates lock
        $product_1 = new Product();
        $product_1->product_name = 'test product_1';
        $product_1->description = 'description test';
        $product_1->brand = 'brand X test';
        $product_1->color_rbg = 'rgb(255, 0, 0)';
        $product_1->warranty = '1';
        $product_1->price = '1523';
        $product_1->discount = '15';
        $product_1->stock = '5';
        $product_1->save();

        $gate_1 = new Gate();
        $gate_1->dimensions = '50x80';
        $product_1->gate()->save($gate_1);

        echo '<br />gates lock saved';

        // door  lock

        $product_2 = new Product();
        $product_2->product_name = 'test product_2';
        $product_2->description = 'description test2';
        $product_2->brand = 'brand X test2';
        $product_2->color_rbg = 'rgb(255, 0, 2)';
        $product_2->warranty = '0';
        $product_2->price = '623';
        $product_2->discount = '15';
        $product_2->stock = '5';
        $product_2->save();

        $door_1 = new Door();
        $door_1->dimensions = '60x80';
        $door_1->fire_rated = '1';
        $product_2->gate()->save($door_1);

        echo '<br />door lock saved';

        // digital lock

        $product_3 = new Product();
        $product_3->product_name = 'test product_3';
        $product_3->description = 'description test2';
        $product_3->brand = 'brand X test2';
        $product_3->color_rbg = 'rgb(255, 0, 2)';
        $product_3->warranty = '1';
        $product_3->price = '23';
        $product_3->discount = '5';
        $product_3->stock = '50';
        $product_3->save();

        $digital_lock = new Digital_Lock();
        $digital_lock->fingerprint = '1501324';
        $digital_lock->physical_key = '45643213';
        $digital_lock->bluetooth = '4654354';
        $digital_lock->pin = '4654654';
        $digital_lock->rfid_card = '54154';
        $digital_lock->wifi = '1';
        $digital_lock->nfc = '0';
        $digital_lock->smasung_smart_things = '0';

        ///Add types id
        $digital_lock->digital_lock_type_id = '1';
        $digital_lock->digital_door_type_id = '2';
        $digital_lock->digital_handle_type_id = '1';

        $product_3->digital_lock()->save($digital_lock);

        echo '<br />digital lock saved';

        echo '<br />all data saved';
    }
}
