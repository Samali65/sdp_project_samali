<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Vehicles;
use App\Models\Centers;
use App\Models\Products;
use Auth;



class VehicleController extends Controller
{
    public function store(Request $request){


        $bid = Auth::user()->branch;

        // dd($request->all());
        $vehicles =new Vehicles; 

        $number = $request->number;
        $state = $request->state;
        $city = $request->city;


      $d =   DB::insert("INSERT INTO `vehicles`(`number`,`state`,`city` , `branch` ) VALUES ('$number', '$state','$city', '$bid')");




      $data=Vehicles::all();


     return Redirect::to('vehicles')->with('data',$d);
}


public function vehicle_view(Request $request){


    $vid = $request->vid;
    $bid = Auth::user()->branch;

    $d = DB::select("SELECT * FROM `vehicles` Where `branch` = '$bid'");
    return view("vehicles")->with('data',$d);
  }
  
 
  public function updateVehicleView($vid){


    $d =Vehicles::find($vid) ; 
    
    return view('updatevehicles')->with('data',$d);
  }
  public function updatevehicle(Request $request){

    $vid=$request->vid;
    $number = $request->number;
    $state = $request->state;
    $city = $request->city;

    $d =  DB::update("UPDATE `vehicles` SET `number` = '$number', `state` = '$state', `city` = '$city' WHERE `vid` = '$vid'");
    $data=Vehicles::all();
    
    return Redirect::to('vehicles')->with('data',$d);
  
  }
  public function deletevehicle($vid){

    $data=Vehicles::find($vid); 
  
    // $data->delete();
      // return redirect()->back();
  
  //   if ($data) {
  //     return response()->json([
  //         'status' => 1,
          
  //         'msg' => 'success'
  //     ]);
  // } else {
  //     return response()->json([
  //         'status' => 0,
  //         'msg' => 'fail'
  //     ]);
  //     // $data->delete();
  // }
  
    $data->delete();
    return redirect()->back();
  
  }
  
  
}
