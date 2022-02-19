<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\cities;
use App\Models\distanceTbl;

class DistanceController extends Controller
{
    public function create(Request $request)
    {
        $id = $request->id;
        $city1=$request->city1;
        $city2=$request->city2;

    
        $d = DB::select("SELECT * FROM `cities`");
        
        return view("distance")->with('city1',$d)->with('city2',$d);

    
    }
    public function store(Request $request)
    {
        $id = $request->id;
      
        $city1 = $request->city1;
        $city2 = $request->city2;
        $distance=$request->distance;


        // $t = new distanceTbl();
        // $t->city1 = $city1;
        // $t->city2 = $city2;
        // $t->distance = $distance;
        // $t->save();


        DB::insert("insert into `distance_tbl` (`city1`, `city2`, `distance`) values ('$city1', '$city2', '$distance')");

        return Redirect::to('distance');

    
    }
}
