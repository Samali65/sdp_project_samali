<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\price_tbls;



class priceController extends Controller
{
    public function store(Request $request){


        // dd($request->all());
        //$price =new price_tbls; 

        $weight = $request->weight;
        $width = $request->width;
        $length = $request->length;
        $height = $request->height;
        $price = $request->price;


      $d =   DB::insert("INSERT INTO `price_tbl`(`weight`,`width`,`length` , `height`, `price` ) VALUES ('$weight', '$width','$length', '$height', '$price')");


      $data=  DB::select("SELECT * FROM `price_tbl`");


     return Redirect::to('productPrice')->with('data',$d);
}

public function price_view(Request $request){


    $id = $request->id;

    $d = DB::select("SELECT * FROM `price_tbl`");

    return view("productPrice")->with('data',$d);
  }

  public function updatePriceView($id){


    //$d =price_tbls::find($id); 
    $d = DB::select("SELECT * FROM `price_tbl` WHERE `id` = '$id'");

    return view('updateprice')->with('data',$d[0]);
  }

  public function updateprice(Request $request){

    $id=$request->id;
    $weight = $request->weight;
    $width = $request->width;
    $length = $request->length;
    $height = $request->height;
    $price = $request->price;


    $d =  DB::update("UPDATE `price_tbl` SET `weight` = '$weight', `width` = '$width', `length` = '$length', `height` = '$height', `price` = '$price' WHERE `id` = '$id'");
    $data=DB::select("SELECT * FROM `price_tbl`");
    
    return Redirect::to('productPrice')->with('data',$d);
  
  }
  public function deleteprice($vid){

    // $data=price_tbls::find($vid); 
  
    // $data->delete();

    DB::delete("DELETE FROM `price_tbl` where `id` = '$vid'");
    return redirect()->back();
  
  }
  
    public function cal_price(Request $req){

        $w = (int)$req->weight;
        $s = $req->size; 
        $sc = (int)$req->start;
        $ec = (int)$req->end;

        $a = explode("*",$s);

        $aw = $a[0];
        $al = $a[1];
        $ah = $a[2];


       

        $d = DB::select("SELECT * FROM `price_tbls` WHERE ( $w <= `weight`  ) AND ($aw <= `width`) AND ($al <= `length` ) AND ($ah <= `height`)  ORDER BY `weight` ASC");
        $dd = DB::select("SELECT * FROM `distance_tbl` WHERE (`city1` = '$sc' AND `city2` = '$ec') OR (`city2` = '$sc' AND `city1` = '$ec')");

        $pp = $d[0]->price;
        $dis = $dd[0]->distance;

        $price = $pp*$dis;

        return ($price);

    }







}
