<?php

namespace App\Http\Controllers;

use App\Digital_Door_Type;
use App\Digital_Lock;
use App\Door;
use App\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpMeChooseController extends Controller
{
    //

    //HMC Gates choice functions
    public function getGatesDimensions(Request $request){
        $GatesDimensions = Gate::all();
        // echo $GatesDimensions->pluck('dimensions');
        if($request->ajax())
        {
            $returnHTML = view('templates.HMC.gates.dimensions')->with('GatesDimensions', $GatesDimensions)->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }

    public function HMC_getGates(Request $request){
       $dimensions = '50x80';
       $HMC_getGates = Gate::where('dimensions',$dimensions);

         echo $HMC_getGates->get('id') ;
    }

    //HMC doors choice functions
    public function getDoorsDimensions(Request $request){
        $DoorsDimensions = Door::all();
//        echo $DoorsDimensions->pluck('dimensions');
        if($request->ajax())
        {
            $returnHTML = view('templates.HMC.doors.dimensions')->with('DoorsDimensions', $DoorsDimensions)->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }

    public function getFireRatedOption(Request $request){

        $dimensions = $request->get('dimension');

        $get_doors = Door::where([
            'dimensions' => $dimensions,
        ])->get();

        $fire_rated =0;
        $not_fire_rated =0;
        //check if the return dimensions available as fire rated or not fire rated or both
        foreach ($get_doors as $is_fire_rated) {
           if($is_fire_rated->fire_rated == 1){
               //if the dimension selected has fire rated feature
               $fire_rated++;
           }elseif( $is_fire_rated->fire_rated == 0){
               //if the dimension selected doesn't have fire rated feature
               $not_fire_rated++;
           }
        }
        if($fire_rated >= 1 && $not_fire_rated >= 1){
            //set "both" as value to $val if selected dimension has the feature [fireRated and no fireRated]
            $val = 'both';
        }elseif($fire_rated >= 1){
            //set "yes" as value to $val if selected dimension has the feature [fireRated ]
            $val = 'yes';
        }elseif($not_fire_rated >= 1){
            //set "no" as value to $val if selected dimension has the feature [ no fireRated]
            $val = 'no';

        }
        if($request->ajax())
        {
           $returnHTML = view('templates.HMC.doors.firerated-option')->with([
               'is_firerated'=>$val,
               'dimensions'=>$dimensions
               ])->render();
            return response()->json(array('success' => true, 'is_firerated'=> $val, 'html'=>$returnHTML));
        }
    }

    public function HMC_getDoors(Request $request){
        $dimensions = $request->get('dimension');
        $is_firerated = $request->get('is_firerated');

        $HMC_getDoors = Door::where([
            'dimensions' => $dimensions,
            'fire_rated' => $is_firerated,
        ])->get();

        return response()->json(array('success' => true, $HMC_getDoors));
    }

    public function getAccessories(){}

    //HMC digital_Lock choice functions

    public function getDigitalLock_Types(){
        $returnHTML = view('templates.HMC.digital_locks.types')->with('doors','handles', 'locks')->render();
        return response()->json(array('success' => true,  'html'=>$returnHTML));
    }

    public function getDigitalLock_DoorsType(Request $request){
//        $getDigitalLock_DoorsType = Digital_Door_Type::all();
//        echo $getDigitalLock_DoorsType->pluck('name');
        $getDigitalLock_DoorsType = DB::table('digital_doors_type')
            ->join('digital_locks','digital_doors_type.id','=','digital_locks.id')
        //    ->join('products','digital_locks.id','=','products.id')
            ->select('*')
            ->get();
       // echo $getDigitalLock_DoorsType;
        if($request->ajax())
        {
        $returnHTML = view('templates.HMC.digital_locks.door-type')->with(['getDigitalLock_DoorsType'=>$getDigitalLock_DoorsType])->render();
        return response()->json(array('success' => true,  'html'=>$returnHTML));
        }
    }

    public function getDigitalLock_LocksType(Request $request,$selected_doorType_id){

        $getDigitalLock_LocksType = DB::table('digital_locks_type')
            ->whereIn('digital_locks_type.id',
                DB::table('digital_locks')
                    ->where('digital_locks.digital_door_type_id','=',$selected_doorType_id)
                    ->select('digital_locks.digital_lock_type_id')->distinct()
                     )
            ->select('digital_locks_type.*')
            ->get();

        $getAvailable_DigitalLock_LocksType_Excluding_OutOfStock_And_TrueData = DB::table('digital_locks_type')
          ->whereNotIn('digital_locks_type.id',

                    DB::table('digital_locks')
                        ->where('digital_locks.digital_door_type_id','=',$selected_doorType_id)
                        ->select('digital_locks.digital_lock_type_id')->distinct()

                    )
            ->whereIn('digital_locks_type.id',
                DB::table('digital_locks')
                    ->select('digital_locks.digital_lock_type_id')->distinct()
                )
            ->select('digital_locks_type.*')
            ->get();


//        echo $getDigitalLock_LocksType;
//
//        echo'<br/> $getAvailable_DigitalLock_LocksType_Excluding_OutOfStock_And_TrueData';
//
//        echo $getAvailable_DigitalLock_LocksType_Excluding_OutOfStock_And_TrueData;
        if($request->ajax())
        {
            $returnHTML = view('templates.HMC.digital_locks.lock-type')->with([
                'selected_doorType'=>$selected_doorType_id,
                'getDigitalLock_LocksType'=>$getDigitalLock_LocksType,
                'getAvailable_DigitalLock_LocksType_Excluding_OutOfStock_And_TrueData'=>$getAvailable_DigitalLock_LocksType_Excluding_OutOfStock_And_TrueData ,
            ])->render();
            return response()->json(array('success' => true,  'html'=>$returnHTML));
        }

    }

    public function getDigitalLock_HandlesType(Request $request,$selected_doorType_id,$selected_lockType_id){

        $getDigitalLock_HandlesType = DB::table('digital_handles_type')
            ->whereIn('digital_handles_type.id',
                DB::table('digital_locks')
                ->where('digital_locks.digital_door_type_id','=',$selected_doorType_id)
                ->where('digital_locks.digital_lock_type_id','=',$selected_lockType_id)
                ->select('digital_locks.digital_handle_type_id')->distinct()
                )
            ->select('digital_handles_type.*')
            ->get();



        $getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData = DB::table('digital_handles_type')
            ->whereNotIn('digital_handles_type.id',

                DB::table('digital_locks')
                    ->where('digital_locks.digital_door_type_id','=',$selected_doorType_id)
                    ->where('digital_locks.digital_lock_type_id','=',$selected_lockType_id)
                    ->select('digital_locks.digital_handle_type_id')->distinct()

            )
            ->whereIn('digital_handles_type.id',
                DB::table('digital_locks')
                    ->select('digital_locks.digital_handle_type_id')->distinct()
            )
            ->select('digital_handles_type.name','digital_handles_type.id')
            ->get();

//        echo $getDigitalLock_HandlesType;
//        echo '<br/>getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData <br />';
//        echo $getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData;
        if($request->ajax())
        {
            $returnHTML = view('templates.HMC.digital_locks.handle-type')->with([
                'selected_doorType'=>$selected_doorType_id,
                'selected_lockType'=>$selected_lockType_id,
                'getDigitalLock_HandlesType'=>$getDigitalLock_HandlesType,
                'getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData'=>$getAvailable_DigitalLock_HandlesType_Excluding_OutOfStock_And_TrueData ,
            ])->render();
            return response()->json(array('success' => true,  'html'=>$returnHTML));
        }
    }

    public function  getDigitalLock_UnlockMethods(Request $request, $selected_doorType_id,$selected_lockType_id,$selected_handleType){

        $unlock_methodos = ['fingerprint','physical_key','bluetooth','pin','rfid_card','wifi','nfc','smasung_smart_things'];


        $avialable_unlock_methodos = collect([]);
        $not_avialable_unlock_methodos = collect([]);

        for ($i = 0; $i < count($unlock_methodos);$i++){

            $unlock_method_query = DB::table('digital_locks')

                ->where([
                    'digital_locks.digital_door_type_id'=>$selected_doorType_id,
                    'digital_locks.digital_lock_type_id'=>$selected_lockType_id,
                    'digital_locks.digital_handle_type_id'=>$selected_handleType,
                ])
                ->where('digital_locks.'.$unlock_methodos[$i], '!=', '0')

                ->select('digital_locks.'.$unlock_methodos[$i])
                ->get();

                if(count($unlock_method_query) > 0){
                    //fill array with available unlock methods
                    $avialable_unlock_methodos->push($unlock_methodos[$i]);
                }else{
                    //fill array with not available unlock methods
                    $not_avialable_unlock_methodos->push($unlock_methodos[$i]);
                }
           // echo $unlock_method_query;
        }
        if($request->ajax())
        {
            $returnHTML = view('templates.HMC.digital_locks.unlockmethods')->with([
                'selected_doorType'=>$selected_doorType_id,
                'selected_lockType'=>$selected_lockType_id,
                'selected_handleType'=>$selected_handleType,
                'avialable_unlock_methodos'=>$avialable_unlock_methodos,
                'not_avialable_unlock_methodos'=>$not_avialable_unlock_methodos,
            ])->render();
            return response()->json(array('success' => true,  'html'=>$returnHTML));
        }
       // echo $fingerprint;
    }
}
