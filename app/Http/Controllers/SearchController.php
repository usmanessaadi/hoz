<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Color;
use App\Digital_Door_Type;
use App\Digital_Handle_Type;
use App\Digital_Lock;
use App\Digital_Lock_Type;
use App\Door;
use App\Gate;
use App\Product_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    const  UNLOCK_METHODS  = [ 'fingerprint','physical_key','bluetooth','pin','rfid_card','wifi','nfc','smasung_smart_things'];
    const  ELQOUNT_CLAUSE = [
        'whereBetween' => ['price'],
        'whereIn'      => [
                         'brand','dimensions', 'fire_rated',
                         'color_id','digital_door_type_id','digital_lock_type_id', 'digital_handle_type_id',

                        ],
        'orWhere'      => [],
        'whereNotFalse' => self::UNLOCK_METHODS
    ];



    public  function search(Request $request){
        $filter_type = $request->filter_type;
        if($filter_type == 'doors_gates'){
            $products   = $this->search_gates_and_doors($request);
            $brands     = $this->doors_gates_filter_details('brands');
            $dimensions = $this->doors_gates_filter_details('dimensions');
            $shop_type = $filter_type;

            $query_request = $this->collect_requests($request, ['brand','dimensions', 'fire_rated','price'] );

            $compact   = compact('products', 'brands', 'dimensions', 'query_request', 'shop_type');



        }elseif($filter_type == 'digital_locks'){

            $products           = $this->search_digital_locks($request);

            $brands             = $this->digital_locks_filter_details('brands');
            $unlock_methods     = $this->digital_locks_filter_details('unlock_methods');

            $doors_types        = $this->digital_locks_filter_details('doors_types');
            $locks_types        = $this->digital_locks_filter_details('locks_types');
            $handles_types      = $this->digital_locks_filter_details('handles_types');
            $colors             = $this->digital_locks_filter_details('colors');
            $shop_type          = $filter_type;

            $req_attr = array_merge(self::UNLOCK_METHODS , ['brand','color_id','digital_door_type_id','digital_lock_type_id', 'digital_handle_type_id', 'price']);
            // return $req_attr;
            $query_request = $this->collect_requests($request,  $req_attr );

            $compact  = compact('products', 'brands', 'unlock_methods','doors_types','locks_types','handles_types', 'colors', 'query_request', 'shop_type');

        }else if($filter_type == 'accessories'){
            $products           = $this->search_accessories($request);

            $brands             = $this->accessories_filter_details('brands');

            $colors             = $this->accessories_filter_details('colors');
            $shop_type          = $filter_type;
            $query_request = $this->collect_requests($request, ['brand','color_id','price'] );

            $compact  = compact('products', 'brands', 'colors', 'query_request', 'shop_type');

        }else{
            abort('404');
        }
    //    return $request->all();
    return view('shop', $compact);

    }

    protected function search_digital_locks($request){
        $digital_locks_query = [
            'select' => [
                'table' => 'digital_locks',
                'query' => [
                    'color_id', 'brand','digital_door_type_id','digital_lock_type_id', 'digital_handle_type_id',
                    'fingerprint','physical_key','bluetooth','pin','rfid_card','wifi','nfc','smasung_smart_things'
                    ]
            ],

            'join'   => [
                'table' => 'product_details',
                'on'    => 'product_details.digital_lock_id',
                'query' => ['price','color_id']
            ]
        ];
        $digital_locks = $this->query($request, $digital_locks_query)->get()->unique(['digital_lock_id']);
        return $digital_locks;
    }

    protected function search_gates_and_doors($request){
        $doors_query = [
            'select' => [
                'table' => 'doors',
                'query' => ['brand','dimensions', 'fire_rated']
            ],

            'join'   => [
                'table' => 'product_details',
                'on'    => 'product_details.door_id',
                'query' => ['price']
            ]
        ];

        $gates_query = [
            'select' => [
                'table' => 'gates',
                'query' => ['brand','dimensions']
            ],

            'join'   => [
                'table' => 'product_details',
                'on'    => 'product_details.gate_id',
                'query' => ['price']
            ]
        ];

        $doors = $this->query($request, $doors_query)->get()->unique(['door_id']);
        $gates = $this->query($request, $gates_query)->get()->unique(['gate_id']);

        $filter = collect($doors)->merge($gates);
        return $filter;
    }

    protected function search_accessories($request){
        $accessories_query = [
            'select' => [
                'table' => 'accessories',
                'query' => [
                      'brand'
                    ]
            ],

            'join'   => [
                'table' => 'product_details',
                'on'    => 'product_details.accessory_id',
                'query' => ['price','color_id']
            ]
        ];

        $accessories = $this->query($request, $accessories_query)->get()->unique(['accessory_id']);
        return $accessories;
    }

    protected function query($request , $query_prams){

        $_select = $query_prams['select'];
        $_join   = (array_key_exists("join",$query_prams)) ? $query_prams['join'] : null;

        $query = DB::table($_select['table'])->select('*');

        $query = $query->where(function($query) use($request, $_select)
        {
            $query_request = $this->collect_requests($request, $_select['query']);
            $this->query_clause($query_request, $query);

        });

        if (!is_null($_join)){

            $query = $query->join($_join['table'], function($join) use($request, $_join, $_select){

                $query_request = $this->collect_requests($request, $_join['query']);

                $join->on($_join['on'] , '=',  $_select['table'].'.id');
                $this->query_clause($query_request, $join);

            });
        }


        return $query;

    }
    /**
     * dparams : the recieved request / $query of where clause function param
     * you can add as many requests names as you want the function to  handle
     *
     */
    protected function query_clause($query_request, $query){
        if(!empty($query_request)){

            foreach ($query_request as $key => $value) {
                if(in_array($key,  self::ELQOUNT_CLAUSE['whereBetween'])){
                    $query->whereBetween($key, $value);
                }else if(in_array($key,  self::ELQOUNT_CLAUSE['whereIn'])){
                    $query->whereIn($key, $value);
                }else if(in_array($key,  self::ELQOUNT_CLAUSE['orWhere'])){
                    $query->orWhere($key, $value);
                }else if(in_array($key,  self::ELQOUNT_CLAUSE['whereNotFalse'])){
                    $query->Where($key,'!=', '0');
                }else{
                    $query->where($key, $value);
                }

            }

            // $is_empty = (count($query->get())) ? false : true;

            // if($is_empty){

            //     foreach ($query_request as $key => $value) {
            //         $query->orWhereIn($key, $value);
            //     }

            // }
        }

    }

    /**
     * defaul params (dimensions & brand)
     * note : you can add as many requests names as you want to the function
     *
     */
    protected function collect_requests($request , $prams = null){
        // $request_param = $prams ?? ['brand','dimensions'];
        $request_param = $prams ?? ['brand','dimensions'];
        $query = [];
        for ($i=0; $i<count($request_param); $i++){
            if ($request->has($request_param[$i]) ){
                $req_val = $request_param[$i];
                    $reform_request_values =  $this->reform_request_values($request->$req_val);
                    if($reform_request_values){
                        $query[$req_val] = $reform_request_values;
                    }

            }
        }
        return $query;
    }

    //helper that reform the request value for the query
    protected function reform_request_values($request_val)
    {
        $arr_query = [];
        foreach ($request_val as $key => $value) {
            if(is_null($value)){
                return false;
            }
            array_push($arr_query, $value);

        }
        return $arr_query;
    }

    //return the data that will be appear in the filter view
    public function doors_gates_filter_details($_return)
    {
        if($_return == 'brands') {
            //GET & merge  brands (doors & gates) records
            $brandDoor =  Door::select('brand', DB::raw('count(*) as total'))
                ->groupBy('brand')
                ->get();
            $brandGate =  Gate::select('brand', DB::raw('count(*) as total'))
                ->groupBy('brand')
                ->get();

            $brands = collect($brandDoor)->merge($brandGate)->unique('brand');
            $_result = $brands;

        }else if($_return == 'dimensions') {
            //GET & merge  dimensions (doors & gates) records
            $dimensionsDoor =  Door::select('dimensions', DB::raw('count(*) as total'))
            ->groupBy('dimensions')
            ->get();
            $dimensionsGate =  Gate::select('dimensions', DB::raw('count(*) as total'))
            ->groupBy('dimensions')
            ->get();
            $dimensions = collect($dimensionsDoor)->merge($dimensionsGate)->unique('dimensions');
            $_result = $dimensions;
        }else{

            return abort('404');
        }

        return $_result;

    }

    public function digital_locks_filter_details($_return)
    {
        switch ($_return) {
            case "brands":
                $_result = Digital_Lock::select('brand', DB::raw('count(*) as total'))
                ->groupBy('brand')
                ->get();
                break;

            case "doors_types":
                $_result = Digital_Door_Type::all();
                break;

            case "locks_types":
                $_result = Digital_Lock_Type::all();
                break;

            case "handles_types":
                $_result = Digital_Handle_Type::all();
                break;

            case "unlock_methods":
                $_result = self::UNLOCK_METHODS;
                break;

            case "colors":
                $_result = Product_Detail::where([['digital_lock_id','!=','null'],['color_id','!=','0']])->get()->unique('color_id');
               break;

            default:
                return abort('404');
        }
        return $_result;

    }

    public function accessories_filter_details($_return){
        if($_return == 'brands') {
            $brandDigital_lock =  Accessory::select('brand', DB::raw('count(*) as total'))
                ->groupBy('brand')
                ->get();
            $_result = $brandDigital_lock;

        }else if($_return == 'colors'){
            $_result = Product_Detail::where([['accessory_id','!=','null'],['color_id','!=','0']])->get()->unique('color_id');
        }else{

            return abort('404');
        }

        return $_result;
    }
    public function clearFilter(Request $request){

        $flter_shop_type =(in_array($request->fltertype, SHOPS_TYPES)) ? $request->fltertype : abort('404');


        return  redirect(route('shop', $flter_shop_type ));
    }

}
