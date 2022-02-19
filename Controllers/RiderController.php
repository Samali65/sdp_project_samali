<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Riders;
use Hash;
use Session;



class RiderController extends Controller
{
    public function store(Request $request){

        // dd($request->all());
       $riders=new Riders; 

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $address = $request->address;
        $phone = $request->phone;
        $branch = Auth::user()->branch;
        
        
        

      $d =   DB::insert("INSERT INTO `riders`(`name`, `email`,`password`, `address`, `phone`, `branch`) VALUES ('$name', '$email','$password', '$address', '$phone', '$branch')");


      $data=Riders::all();
           
      return Redirect::to('riders')->with('data',$d);


}
public function riders_view(Request $request){


   $bid = Auth::user()->branch;

  
    $d = DB::select("SELECT * FROM `riders` where `branch` = '$bid'");
  
    return view("riders")->with('data',$d);
  }
  
  public function updateRidersView($id){


    $d =Riders::find($id); 
    
    return view('updateriders')->with('data',$d);
  }

  public function updateriders(Request $request){

    $id=$request->id;
    $name = $request->name;
    $email = $request->email;
    $password = $request->password;
    $address = $request->address;
    $phone = $request->phone;

    $d =  DB::update("UPDATE `riders` SET `name` = '$name', `email` = '$email', `password` = '$password', `address` = '$address', `phone` = '$phone' WHERE `id` = '$id'");
    $data=Riders::all();
    
    return Redirect::to('riders')->with('data',$d);
  
  }
  
  public function deleteriders($id){

    $data=Riders::find($id); 
  
  
    $data->delete();
    return redirect()->back();
  
  }




  public function index(Request $req){

    $rid = Session::get('uid');

    $a =count(DB::select("SELECT * FROM `products` WHERE `status` = '1' AND `prider` = '$rid'"));
    $b =count(DB::select("SELECT * FROM `products` WHERE `drider` = '$rid' AND `status` = '5'"));


    return view("rider_dashboard")->with('pickup', $a)->with('deliver', $b);
  }




  public function pickup(Request $req){


    //$rid = "3";
    $rid = Session::get('uid');


    $d = DB::select("SELECT * FROM `products` WHERE `status` = '1' AND `prider` = '$rid'");



    return view("rider_pickup")->with('data',$d);
  }



  public function pickup_mark(Request $req){


    $id = $req->id;
    //$bid = "1";
    $bid = Session::get('branch');

    while(true){
      $code = rand("1000000000", 9999999999);

      $c = DB::select("SELECT * FROM `products` WHERE `tracking_code` = '$code'");
      if(count($c)>0){
        continue;
      }else{
        DB::update("UPDATE `products` SET `status` = '2', `branch` = '$bid', `tracking_code` = '$code' WHERE `pid` = '$id'");
        break;
      }
    }



    return redirect("rider/pickup");
  }




  public function dropup(Request $req){


    //$rid = "1";
    $rid = Session::get('uid');


    $d = DB::select("SELECT * FROM `products` WHERE `drider` = '$rid' AND `status` = '5'");



    return view("rider_dropup")->with('data',$d);
  }


  
  public function dropup_conform(Request $req){


    $id = $req->id;


    return view("rider_dropup_conform")->with('id',$id);
  }


    
  public function dropup_conform_data(Request $req){

    $id = $req->id;
    $sign = $req->link;

    $filename = time().'.'.request()->img->getClientOriginalExtension();
    request()->img->move(public_path('proof'), $filename);

    DB::update("UPDATE `products` SET `sign` = '$sign', `proof` = '/proof/$filename', `status` = '6' WHERE `pid` = '$id'");

    return redirect("/rider/dropup");
  }



  public function checkValidate(Request $request)
  {
  
      {



        $email = $request->email;
        $pass = $request->password;


        $d = DB::select("SELECT * FROM `riders` WHERE `email` = '$email'");

        if(count($d)>0){

          $dp = $d[0]->password;
          if(Hash::check($pass, $dp)){


            Session::put('uid', $d[0]->id);
            Session::put('name', $d[0]->name);
            Session::put('branch', $d[0]->branch);


            return Redirect::to('/rider/');

          }else{
            return back()->withErrors([
              'email' => 'The provided credentials do not match our records.',
            ]);
          }

        }else{
          return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
          ]);
        }


       
    }


  }





  public function product_view(Request $request){


    $pid = $request->pid;
    $name = $request->name;

    $d = DB::select("SELECT * FROM `products` WHERE `pid` = '$pid'");

    return view("rider_product_view")->with('data',$d);
  }




}