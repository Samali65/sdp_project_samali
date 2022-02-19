<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Products;
use Auth;


class PickController extends Controller
{
    public function search_product(Request $request){

        
        
        $data=$request->pid;

        //dd($data);


    //   dd($data);   
       $d = DB::select("SELECT * FROM products WHERE `status` = '1'");

       return view("pick")->with('data',$d);
     
     }




    public function pick(Request $request){

        $bid = Auth::user()->branch;


        $data= DB::select("SELECT * FROM `products` WHERE `status` = '2' AND `branch` = '$bid'");
        return view('pick')->with('data',$data);
     
    }

    public function pickup(Request $request){

        $id = $request->id;

        $d = DB::update("UPDATE `products` SET `status` = '3' WHERE `pid` = '$id'");

        return redirect('/pick');
     
    }




    public function add_pkg(Request $request){

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $zip = $request->zip;
        $details = $request->details;
        $weight = $request->weight;
        $size = $request->size;

        $sname = $request->sname;
        $semail = $request->semail;
        $sphone = $request->sphone;
        $saddress = $request->saddress;


        $d =   DB::insert("INSERT INTO `products`(`name`,`email`,`address`, `city`, `state`, `zip`, `details` , `weight` , `size` , `sname`, `semail` , `sphone` , `saddress` ) 
        VALUES ('$name', '$email', '$address', '$city', '$state', '$zip','$details', '$weight','$size', '$sname','$semail', '$sphone','$saddress')");

        return '1';

    }


  
}
