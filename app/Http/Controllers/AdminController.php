<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Digital_Door_Type;
use App\Digital_Handle_Type;
use App\Digital_Lock;
use App\Digital_Lock_Type;
use App\Door;
use App\Gate;
use App\Mail\TestEmail;
use App\Product_Detail;
use App\Color;
use App\Image;
use App\Order;
use App\Product;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index(){

        return view('admin.dashboard');
    }
    public function editProduct(Request $request, $type, $id){


        if($request->isMethod('post')){
            return $this->updateProductData($request, $type, $id);
        }

        $product_parent = Product_Detail::where('id',$id);
        $data = [];
        if($type == "doors"){
            $product_parent = $product_parent->get('door_id');
            $product = Door::find($product_parent)->first();
        }else if($type == "gates"){
            $product_parent =  $product_parent->get('gate_id');
            $product = Gate::find($product_parent)->first();
        }else if($type == "digital_locks"){
            $product_parent = $product_parent->get('digital_lock_id');
            $product = Digital_Lock::find($product_parent)->first();
        }else if($type == "accessory"){
            $product_parent = $product_parent->get('accessory_id');
            $product = Accessory::find($product_parent)->first();
        }else{
            return  abort(404) ;
        }

        // return  $product  ;
        return view('admin.products.'.$type.'.edit',['product'=>$product,'type'=>$type,'id'=> $id, 'addnewElem'=>'edit']);
    }

    public function updateProductData(Request $request, $type, $id ){
        if($type == "doors"){
            $validated = $request->validate([
                'product_name' => 'required|string',
                'description'=>'required',
                'fire_rated'=>'required',
            ]);

            Door::find($id)->update([
               "product_name" => $request->product_name,
               "brand" => $request->brand,
               "dimensions" => $request->dimensions,
               "description" => $request->description,
               "fire_rated" => $request->fire_rated ?? 0,
            ]);

        }else if($type == "gates"){
             $validated = $request->validate([
                    'product_name' => 'required|string|unique:doors,product_name',
                    'description'=>'required',
                ]);
             Gate::find($id)->update([
               "product_name" => $request->product_name,
               "brand" => $request->brand,
               "dimensions" => $request->dimensions,
               "description" => $request->description,
            ]);

        }else if($type == "digital_locks"){
            return "in progress";
            // $product_parent = $product_parent->get('digital_lock_id');
            // $product = Digital_Lock::find($product_parent)->first();
        }else if($type == "accessory"){
            // $product_parent = $product_parent->get('accessory_id');
            // $product = Accessory::find($product_parent)->first();
            return "in progress";
        }else{
            return  abort(404) ;
        }

        return redirect()->route("add-product-details",['type'=>$type,'id'=>$id,'addnewElem'=>false]);
    }
    public function addProduct(Request $request, $type){

        // Mail::to('yo@gmail.com')->send(new TestEmail());
        if($request->isMethod('post')){
            if($type == "doors"){
                $validated = $request->validate([
                    'product_name' => 'required|string|unique:doors,product_name',
                    'description'=>'required',
                    'fire_rated'=>'required',
                ]);
                $new_door = new Door();
                $new_door->type_name = "Doors";
                $new_door->product_name = $request->product_name;
                $new_door->brand = $request->brand;
                $new_door->dimensions = $request->dimensions;
                $new_door->description = $request->description;
                $new_door->fire_rated = $request->fire_rated ?? 0;
                $new_door->save();
                $prd_type = "doors";
                $prd_id =$new_door->id;
            //    return redirect()->route("add-product-details",['type'=>'doors','id'=>$new_door->id]);

            }else if($type == "gates"){

                $validated = $request->validate([
                    'product_name' => 'required|string|unique:doors,product_name',
                    'description'=>'required',
                ]);
                $new_gate = new Gate();
                $new_gate->type_name = "Gates";
                $new_gate->product_name = $request->product_name;
                $new_gate->brand = $request->brand;
                $new_gate->dimensions = $request->dimensions;
                $new_gate->description = $request->description;
                $new_gate->with_upsell = $request->with_upsell ? true : false;
                $new_gate->save();
                $prd_type = "gates";
                $prd_id =$new_gate->id;
              //  return redirect()->route("add-product-details",['type'=>'gates','id'=>$new_gate->id]);
            }else if($type == "digital_locks"){
                $new_digital = new Digital_Lock();
                $new_digital->type_name = "Digital Locks";
                $new_digital->product_name = $request->product_name;
                $new_digital->description = $request->description;
                $new_digital->brand = $request->brand;
                $new_digital->fingerprint = $request->fingerprint?? 0;
                $new_digital->physical_key = $request->physical_key?? 0;
                $new_digital->bluetooth = $request->bluetooth?? 0;
                $new_digital->pin = $request->pin?? 0;
                $new_digital->rfid_card = $request->rfid_card?? 0;
                $new_digital->wifi = $request->wifi?? 0;
                $new_digital->nfc = $request->nfc?? 0;
                $new_digital->smasung_smart_things = $request->smasung_smart_things?? 0;
                if($request->selected_type == "digital_door"){
                    $new_digital->digital_door_type_id   = $request->digital_door;
                    $new_digital->digital_handle_type_id = 0;
                    $new_digital->digital_lock_type_id   = 0;
                }else if($request->selected_type == "digital_handle"){
                    $new_digital->digital_door_type_id   = 0;
                    $new_digital->digital_handle_type_id = $request->digital_handle;
                    $new_digital->digital_lock_type_id   = 0;
                }else if($request->selected_type == "digital_lock"){
                    $new_digital->digital_door_type_id   = 0;
                    $new_digital->digital_handle_type_id = 0;
                    $new_digital->digital_lock_type_id   = $request->digital_lock;
                }

                $new_digital->save();
                $prd_type = "digital_locks";
                $prd_id = $new_digital->id;
              //  return redirect()->route("add-product-details",['type'=>'digital_locks','id'=>$new_digital->id]);
            }else{
                return redirect()->route('admin-home');
            }
            return redirect()->route("add-product-details",['type'=>$prd_type,'id'=>$prd_id,'addnewElem'=>true]);
        }

        //If GET Add Product Page
        if($type == "digital_locks"){
            $digital_doors_type  =  Digital_Door_Type::all();
            $digital_handles_type =  Digital_Handle_Type::all();
            $digital_locks_type   =  Digital_Lock_Type::all();
            $data = ['type'=> $type,
                   'digital_doors_type'=>$digital_doors_type,
                   'digital_handles_type'=>$digital_handles_type,
                   'digital_locks_type'=>$digital_locks_type
                  ];
        }else{
            $data=['type'=> $type];
        }
        return view('admin.products.'.$type.'.add',$data);

    }

    public function addProductDetails(Request $request, $type, $id, $addnewElem = false){

        if($request->isMethod('post')){
            /*Insert your data*/
            $new_product_details = new Product_Detail();

            // create a new color in db
            if($request->color_id == 'hoz_create_new_color'){
                $color_name = $request->color_name;
                $color_code = $this->hexToRgb($request->color_code);
                
                $new_color = new Color();
                $new_color->color_name = $color_name;
                $new_color->color_rgb = $color_code;
                $new_color->save();
                $new_product_details->color_id = $new_color->id;
            } else {
                $new_product_details->color_id = $request->color_id;
            }
           
            $new_product_details->price = $request->price;
            $new_product_details->stock = $request->stock;
            $new_product_details->discount = $request->discount;

            if($type == "doors"){
                $door = Door::find($id);
                $new_product_details->slug =  preg_replace('/\s+/' ,'_', $door->product_name) .'_'. substr(uniqid(sha1(time())),0,5);
                $new_product_details->door_id = $id;

            }else if($type == "gates"){
                $gate = Gate::find($id);
                $new_product_details->slug = preg_replace('/\s+/', '_', $gate->product_name);
                $new_product_details->gate_id = $id;
            }
            else if($type == "digital_locks"){
                $digital_lock = Digital_Lock::find($id);
                $new_product_details->slug = preg_replace('/\s+/', '_', $digital_lock->product_name);
                $new_product_details->digital_lock_id = $id;
            }
            else if($type == "accessories"){
                $accessory = Accessory::find($id);
                $new_product_details->slug = preg_replace('/\s+/', '_', $accessory->product_name);
                $new_product_details->accessory_id = $id;
            }

            // if(request('main_image') != null){
            //     $imageName = uniqid().'.'.request()->image->getClientOriginalExtension();
            //     request()->main_image->move('storage/images/products', $imageName);
            //     $new_product_details->image =  'storage/images/prducts'.$imageName;
            // }
            $new_product_details->save();

            $images=array();
            if($files=$request->input("files")){
                $countr = 0;
                foreach($files as $file){
                    if($file != null){
                        if(!is_null($file)){
                            $countr++;
                            $img = $file;
                            $image_parts = explode(";base64,", $img);
                            $image_type_aux = explode("image/", $image_parts[0]);
                            $image_type = $image_type_aux[1];
                            $image_base64 = base64_decode($image_parts[1]);
                            $file_name = uniqid() . '.'.$image_type;
                            $path = "storage/products/" . $file_name;
                            //@unlink(COVER_UPLOAD_PATH . $user->cover_photo);
                            file_put_contents($path, $image_base64);

                            $image = new Image();
                                $image->image_url = $file_name;
                                $image->product_detail_id = $new_product_details->id;
                                $image->save();

                            // if($countr == 1){
                            //     $new_product_details->update([
                            //         "main_image"=> $file_name
                            //     ]);
                            // }else{
                            //  //   $images[]= $file_name;
                            //     $image = new Image();
                            //     $image->image_url = $file_name;
                            //     $image->product_detail_id = $new_product_details->id;
                            //     $image->save();
                            // }


                        }
                        //$images[]=$file;
                    }


                }

                // $image->insert ([
                //     "image_url"=>$images,
                //     "product_detail_id"=> $new_product_details->id
                // ]);
            }


            return response()->json(array('deletedProduct' => true, 'reload'=> true, 'msg'=>"product added successfully") );
            //return redirect()->back();
        }else{
            $queryActive = Product_Detail::STATUS['active'];
            if($type == "doors"){
                $product_details = Product_Detail::where(["door_id"=>$id,"status"=>$queryActive] )->get("*");

            }else if($type == "gates"){
                $product_details = Product_Detail::where(["gate_id"=>$id,"status"=>$queryActive] )->get("*");
            }
            else if($type == "digital_locks"){
                $product_details = Product_Detail::where(["digital_lock_id"=>$id,"status"=>$queryActive] )->get("*");
            }
            else if($type == "accessories"){
                $product_details = Product_Detail::where(["accessory_id"=>$id,"status"=>$queryActive] )->get("*");
            }
            $colors = Color::all();
            return view("admin.products.step2",[
                "product_details"=>$product_details,
                "type"=>$type,
                "id"=>$id,
                "colors"=>$colors,
                "addnewElem"=>$request->addnewElem

            ]);
        }


    }

    public function deleteProductDetail(Request $request,$id){

        Product_Detail::find($id)->update([
            "status"=>Product_Detail::STATUS['deleted']
        ]);

        return response()->json(array('deletedProduct' => true, 'reload'=> true, 'msg'=>"product deleted successfully"));
    }

    public function updateProductDetails(Request $request, $id){
        $product_details = Product_Detail::find($id);
        $data = [
            "price" => $request->price,
            "stock" => $request->stock,
            "discount" => $request->discount,
            "color_id" => $request->color_id,
        ];
        $images=array();
        if($files=$request->input("files")){
            $countr = 0;
            foreach($files as $file){
                if($file != null){
                    if(!is_null($file)){
                        $countr++;
                        $img = $file;
                        $image_parts = explode(";base64,", $img);
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $file_name = uniqid() . '.'.$image_type;
                        $path = "storage/products/" . $file_name;
                        //@unlink(COVER_UPLOAD_PATH . $user->cover_photo);
                        file_put_contents($path, $image_base64);


                        // if($countr == 1 && is_null($product_details->main_image)){
                        //     $data = array_merge($data, [ "main_image"=> $file_name]);
                        // }else{
                        //  //   $images[]= $file_name;
                        //     $image = new Image();
                        //     $image->image_url = $file_name;
                        //     $image->product_detail_id = $id;
                        //     $image->save();
                        // }
                        $image = new Image();
                        $image->image_url = $file_name;
                        $image->product_detail_id = $id;
                        $image->save();

                    }
                    //$images[]=$file;
                }


            }

            // $image->insert ([
            //     "image_url"=>$images,
            //     "product_detail_id"=> $new_product_details->id
            // ]);
        }

        $product_details->update($data);

        $returnproduct_details = view('admin.products.elements.product-details-images')->with(['product'=> $product_details])->render();
        return response()->json(array('updated' => true, 'html'=> $returnproduct_details,'container_id'=> $product_details->id));
    }

    public function deleteFile(Request $request, $path, $is_main){

        // if($request->main_img === true){
        //     Product_Detail::where('main_image',$path)->update([
        //         'main_image'=>null
        //     ]);

        // }else{

        //     Image::where('image_url',$path)->delete();
        // }
        Image::where('image_url',$path)->delete();
        if(file_exists($path)){
            unlink('storage/products/'.$path);
        }
        $product_details = Product_Detail::find($request->product_id);
        $returnproduct_details = view('admin.products.elements.product-details-images')->with(['product'=> $product_details])->render();
        return response()->json(array('deleted' => true, 'images'=> $returnproduct_details,'container_id'=> $product_details->id));
    }
    public function addDigitalType(Request $request, $type){

        if($type == "doors_type"){
            if($request->isMethod('post')){

                $digital_door_type = new Digital_Door_Type();
                $digital_door_type->name = $request->name;
                $digital_door_type->video = $request->video?? "";
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_door_type->icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_door_type->icon = 'assets/icons/door_icon.png';
                }
                $digital_door_type->save();
                return redirect()->back();
            }

            $digital_doors_type =  Digital_Door_Type::all();
            return view('admin.products.digital_locks.doors_type',[
                'digital_doors_type'=> $digital_doors_type
            ]);

        }else if($type == "handles_type"){
            if($request->isMethod('post')){

                $digital_handle_type = new Digital_Handle_Type();
                $digital_handle_type->name = $request->name;
                $digital_handle_type->video = $request->video?? "";
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_handle_type->icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_handle_type->icon = 'assets/icons/handle_icon.png';
                }
                $digital_handle_type->save();
                return redirect()->back();
            }
            $digital_handles_type =  Digital_Handle_Type::all();
            return view('admin.products.digital_locks.handles_type',[
                'digital_handles_type'=> $digital_handles_type
            ]);
        }else if($type == "locks_type"){
            if($request->isMethod('post')){
                $digital_lock_type = new Digital_Lock_Type();
                $digital_lock_type->name = $request->name;
                $digital_lock_type->video = $request->video?? "";
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_lock_type->icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_lock_type->icon = 'assets/icons/lock_icon.png';
                }
                $digital_lock_type->save();
                return redirect()->back();
            }
            $digital_locks_type =  Digital_Lock_Type::all();
            return view('admin.products.digital_locks.locks_type',[
                'digital_locks_type'=> $digital_locks_type
            ]);
        }
    }

    public function updateDigitalType(Request $request, $type,$id){

        if($type == "doors_type"){
            if($request->isMethod('PUT')){

                $digital_door_type = Digital_Door_Type::find($id);
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_door_type_icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_door_type_icon = 'assets/icons/door_icon.png';
                }

                $digital_door_type->update([
                    "name"=> $request->name,
                    "video"=>$request->video?? "",
                    "icon"=>$digital_door_type_icon
                ]);

                return redirect()->back();
            }

            $digital_doors_type =  Digital_Door_Type::all();
            return view('admin.products.digital_locks.doors_type',[
                'digital_doors_type'=> $digital_doors_type
            ]);

        }else if($type == "handles_type"){
            if($request->isMethod('PUT')){

                $digital_handle_type = Digital_Handle_Type::find($id);
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_handle_type_icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_handle_type_icon = 'assets/icons/handle_icon.png';
                }

                $digital_handle_type->update([
                    "name"=> $request->name,
                    "video"=>$request->video?? "",
                    "icon"=>$digital_handle_type_icon
                ]);

                return redirect()->back();
            }

            $digital_handles_type =  Digital_Door_Type::all();
            return view('admin.products.digital_locks.handles_type',[
                'digital_handles_type'=> $digital_handles_type
            ]);

        }else if($type == "locks_type"){

            if($request->isMethod('PUT')){

                $digital_lock_type = Digital_Lock_Type::find($id);
                if (request('icon') != null){
                    $imageName = time().'.'.request()->icon->getClientOriginalExtension();
                    request()->image->move('storage/assets/icons', $imageName);
                    $digital_lock_type_icon =  'storage/assets/icons'.$imageName;
                }else{
                    $digital_lock_type_icon = 'assets/icons/lock_icon.png';
                }

                $digital_lock_type->update([
                    "name"=> $request->name,
                    "video"=>$request->video?? "",
                    "icon"=>$digital_lock_type_icon
                ]);

                return redirect()->back();
            }

            $digital_locks_type =  Digital_Lock_Type::all();
            return view('admin.products.digital_locks.locks_type',[
                'digital_locks_type'=> $digital_locks_type
            ]);

        }
    }

    public function deleteDigitalType(Request $request, $type,$id){

        if($type == "doors_type"){
            $digital_door_type = Digital_Door_Type::find($id)->delete();
        }else if($type == "handles_type"){
            $digital_handle_type =  Digital_Handle_Type::find($id)->delete();
        }else if($type == "locks_type"){
            $digital_lock_type =  Digital_Lock_Type::find($id)->delete();

        }
        return redirect()->back();
    }

    public function manageProducts(Request $request, $type){

        if($type == 'doors'){
            $products = Product_Detail::where('door_id','!=',null)->get()->unique(['door_id']);
            $type = 'Doors';
        }elseif($type == 'gates'){
            $products = Product_Detail::where('gate_id','!=',null)->get()->unique(['gate_id']);
            $type = 'Gates';
        }elseif($type == 'digital_locks'){

            $products = Product_Detail::where('digital_lock_id','!=',null)->get()->unique(['digital_lock_id']);
            $type = 'Digital Locks';
        }else{
            $products = Product_Detail::all();
            $type = 'All products';
        }
        return view('admin.products.manage-products.manage',compact('products', 'type'));
    }

    /***********Manage Orders*********** */
    public function manageOrders(Request $request, $status){
        if($status == 'canceled' ){
            $orders = Order::where('status',Order::STATUS['canceled'])->get();
        }else if($status == 'delivered'){
            $orders = Order::where('status',Order::STATUS['delivered'])->get();
        }else{
            $orders = Order::where('status',Order::STATUS['payment_approved'])->orWhere('status',Order::STATUS['waiting_payment'])->get();
        }

        return view('admin.orders.index',['orders'=>$orders]);
    }
    public function change_order_status(Request $request,$order, $status){

        $order = Order::where('order_number', $order);
        if(!in_array($status, Order::STATUS) || !$order)
            return abort('404');

        $order->update([
            'status'=> Order::STATUS[$status]
        ]);
        return redirect()->back();


    }

    private function hexToRgb($hex) {
        info($hex);
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return("rgb(".$r.",".$g.",".$b.")");
      }

}
