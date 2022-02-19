<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cities;


use Auth;


class ProductsController extends Controller
{
    public function store(Request $request){

        //dd($request->all());
       $products =new Products; 

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $state = $request->state;
        $zip = $request->zip;
        $details = $request->details;
        $weight = $request->weight;
        $size = $request->size;

        $sname = $request->sname;
        $semail = $request->semail;
        $sphone = $request->sphone;
        $saddress = $request->saddress;

        $city = $request->city;
        $scity = $request->scity;
        $price = $request->price;

        // $ct = '';
        // $i = 0;
        // foreach($city as $c){
        //   if($i == 0){
        //     $ct .= $c;
        //     $i = 1;
        //   }else{
        //     $ct .= ','.$c;
        //   }
        // }







      $d =   DB::insert("INSERT INTO `products`(`name`,`email`,`address`, `city`, `state`, `zip`, `details` , `weight` , `size` , `sname`, `semail` , `sphone` , `saddress`, `scity`, `price` ) 
      VALUES ('$name', '$email', '$address', '$city', '$state', '$zip','$details', '$weight','$size', '$sname','$semail', '$sphone','$saddress', '$scity', '$price')");


      $data=Products::all();
      $city= Cities::all();
      return view('products')->with('products',$data)->with('city',$city);

      // return Redirect::to('userDashboard')->with('account',$data);
}

  public function products_view(Request $request){


    $pid = $request->pid;
    $bid = Auth::user()->branch;


    $d = DB::select("SELECT * FROM `products` where `branch` = '$bid'");

    return view("orders")->with('data',$d);
  }

    public function product_view(Request $request){


      $pid = $request->pid;
      $name = $request->name;

      $d = DB::select("SELECT * FROM `products` WHERE `pid` = '$pid'");

      return view("product_view")->with('data',$d);
    }



    public function newrequestView(Request $request){

      //$bid = "1";
      $bid = Auth::user()->branch;
    

      $cities = DB::select("SELECT * FROM `centers` WHERE `cid` = '$bid'");

     

      $city = explode(",",$cities[0]->city);

      $q = '';
      $i = 0;
      foreach($city as $c){

        if($i == 0){
          $q.= "`scity` = '".$c."' ";
          $i = 1;
        }else{
          $q.= "OR `scity` = '".$c."' ";
        }


      }




      $d = DB::select("SELECT * FROM `products` WHERE `status` = '0' AND (".$q.")");

      $r = DB::select("SELECT * FROM `riders` WHERE `branch` = '$bid'");

      return view("new_request")->with('data',$d)->with('riders',$r);
    }


    public function newrequestView_riderUpdate(Request $request){

      $id = $request->id;
      $rid = $request->rid;


      DB::update("UPDATE `products` SET `prider` = '$rid', `status` = '1' WHERE `pid` = '$id'");

      return redirect("/new_request");
    }




    public function dropupView(Request $request){

      //$bid = "1";
      $bid = Auth::user()->branch;

      $d = DB::select("SELECT * FROM `products` WHERE `status` = '4' AND `branch` = '$bid'");

      $r = DB::select("SELECT * FROM `riders` WHERE `branch` = '$bid'");

      return view("dropup")->with('data',$d)->with('riders',$r);
    }


    public function dropup_riderUpdate(Request $request){

      $id = $request->id;
      $rid = $request->rid;


      DB::update("UPDATE `products` SET `drider` = '$rid', `status` = '5' WHERE `pid` = '$id'");

      return redirect("/dropup");
    }



    public function product_count(Request $request){


      $pid = $request->pid;
      
      // $count =   DB::table('products')->count();
      $count =   DB::table('products')->count();
      $pending = Products::where('status','=','1')->count();
      $pickup = Products::where('status','=','2')->count();
      $deliver = Products::where('status','=','3')->count();
      $dropup = Products::where('status','=','4')->count();
      // $count = DB::select("SELECT COUNT(pid) FROM `products` WHERE status = '1'");
    
      return view('adminDashboard',compact('pending','count','pickup','deliver','dropup'));    }


}