<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;


class apiController extends Controller
{
    


    public function my_product(Request $req){

        $id = $req->id;

        $d = DB::select("SELECT * FROM `products` WHERE `customer` = '$id'");
        return $d;
    }



    public function tracking(Request $req){
        $id = $req->id;
        $d = DB::select("SELECT * FROM `products` WHERE `tracking_code` = '$id'");
        return $d;
    }



    public function login(Request $req){
        
        $email = $req->email;
        $pass = $req->password;


        $d = DB::select("SELECT * FROM `customers` WHERE `email` = '$email'");

        if(count($d)>0){

          $dp = $d[0]->password;
          if(Hash::check($pass, $dp)){


            return response()->json([
                'status' => '1',
                'data' => $d[0],
            ]);
            


          }else{
            return response()->json([
                'status' => '0',
            ]);
          }

        }else{
            return response()->json([
                'status' => '0',
            ]);
        }
    }


    
    public function getCity(Request $req){

        $d = DB::select("SELECT * FROM `cities`");
        return $d;
    }


        
    public function myDetails(Request $req){

        $id = $req->id;

        $d = DB::select("SELECT * FROM `customers` WHERE `id` = '$id'");
        return $d[0];
    }
    


    public function addProduct(Request $request){

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
        $cid = $request->cid;

       
		 
		$w = (int)$weight;
        $s = $size;
        $sc = (int)$scity;
        $ec = (int)$city;

        $a = explode("*",$s);

        $aw = $a[0];
        $al = $a[1];
        $ah = $a[2];


        $d = DB::select("SELECT * FROM `price_tbl` WHERE ( $w <= `weight`  ) AND ($aw <= `width`) AND ($al <= `length` ) AND ($ah <= `height`)  ORDER BY `weight` ASC");
        $dd = DB::select("SELECT * FROM `distance_tbl` WHERE (`city1` = '$sc' AND `city2` = '$ec') OR (`city2` = '$sc' AND `city1` = '$ec')");

        $pp = $d[0]->price;
        $dis = $dd[0]->distance;

        $price = $pp*$dis;
		
		
		
		 $d =   DB::insert("INSERT INTO `products`(`name`,`email`,`address`, `city`, `state`, `zip`, `details` , `weight` , `size` , `sname`, `semail` , `sphone` , `saddress`, `scity`, `price`, `customer` ) 
        VALUES ('$name', '$email', '$address', '$city', '$state', '$zip','$details', '$weight','$size', '$sname','$semail', '$sphone','$saddress', '$scity', '$price', '$cid')");
         
		 
		
		 
		$timestamp = date("h:m",time() + 60*60);
		 
        return response()->json([
            'status' => '1',
			'price' => $price,
			'time' => $timestamp,
        ]);

    }


}
