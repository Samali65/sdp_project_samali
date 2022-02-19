<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Centers;
use Auth;


class CenterController extends Controller
{
    public function store(Request $request){

        // dd($request->all());
        $centers=new Centers; 

        $name = $request->name;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;



        $ct = '';
        $i = 0;
        foreach($city as $c){
          if($i == 0){
            $ct .= $c;
            $i = 1;
          }else{
            $ct .= ','.$c;
          }
        }

      $d =   DB::insert("INSERT INTO `centers`(`name`, `province`, `city`, `address`) VALUES ('$name', '$province', '$ct', '$address')");


      $data=Centers::all();

      return Redirect::to('centers')->with('centers',$d);
        

}

public function center_view(Request $request){

  $cid = $request->cid;

  $d = DB::select("SELECT * FROM `centers`");

  return view("centers")->with('data',$d);
}

public function updateCenterView($cid){


  $data =Centers::find($cid); 
  
  return view('updatecenters')->with('centers',$data);
}
public function updateCenter(Request $request){

  $cid=$request->cid;
  $name = $request->name;
  $province = $request->province;
  $city = $request->city;
  $address = $request->address;

  $d =  DB::update("UPDATE `centers` SET `name` = '$name', `province` = '$province', `city` = '$city', `address` = '$address'  WHERE `cid` = '$cid'");
  $data=Centers::all();
  
  return view('centers')->with('centers',$data);
}




public function deleteCenter($cid){

  $data=Centers::find($cid); 


  $data->delete();
  return redirect()->back();

}


}
